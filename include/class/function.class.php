<?php

CLASS FUNCTION_CLASS {

    public function __construct()
    {
    	Global $mysqli;
    	$mysqli->query = $mysqli->query;
    }

    public function book_appointment($client_name,$client_phone,$appointment_service,$appointment_date,$appointment_token,$appointment_status){

		Global $mysqli;
		Global $UserId;
		try
		{

			$stmt = $mysqli->query("INSERT INTO appointment (user_id,client_name,client_phone,appointment_service,appointment_date,appointment_token,appointment_status) VALUES ('$UserId','$client_name','$client_phone','$appointment_service','$appointment_date','$appointment_token','$appointment_status') ");

		    return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
    }

    public function send_sms($mobile_no,$sender,$message) {
    	Global $user_name;
    	Global $user_pass;

		$username = $user_name;///Your Username
		$password = $user_pass;///Your Password
		$mobile = $mobile_no;///Recepient Mobile Number
		$sender = $sender;
		$message = $message;

		////sending sms

		$post = "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."";
		$url = "https://sendpk.com/api/sms.php?username=$username&password=$password";
		$ch = curl_init();
		$timeout = 30; // set to zero for no timeout
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$result = curl_exec($ch); 
		/*Print Responce*/
		$result; 

    }
}

?>