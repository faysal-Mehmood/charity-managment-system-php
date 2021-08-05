<?php



$user_login = NEW USER;

if (isset($_SESSION['Charity_Session'])) {

if($user_login->userlevel() == "user")
{
   session_destroy();
   $_SESSION['Charity_Session'] = false;
   $user_login->redirect('login.php?not_admin');

}
}


function donor_name($id){
Global $mysqli;
$donor_name = $mysqli->query("SELECT * FROM DONOR WHERE donor_cnic = '$id' ");
$row = mysqli_fetch_assoc($donor_name);
$donor_name = $row['donor_name'];
return $donor_name;
}

function donate_name($id){
Global $mysqli;
$donate_name = $mysqli->query("SELECT * FROM DONATE WHERE ID = '$id' ");
$row = mysqli_fetch_assoc($donate_name);
$donate = $row['persion_name'];
return $donate;
}

  function random_num($size){
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++) {
        $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 10);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
}

?>