<?php

function db_connect()
{
    $result = mysql_connect($DB_PATH, $DB_USERNAME, $DB_PASSWORD);

    if (!$result)
        return false;

    if (!mysql_select_db($DB_NAME))
        return false;

    return $result;
}

?>