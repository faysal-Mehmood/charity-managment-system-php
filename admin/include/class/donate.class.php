<?php

class Donate
{
	


	public function donate_registration($persion_name,$persion_email,$persion_adrs,$persion_cnic,$client_phone,$persion_dob){

		GLOBAL $mysqli;
		$mysqli->query("INSERT INTO donate (persion_name,persion_email,persion_adrs,persion_cnic,persion_phone,persion_dob,join_date) VALUES ('$persion_name','$persion_email','$persion_adrs','$persion_cnic','$client_phone','$persion_dob',CURRENT_TIMESTAMP())");
		return true;
	}

	public function update_donate($donate_id,$persion_name,$persion_email,$persion_adrs,$persion_cnic,$client_phone,$persion_dob){

		GLOBAL $mysqli;
		$mysqli->query("UPDATE donate SET persion_name = '$persion_name', persion_email = '$persion_email', persion_adrs = '$persion_adrs', persion_cnic = '$persion_cnic', persion_phone = '$client_phone' , persion_dob = '$persion_dob' WHERE id = '$donate_id'  ");
		return true;
	}	

	public function get_donates(){
     
     GLOBAL $mysqli;
     $get_donors = $mysqli->query("SELECT * FROM donate ORDER BY ID DESC");
     return $get_donors;

	}

	public function get_donate_persion_by_id($id){
     
     GLOBAL $mysqli;
     $get_donors = $mysqli->query("SELECT * FROM donate WHERE ID = '$id'");
     return $get_donors;

	}

	public function donate_fund($donate_id,$persion_cnic,$donate_fund,$donor_id,$transaction_process,$transaction_invoice){

	 GLOBAL $mysqli;

	 $mysqli->query("INSERT INTO FUND_TRANSACTION (user_id,user_cnic,amount_in,amount_out,transaction_invoice,transaction_process,date_time) VALUES('$donate_id','$persion_cnic','0','$donate_fund','$transaction_invoice','$transaction_process',CURRENT_TIMESTAMP()) ");

	 $mysqli->query("INSERT INTO DONATE_FUND (donate_id,donate_cnic,donate_balance,donor_id,donate_transaction_invoice,transaction_process,date_time) VALUES ('$donate_id','$persion_cnic','$donate_fund','$donor_id','$transaction_invoice','$transaction_process',CURRENT_TIMESTAMP())");

	 	$users = $mysqli->query("SELECT * FROM Donor WHERE id = '$donor_id'");
		$row = mysqli_fetch_assoc($users);
		$fund_amount = $row['donor_balance'] - $donate_fund;
        
        $mysqli->query("UPDATE DONOR SET donor_balance = '$fund_amount' WHERE ID = '$donor_id' ");

        return true;

	}


	public function get_donate_fund_list($donate_id){
     
	     GLOBAL $mysqli;
	     $get_donate = $mysqli->query("SELECT * FROM donate_fund WHERE DONATE_ID = '$donate_id' order by donate_balance + 0 DESC");
	     return $get_donate;

	}

	public function get_donate_fund_lists(){
     
	     GLOBAL $mysqli;
	     $get_donate = $mysqli->query("SELECT * FROM donate_fund order by donate_balance + 0 DESC");
	     return $get_donate;

	}


    public function delete_donate($del_id){

    	GLOBAL $mysqli;

    	$users = $mysqli->query("DELETE FROM donate WHERE id = '$del_id'");
    	return $users;

    }	


    public function get_inventory(){
     
	     GLOBAL $mysqli;
	     $get_inventory = $mysqli->query("SELECT * FROM inventory");
	     return $get_inventory;

	}


    public function get_inventory_by_id($id){
     
	     GLOBAL $mysqli;
	     $get_inventory = $mysqli->query("SELECT * FROM inventory where id = '$id' ");
         return $get_inventory;

	}

	public function update_inventory($id,$inventory_action){
		GLOBAL $mysqli;
		$get = $mysqli->query("UPDATE inventory SET transaction_process = '$inventory_action' WHERE id = '$id' ");

		return $get;
	}


	public function delete_invetory($del_id) {

    	GLOBAL $mysqli;

    	$mysqli->query("DELETE FROM inventory WHERE id = '$del_id'");
    	return true;
	}

    	


}

?>