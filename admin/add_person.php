<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$donate = NEW Donate;

if (isset($_POST['create_persion'])) {
  

   $persion_name    = $_POST['persion_name'];
   $persion_email   = $_POST['persion_email'];
   $persion_adrs    = $_POST['persion_adrs'];
   $persion_cnic    = $_POST['persion_cnic'];
   $client_phone    = $_POST['client_phone'];
   $persion_dob     = $_POST['persion_dob'];
   $check = $mysqli->query("SELECT * FROM Donate WHERE persion_cnic = '$persion_cnic'");
if (mysqli_num_rows($check) > 0) {

     $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Eror!</strong> Consumer Cnic ALready Register
             </div> ";

 } else  {

 if($donate->donate_registration($persion_name,$persion_email,$persion_adrs,$persion_cnic,$client_phone,$persion_dob)){


        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Needy Person Has Been Added
             </div> ";

}
}
}


 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>Add Person - Charity</title>
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
                                <strong class="card-title">Person</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Add Person For Donate</h3>
                                        </div>
                                        <hr>
                                        <form action="#" method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="persion_name">Person Name</label>
                                                <input type="text" name="persion_name" class="form-control" placeholder="Person Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="persion_email">Person Email</label>
                                                <input type="email" name="persion_email" class="form-control" placeholder="Person Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="persion_adrs">Person Address</label>
                                                <input type="text" name="persion_adrs" class="form-control" placeholder="Person Addres" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="persion_cnic">Person CNIC</label>
                                                  <input type="text" name="persion_cnic" id="persion_cnic" class="form-control" placeholder="Person Cnic" required>
                                                </div>
                                             </div>

                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="client_phone">Person Phone Number</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" placeholder="Person phone" required>
                                                </div>
                                             </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="persion_dob">Person Date of Birth</label>
                                                  <input type="date" name="persion_dob" id="user_dob" class="form-control" placeholder="Persion Date of birth" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <button  type="submit" name="create_persion" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Submit
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

      $("#persion_cnic").mask("99999-9999999-9");


      $("#client_phone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

              var lastfour = last.substr(1,4);

              var first = $(this).val().substr( 0, 9 );

              $(this).val( first + move + '-' + lastfour );
          }
      });

        $("#persion_cnic").on("blur", function() {
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
