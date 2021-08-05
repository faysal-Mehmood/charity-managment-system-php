<?php

$config =  $mysqli->query("SELECT * FROM config");
           while($row = mysqli_fetch_assoc($config)){
           	$domain        = $row['site_url'];
           	$site_title    = $row['site_title'];
           	$site_slogan   = $row['site_slogan'];
           	$site_desc     = $row['site_description'];
           	$site_keywords = $row['site_keywords'];
           }
?>