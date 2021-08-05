<?php


/**
 * 
 */
class Donor 
{
	

    public function donor_registration($user_name,$donor_id,$user_adrs,$donor_balance,$user_cnic,$client_phone,$user_dob){

    	GLOBAL $mysqli;

    $mysqli->query("INSERT INTO donor (donor_name,donor_key,donor_adrs,donor_cnic,donor_phone,donor_balance,donor_dob,join_date) VALUES ('$user_name','$donor_id','$user_adrs','$user_cnic','$client_phone','$donor_balance','$user_dob',CURRENT_TIMESTAMP())");
    }

	public function get_donors(){
     
	     GLOBAL $mysqli;
	     $get_donors = $mysqli->query("SELECT * FROM donor ORDER BY ID DESC");
	     return $get_donors;

	}


	public function get_donors_balance(){
     
	     GLOBAL $mysqli;
	     $get_donors = $mysqli->query("SELECT * FROM donor");
	     return $get_donors;

	}


	public function get_donors_fund_list($donor_id){
     
	     GLOBAL $mysqli;
	     $get_donors = $mysqli->query("SELECT * FROM fund_transaction WHERE USER_ID = '$donor_id'");
	     return $get_donors;

	}

	public function get_donors_fund_lists(){
     
	     GLOBAL $mysqli;
	     $get_donors = $mysqli->query("SELECT * FROM fund_transaction");
	     return $get_donors;

	}	

	public function get_donor_by_id($id){

	    	GLOBAL $mysqli;

	    	$users = $mysqli->query("SELECT * FROM donor WHERE donor_key = '$id'");
	    	return $users;

    }


	public function collect_fund($user_id,$user_cnic,$fund_amount,$transaction_invoice,$transaction_process){

		GLOBAL $mysqli;
        
		$mysqli->query("INSERT INTO fund_transaction (user_id,user_cnic,amount_in,amount_out,transaction_invoice,transaction_process,date_time) VALUES('$user_id','$user_cnic','$fund_amount','0','$transaction_invoice','$transaction_process',CURRENT_TIMESTAMP()) ");

        $user = $_SESSION['Charity_Session'];
		$users = $mysqli->query("SELECT * FROM donor WHERE donor_key = '$user'");
		$row = mysqli_fetch_assoc($users);
		$fund_amount = $row['donor_balance'] + $fund_amount;
        
        $mysqli->query("UPDATE donor SET donor_balance = '$fund_amount' WHERE donor_key = '$user_id' ");


	}


	public function collect_inventory($user_id,$user_cnic,$collect_inventory,$transaction_invoice,$transaction_process){

		GLOBAL $mysqli;
        
		$mysqli->query("INSERT INTO inventory (user_id,user_cnic,inventory_list,transaction_invoice,transaction_process,date_time) VALUES('$user_id','$user_cnic','$collect_inventory','$transaction_invoice','$transaction_process',CURRENT_TIMESTAMP()) ");


	}

	public function update_donor($id,$donor_name,$donor_adrs,$donor_cnic,$donor_phone,$donor_dob){

    	GLOBAL $mysqli;

    	$users = $mysqli->query("UPDATE donor SET donor_name = '$donor_name', donor_adrs = '$donor_adrs', donor_cnic = '$donor_cnic',donor_phone = '$donor_phone', donor_dob = '$donor_dob'  WHERE id = '$id'");
    	return $users;

    }


    public function delete_user($del_id){

    	GLOBAL $mysqli;

    	$users = $mysqli->query("DELETE FROM donor WHERE id = '$del_id'");
    	return $users;

    }

}


?>