<?php


class User 
{
	
    public function user_registration($user_cnic,$user_name,$user_email,$user_pass,$user_adrs,$client_phone,$user_dob,$user_roll){

    	GLOBAL $mysqli;
        $user_pass = md5($user_pass);
    	$mysqli->query("INSERT INTO user (user_cnic,user_name,user_email,user_pass,user_adrs,user_phone,user_dob,user_role) VALUES ('$user_cnic','$user_name','$user_email','$user_pass','$user_adrs','$client_phone','$user_dob','$user_roll')");
      return true;
    }



    public function get_users(){

        GLOBAL $mysqli;

        $users = $mysqli->query("SELECT * FROM user ORDER BY id DESC");
        return $users;

    }

    public function get_user_by_id($id){

        GLOBAL $mysqli;

        $users = $mysqli->query("SELECT * FROM user WHERE id = '$id'");
        return $users;

    }    


    public function update_user($id,$user_name,$user_email,$user_pass,$user_adrs,$client_phone,$user_dob){

        GLOBAL $mysqli;
        $users = $mysqli->query("UPDATE user SET user_name = '$user_name', user_email = '$user_email', user_adrs = '$user_adrs', user_phone = '$client_phone', user_dob = '$user_dob'  WHERE id = '$id'");

        if (!empty($user_pass)) {
         $user_pass = md5($user_pass);
         $users = $mysqli->query("UPDATE user SET user_pass = '$user_pass'  WHERE id = '$id'");
        }

        return $users;

    }


    public function delete_user($del_id){

        GLOBAL $mysqli;

        $users = $mysqli->query("DELETE FROM user WHERE id = '$del_id'");
        return true;

    }


    public function User_is_logged_in(){
      if(isset($_SESSION['Charity_Session'])){
        return true;
      }
    }

    public function User_not_logged_in(){
      if(!isset($_SESSION['Charity_Session'])){
        return true;
      }
    }

    public function logout(){
        session_destroy();
        $_SESSION['Charity_Session'] = false;
    }

    public function redirect($url)
    {
        header("Location: $url");
    }



    public function userlevel(){
        Global $mysqli;
        $user = $_SESSION['Charity_Session'];
        $query = $mysqli->query("SELECT * FROM user WHERE id = '$user' ");
        $row = mysqli_fetch_array($query);

        $user_level = $row['user_role'];
        /*if ($user_level !== "admin") {
            header("Location: login.php?not_admin");
                exit;
        }*/
        return $user_level;
    }


    public function login($email,$upass)
    {
        Global $mysqli;
        try
        {
            $stmt = $mysqli->query("SELECT * FROM user WHERE user_email = '$email' ");
            $userRow = mysqli_fetch_array($stmt);

            if(mysqli_num_rows($stmt) == 1){

                    if($userRow['user_pass'] == md5($upass)){

                      $_SESSION['Charity_Session'] = $userRow['id'];
                          if ($this->userlevel() == "admin") {
                              $this->redirect("index.php");
                          } else {
                              $this->redirect("index.php");
                          }
                        return true;
                    } else {
                          if ($this->userlevel() == "admin") {
                              $this->redirect("login.php?login_eror");
                          } else {
                              $this->redirect("login.php");
                          }
                        
                    }
                
            } else {               
                         if ($this->userlevel() == "admin") {
                              $this->redirect('login.php?login_eror');
                          } else {
                              $this->redirect('login.php?login_eror');
                          }       
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }


}

?>