<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$user = NEW User;

if (isset($_POST['update_user'])) {

   $id            = $_GET['id'];
   $user_name    = $_POST['user_name'];
   $user_email   = $_POST['user_email'];
   $user_adrs    = $_POST['user_adrs'];
   $user_pass    = $_POST['user_pass'];
   $client_phone  = $_POST['client_phone'];
   $user_dob     = $_POST['user_dob'];

   if ($user->update_user($id,$user_name,$user_email,$user_pass,$user_adrs,$client_phone,$user_dob)) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> User Has Been Updated 
             </div> ";
  
}
}
if (isset($_GET['id'])) {

   $user_id = $_GET['id'];
   $get_user = $user->get_user_by_id($user_id);
   $row = mysqli_fetch_assoc($get_user);

}





?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>Update user - Charity</title>
<?php require_once (dirname(__FILE__)."/themes/head.php"); ?>
</head>

<body>
        <!-- SideBar-->
<?php require_once (dirname(__FILE__)."/themes/sidebar.php"); ?>
        <!-- /#SideBar -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
<?php require_once (dirname(__FILE__)."/themes/header.php"); ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                
 <?php if (isset($msg)) echo $msg ?>                 
              <div class="row">                   
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">user</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Edit user</h3>
                                        </div>
                                        <hr>
                                        <form action="#" method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="user_name">user Name</label>
                                                <input type="text" name="user_name" class="form-control" placeholder="user Name" value="<?php echo $row['user_name'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email">user email</label>
                                                <input type="text" name="user_email" class="form-control" placeholder="user email" value="<?php echo $row['user_email'] ?>" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="user_pass">user pass</label>
                                                <input type="password" name="user_pass" class="form-control" placeholder="user pass" value="" >
                                            </div>                                                                                        
                                            <div class="form-group">
                                                <label for="user_adrs">user Addres</label>
                                                <input type="text" name="user_adrs" class="form-control" placeholder="user Addres" value="<?php echo $row['user_adrs'] ?>" required>
                                            </div>
                                            <div class="row">

                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="client_phone">user Phone</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" value="<?php echo $row['user_phone'] ?>" placeholder="user phone" required>
                                                </div>
                                             </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="user_dob">user Date Birth</label>
                                                  <input type="date" name="user_dob" class="form-control" value="<?php echo $row['user_dob'] ?>" placeholder="user Date of birth" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <button  type="submit" name="update_user" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Update user
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col--> 
              </div><!--/.row-->               


            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
<?php require_once (dirname(__FILE__)."/themes/footer.php"); ?>
        <!-- /.site-footer -->

    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->



    <script src="http://localhost/validation//assets/js/jquery2.js"></script>

    <script type="text/javascript" src="http://localhost/validation/assets/js/phone.js"></script>
    <script type="text/javascript">
      $(function(){
      
      $("#client_phone").mask("99999999999");

      $("#user_cnic").mask("99999-9999999-9");


      $("#client_phone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

              var lastfour = last.substr(1,4);

              var first = $(this).val().substr( 0, 9 );

              $(this).val( first + move + '-' + lastfour );
          }
      });

        $("#user_cnic").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

              var lastfour = last.substr(1,4);

              var first = $(this).val().substr( 0, 9 );

              $(this).val( first + move + '-' + lastfour );
          }
      });
    }); 
    </script>








</body>
</html>
