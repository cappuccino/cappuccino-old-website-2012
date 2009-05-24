<?php

header('Location: http://download.cappuccino.org/CappuccinoTools-0.7.zip');

// Database connection stuff here
require_once '../includes/functions.php';

db_connect();

$x ="update counter set Count=Count+1 where file_name='pro'";
$result = mysql_query($x) or die;

?>