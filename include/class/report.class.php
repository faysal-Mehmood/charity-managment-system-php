<?php

/**
 * 
 */
class Report
{
	




    public function get_today_report($id){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT * FROM fund_transaction WHERE DATE(date_time) = CURDATE() and user_cnic = '$id' ORDER BY id DESC");
        return $report;

    }
    public function get_week_report($id){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT * FROM fund_transaction WHERE date_time >= DATE(NOW()) + INTERVAL -7 DAY and user_cnic = '$id' ORDER BY id DESC");
        return $report;

    }


}
?>