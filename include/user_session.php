<?php
require_once("db.php");
if(isset($_SESSION['Charity_Session'])){
	$uid = $_SESSION['Charity_Session'];
	 $stmt = "SELECT * FROM user left join donor on user.id = donor.donor_key where user.id='$uid'";
	
	$result=mysqli_query($mysqli,$stmt);
	while ($row = mysqli_fetch_assoc($result)){
		$Username      = $row['user_name'];
		$UserId        = $row['id'];
		$UserCnic      = $row['donor_cnic'];
		$email         = $row['user_email'];
	}
} else {
    return false;
}
  

    
?>

