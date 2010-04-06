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
	class twitTimeUrl 
	{
		var $CurlHandler;
		
		function twitTimeUrl ()
		{
			/*
			** Init the curl library.
			*/
			$this->CurlHandler = curl_init();
		}
		
		/*
		** Add the post to the twitter site
		*/
		function getShortUrl($sUrl)
		{	
			curl_setopt($this->CurlHandler, CURLOPT_URL,'http://timesurl.at/api/rest.php?url='.$sUrl);
			curl_setopt($this->CurlHandler, CURLOPT_POST, 1);
			curl_setopt($this->CurlHandler, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($this->CurlHandler, CURLOPT_FOLLOWLOCATION,1);
			curl_setopt($this->CurlHandler, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($this->CurlHandler, CURLOPT_VERBOSE, 1);
			curl_setopt($this->CurlHandler, CURLOPT_NOBODY, 0);
			curl_setopt($this->CurlHandler, CURLOPT_HEADER, 0);
			
			$sResponse     = curl_exec($this->CurlHandler);
			$iResponseCode = (int)curl_getinfo($this->CurlHandler, CURLINFO_HTTP_CODE);

			if ($iResponseCode != 200) return $sUrl;
			return $sResponse;
		}
		
		
	}
?>