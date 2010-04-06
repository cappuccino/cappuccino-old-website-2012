<?php
/*  Copyright 2008  Johnny Mast  (email : info@phpvrouwen.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	/*
	** This class is written with php4 compatabilty because im a pro webdev my self
	** i know from experiance that 7 out of 10 servers still run php4 so lets respect that.
	*/
	class twitclass 
	{
		var $SafeMode     = false;
		var $CurlHandler = null;
		var $bHaveCurl    = false;
		var $sUsername    = '';
		var $sPassword    = '';
		var $sTwitterUrL  = 'http://www.twitter.com/';
		var $sHeaders     = null;
		var $sUserAgent   = null;
		
		function twitclass()
		{
			$this->SafeMode  = false;
			$this->bHaveCurl = false;

		    /////////////// Hint from the writer of twitterPHP 
		    //
		    // I don't know if these headers have become standards yet
		    // but I would suggest using them.
		    // more discussion here.
		    // http://tinyurl.com/3xtx66
		    //
		    ///////////////
		    $this->sHeaders=array('X-Twitter-Client:  Twitme for wordpress',
		                          'X-Twitter-Client-Version: '.TWITME_VERSION,
		                          'X-Twitter-Client-URL: '.TWITME_PLUGINURL.'plugindata.xml');
	
			$this->sUserAgent = TWITME_USERAGENT;
			
			if (function_exists ('curl_init')) $this->bHaveCurl = true;
			
			if ($this->bHaveCurl)
			{
				if ($this->SafeMode == false)
				{
				
					$this->curlinit();
				} else
				echo 'safe mode ja';
			} else
			die ('shit');
			
		}
		
		
	   /**
		* curlinit function
		* Initialize curl.
		*
		* @return void
		* @author Johnny Mast
		**/
		function curlinit()
		{
			$this->CurlHandler = curl_init();
		}
		

	   /**
		* create_postData function
		* Returns an array with encoded Post Data variables.
		*
		* @return array
		* @author Johnny Mast
		**/
		function create_postData ($aPostData)
		{
		   $sPostData = '';
		   foreach ($aPostData as $k=>$v)
		   {
		       $sPostData.= "$k=".urlencode($v)."&";
		   }
		   $sPostData=substr($sPostData,0,-1);
		   return $sPostData;
		}

		
	   /**
		* sendCurlData function
		* Send data to twitter using curl.
		*
		* @return array
		* @author Johnny Mast
		**/			
		function sendCurlData ($Url, $PostData)
		{
			$sPostData = $this->create_postData ($PostData);
			
			if (!empty ($sPostData))
			{
			
				curl_setopt($this->CurlHandler, CURLOPT_USERPWD, $this->sUsername.":".$this->sPassword);			
				curl_setopt($this->CurlHandler, CURLOPT_URL,$Url);
				curl_setopt($this->CurlHandler, CURLOPT_POST, 1);
				curl_setopt($this->CurlHandler, CURLOPT_POSTFIELDS, $sPostData);
				curl_setopt($this->CurlHandler, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($this->CurlHandler, CURLOPT_FOLLOWLOCATION,1);
		        curl_setopt($this->CurlHandler, CURLOPT_RETURNTRANSFER, 1);
		        curl_setopt($this->CurlHandler, CURLOPT_VERBOSE, 1);
		        curl_setopt($this->CurlHandler, CURLOPT_NOBODY, 0);
		        curl_setopt($this->CurlHandler, CURLOPT_HEADER, 0);
		 		curl_setopt($this->CurlHandler, CURLOPT_HTTPHEADER, $this->sHeaders); 
				curl_setopt($this->CurlHandler, CURLOPT_USERAGENT, $this->sUserAgent); 
				
				$sResponse     = curl_exec($this->CurlHandler);
				$iResponseCode = (int)curl_getinfo($this->CurlHandler, CURLINFO_HTTP_CODE);
				
				//curl_close($this->CurlHandler);
				return array ($sResponse, $iResponseCode);
			}	
		}
		
	   /**
		* login function
		* Login to twitter.
		*
		* @return Boolean
		* @author Johnny Mast
		**/
		function login ($username, $password)
		{
				
			if ($this->bHaveCurl)
			{
			
				$this->setLoginInfo ($username, $password);
				
				list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/direct_messages.xml', array ('status' =>'show'));
				
				return ($iReturnCode == 200);
				 
					
			} else
			{
				
				
			}		
		}
		
		
	   /**
		* setLoginInfo function
		* Set login information for the connection.
		*
		* @return Boolean
		* @author Johnny Mast
		**/
		function setLoginInfo($username="", $password="")
		{
			$this->sUsername = $username;
			$this->sPassword = $password;
		}



		/*
		** Get the followers
		*/
		function getFollowers()
		{
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						$sMessage = '';
						list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/statuses/followers.json', array ('status' => $sMessage));
						if ($iReturnCode == 200)
						{
							return json_decode ($sData);
						} else
						return null;
					} else
					die ('use something else as curl');
				}
			} else
			die ('error: No login information pressent');
		}


		function allowFollower($p_iFollowerId)
		{
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						$message = '';
						list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/blocks/destroy/'.$p_iFollowerId.'.json', array('id' => $p_iFollowerId));
						if ($iReturnCode == 200)
						{
							return json_decode ($sData);
						} else
						return null;
					} else
					die ('use something else as curl');
				}
			} else
			die ('error: No login information pressent');
		}

		function deleteFollower($p_iFollowerId)
		{
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						$message = '';
						list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/blocks/create/'.$p_iFollowerId.'.json', array('id' => $p_iFollowerId));
						if ($iReturnCode == 200)
						{
							return json_decode ($sData);
						} else
						return null;
					} else
					die ('use something else as curl');
				}
			} else
			die ('error: No login information pressent');
		}
		
		/*
		** Send a direct message to a user.
		*/
		function sendDirectMessage($p_iUserID, $p_sMessage)
		{
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/direct_messages/new.xml', array ('user' => $p_iUserID, 'text' => $p_sMessage));
						
						if ($iReturnCode == 200)
						{
							return json_decode ($sData);
						} else
						return null;
					} else
					die ('use something else as curl');
				}
			} else
			die ('error: No login information pressent');
		}
		
		/*
		** Get Last posts
		*/
		function getLastPosts($p_iCount = 5)
		{
			$iCount = $p_iCount;
			
			if ($iCount > 20)
			 $iCount = 20;
			 
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						list ($sData, $iReturnCode) = $this->sendCurlData ($this->sTwitterUrL.'/statuses/user_timeline.json', array ('count' => $iCount));
						if ($iReturnCode == 200)
						{
							return json_decode ($sData);
						} else
						return null;
					} else
					die ('use something else as curl');
				}
			} else
			die ('error: No login information pressent');
		}
		
		/*
		** Add the post to the twitter site
		*/
		function doPost($sMessage)
		{
			if (!empty ($this->sUsername) && !empty ($this->sPassword))
			{
				if ($this->SafeMode)
				{
					die ('savemode is on hack around it !!');
				} else
				{
					if ($this->bHaveCurl)
					{
						$aData = $this->sendCurlData ($this->sTwitterUrL.'/statuses/update.xml', array ('status' => $sMessage, 'source' => 'twitmeforwordpress'));
						return true;
					} else
					die ('use something else as curl');
				}
			} else
			die ('some error because of no twitter info');
			
		}
		
		
	}
?>