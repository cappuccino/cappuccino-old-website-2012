            <h3>Discuss</h3>
                <ul>
                
                <?php
                
                if(!isset($root))
                    $root = "/";
                
                $discussLinks = array();
                $discussLinks[] = array("title" => "Cappuccino Blog", "URL" => $root."discuss/");
                $discussLinks[] = array("title" => "Latest News", "URL" => "http://www.reddit.com/r/Cappuccino/");
                $discussLinks[] = array("title" => "Events", "URL" => $root."discuss/events/");
                $discussLinks[] = array("title" => "Mailing List &amp; IRC", "URL" => $root."discuss/list.php");
                $discussLinks[] = array("title" => "Frequently Asked Questions", "URL" => $root."discuss/faq.php");
    
                foreach($discussLinks as $link)
                {
                    if(isset($subActive) && $link["title"] == $subActive)
                    { ?>  <li class="active"> <?php }
                    else 
                    { ?> <li>  <?php } ?>
                    
                    <a href="<?php echo $link["URL"]; ?>"><?php echo $link["title"]; ?></a></li>   
                    
                <?php
                }
                ?>
                
                </ul>

