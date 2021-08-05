<?php require_once (dirname(__FILE__)."/include/head.php");


$user_login = NEW USER;
if($user_login->User_is_logged_in())
{
   $user_login->redirect('index.php');
}

if(isset($_POST['login']))
{

  $email = trim($_POST['user_email']);
  $upass = trim($_POST['user_pass']);

  $user_login->login($email,$upass);
  if($user_login->userlevel() == "user")
    {
       session_destroy();
       $_SESSION['Charity_Session'] = false;
       $user_login->redirect('login.php?not_admin');

    }
}

 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Charity</title>
<?php require_once (dirname(__FILE__)."/themes/head.php"); ?>
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
<?php
if(isset($_GET['not_admin'])) { ?>
<div class='alert alert-success' style="margin: 4px">
            <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Eror!</strong> You Are Not A Admin So No Try For Login Admin Area
</div>
<?php } elseif (isset($_GET['login_eror'])) { ?>
<div class='alert alert-alert' style="margin: 4px">
            <button class='close' data-dismiss='alert'>&times;</button>
             <p style="color:red"> <strong  >Eror!</strong> Login Eror</p>
</div>
<?php } ?>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="user_email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="user_pass" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30" value="Sign In">

                    </form>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
