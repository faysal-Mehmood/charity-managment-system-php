<?php

require_once (dirname(__FILE__)."/include/head.php");


$report = NEW Report;


if (isset($_GET['today_report'])) {
	$report->generate_report_daily();
	exit();
}

if (isset($_GET['weekly_report'])) {
	$report->generate_report_weekly();
	exit();
}



?>