<?php


/**
 * 
 */
class Donor 
{
	

    public function donor_registration($user_name,$user_adrs,$user_cnic,$client_phone,$user_dob){

    	GLOBAL $mysqli;
    	
          $mysqli->query("INSERT INTO donor (donor_name,donor_adrs,donor_cnic,donor_phone,donor_dob,join_date) VALUES ('$user_name','$user_adrs','$user_cnic','$client_phone','$user_dob',CURRENT_TIMESTAMP())");
          return true;

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
	     $get_donors = $mysqli->query("SELECT * FROM fund_transaction WHERE USER_CNIC = '$donor_id' ORDER BY amount_in + 0 DESC");
	     return $get_donors;

	}

	public function get_donors_fund_lists(){
     
	     GLOBAL $mysqli;
	     $get_donors = $mysqli->query("SELECT * FROM fund_transaction order by amount_in + 0 DESC");
	     return $get_donors;
	
	}	

	public function get_donor_by_id($id){ 

	      GLOBAL $mysqli;
	      $users = $mysqli->query("SELECT * FROM donor WHERE id = '$id'");
	      return $users;

    }


	public function collect_fund($user_id,$user_cnic,$fund_amount,$transaction_invoice,$transaction_process){

		GLOBAL $mysqli;
        
		$mysqli->query("INSERT INTO fund_transaction (user_id,user_cnic,amount_in,amount_out,transaction_invoice,transaction_process,date_time) VALUES('$user_id','$user_cnic','$fund_amount','0','$transaction_invoice','$transaction_process',CURRENT_TIMESTAMP()) ");

		$users = $mysqli->query("SELECT * FROM Donor WHERE id = '$user_id'");
		$row = mysqli_fetch_assoc($users);
		$fund_amount = $row['donor_balance'] + $fund_amount;
        
        $mysqli->query("UPDATE donor SET  donor_key = '$user_id' , donor_balance = '$fund_amount' WHERE ID = '$user_id' ");
        return true;


	}

	public function update_donor($id,$donor_name,$donor_adrs,$donor_cnic,$donor_phone,$donor_dob){

    	GLOBAL $mysqli;

    	$users = $mysqli->query("UPDATE donor SET donor_name = '$donor_name', donor_adrs = '$donor_adrs', donor_cnic = '$donor_cnic',donor_phone = '$donor_phone', donor_dob = '$donor_dob'  WHERE id = '$id'");
    	return true;

    }


    public function delete_user($del_id){

    	GLOBAL $mysqli;

    	$users = $mysqli->query("DELETE FROM donor WHERE id = '$del_id'");
    	return $users;

    }

}


?>