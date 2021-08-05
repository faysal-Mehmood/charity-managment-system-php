<?php

if (!session_id()) {
    session_start();
}

require_once (dirname(__FILE__)."/db.php");
require_once (dirname(__FILE__)."/config.php");
require_once (dirname(__FILE__)."/function.php");
require_once (dirname(__FILE__)."/user_session.php");
require_once (dirname(__FILE__)."/class/user.class.php");
require_once (dirname(__FILE__)."/class/donor.class.php");
require_once (dirname(__FILE__)."/class/donate.class.php");
require_once (dirname(__FILE__)."/class/report.class.php");
require_once (dirname(__FILE__)."/class/function.class.php");

error_reporting(3);



?>