<?php

define("BASE_URL", $domain);
define("BASEDIR",dirname(dirname(__FILE__)));
define("SITE_TITLE", $site_title);
define("SITE_SLOGAN", $site_slogan);
define("SITE_DESCRIPTION", $site_desc);
define("SITE_KEYWORDS", $site_keywords);

function create_slug($string){
    $cat=preg_replace('~[^\p{L}\p{N}\n]+~u', '-', $string);
    return $cat;
}


function donor_name($id){
Global $mysqli;
$donor_name = $mysqli->query("SELECT * FROM DONOR WHERE donor_cnic = '$id' ");
$row = mysqli_fetch_assoc($donor_name);
$donor_name = $row['donor_name'];
return $donor_name;
}

function user_info($email){
    global $mysqli;
    $query = $mysqli->query("SELECT * FROM user WhERE user_email = '$email' ");
    return $query;
}

function User_is_logged_in(){
  if(isset($_SESSION['Charity_Session'])){
    return true;
  }
}

function User_not_logged_in(){
  if(!isset($_SESSION['Charity_Session'])){
    return true;
  }
}

function logout(){
    session_destroy();
    $_SESSION['Charity_Session'] = false;
}

function redirect($url){
    header("Location: $url");
}

  

  function random_num($size){
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++) {
        $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 10);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
}
?>