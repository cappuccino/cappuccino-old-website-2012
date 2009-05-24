<?php
$how_many=5; //How many posts do you want to show
require_once('wp-config.php'); // Change this for your path to wp-config.php file ?>

<?
$news = $wpdb->get_results("SELECT ID, post_title
                            FROM $wpdb->posts
                            WHERE post_type='post' AND post_status='publish'
                            ORDER BY post_date DESC LIMIT $how_many");
foreach($news as $np)
    printf ("<li><a href=\"/discuss/?p=%s\">%s</a></li>", $np->ID,$np->post_title);

?>
