<?php

//Get the XML document loaded into a variable
$xml    = file_get_contents("http://www.reddit.com/r/cappuccino/.rss");
$parser = new SimpleXMLElement($xml);
$count = 0;

foreach($parser->channel->item as $_item)
{
    echo "<li><a href=\"".$_item->link."\">".$_item->title."</a></li>\n";
    $count++;
    
    if($count >= 4)
        break;
}

?>