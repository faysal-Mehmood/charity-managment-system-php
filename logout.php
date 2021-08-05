<?php
require_once (dirname(__FILE__)."/include/head.php");

 ob_start();
if(User_is_logged_in())
{
   redirect('index.php');
}

if(User_is_logged_in()!="")
{
	logout();
	redirect('index.php');
}
?>		