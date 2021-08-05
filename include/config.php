<?php
    date_default_timezone_set('Asia/Karachi');

    $site_data = $mysqli->query("SELECT * FROM config");
    while($row = mysqli_fetch_assoc($site_data)){

            $domain        = $row['site_url'];
            $site_title    = $row['site_title'];
            $site_slogan   = $row['site_slogan'];
            $site_desc     = $row['site_description'];
            $site_keywords = $row['site_keywords'];
    }


?>