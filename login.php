<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_is_logged_in())
{
  ?>
   <script> window.location.href="index.php";
   </script>
   <?php
}
$userREG = New USER();
if (isset($_POST['login'])) {


      $user_email = $_POST['user_email'];
      $user_pass  = $_POST['user_pass'];

      $userREG->login($user_email,$user_pass);


} 



   if(isset($_GET['error'])){
     $msg = "<strong>Warning!</strong> Wrong Details";
   }
   if(isset($_GET['wrong'])){
     $msg = "<strong>User</strong> Cant Found";
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By Abdullah -->
  <title>Login - <?php echo SITE_TITLE; ?></title>
<?php
require_once (dirname(__FILE__)."/theme/meta-head.php");
?>
  <style>

  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
require_once (dirname(__FILE__)."/theme/header.php");
?>

<div class="wrap container">

    <div class="modal-dialog">
      <div style="box-shadow: 0 3px 8px -1px rgba(0, 0, 0, 0.2);">

            <form method="post" enctype="multipart/form-data" id="signForm">
             <div id="showReturnMsg"></div>

              <div class="col-md-12 col-lg-12 col-xl-12 ">
                  <div class="category-title">
                    <h3 class="c-heading">Enter Login Details</h3>
                    <?php if(isset($msg)) echo $msg ?>
                  </div>

                      <div class="form-group">
                        <label for="user_email">User Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" id="user_email" name="user_email" required>
                      </div>
                      <div class="form-group">
                        <label for="user_pass">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="user_pass" name="user_pass" required>
                        </div>
                      <center><button type="submit" class="btn btn-secondary" name="login" id="login">Login</center>
              </div>
            </form>
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>

    
    </div>
  </div>

</div>

<?php
include("theme/footer.php");
?>


</body>
</html>
