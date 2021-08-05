<?php
require_once (dirname(__FILE__)."/include/head.php");

 ob_start();

 $user_login = NEW USER;

if($user_login->User_is_logged_in())
{
   $user_login->redirect('index.php');
}

if($user_login->User_is_logged_in()!="")
{
	        session_destroy();
        $_SESSION['Charity_Session'] = false;
	$user_login->redirect('http://localhost/charity/admin/login.php');
}
?>		