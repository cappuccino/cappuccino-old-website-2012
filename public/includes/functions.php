<?php

function db_connect()
{
    $result = mysql_connect('localhost:3306', 'root', 'n0ns3ns3');

    if (!$result)
        return false;

    if (!mysql_select_db('cappuccino', $result))
        return false;

    return $result;
}

function count_and_redirect($name)
{
    $conn = db_connect();
    
    $result = mysql_query("SELECT file_url FROM counter WHERE file_name='$name'", $conn) or die;
    
    $row = mysql_fetch_assoc($result) or die;
    
    $url = $row['file_url'];
    header("Location: $url");
    
    mysql_query("UPDATE counter SET count=count+1 WHERE file_name='$name'", $conn) or die;
}

?>