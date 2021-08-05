<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$donor = NEW Donor;

if (isset($_POST['update_donor'])) {

   $id            = $_GET['id'];
   $donor_name    = $_POST['donor_name'];
   $donor_email   = $_POST['donor_email'];
   $donor_adrs    = $_POST['donor_adrs'];
   $donor_cnic    = $_POST['donor_cnic'];
   $client_phone  = $_POST['client_phone'];
   $donor_dob     = $_POST['donor_dob'];

  

         if ($donor->update_donor($id,$donor_name,$donor_adrs,$donor_cnic,$client_phone,$donor_dob)) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Donor Has Been Updated 
             </div> ";
  
}
}

if (isset($_GET['id'])) {

   $donor_id = $_GET['id'];
   $get_donor = $donor->get_donor_by_id($donor_id);
   $row = mysqli_fetch_assoc($get_donor);
}



?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>Update donor - Charity</title>
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
                                <strong class="card-title">donor</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Edit donor</h3>
                                        </div>
                                        <hr>
                                        <form action="#" method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="donor_name">donor Name</label>
                                                <input type="text" name="donor_name" class="form-control" placeholder="donor Name" value="<?php echo $row['donor_name'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_adrs">donor Addres</label>
                                                <input type="text" name="donor_adrs" class="form-control" placeholder="donor Addres" value="<?php echo $row['donor_adrs'] ?>" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="donor_cnic">donor Cnic</label>
                                                  <input type="text" name="donor_cnic" id="donor_cnic" class="form-control" value="<?php echo $row['donor_cnic'] ?>" placeholder="donor Cnic" required>
                                                </div>
                                             </div>

                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="client_phone">donor Phone</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" value="<?php echo $row['donor_phone'] ?>" placeholder="donor phone" required>
                                                </div>
                                             </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="donor_dob">donor Date Birth</label>
                                                  <input type="date" name="donor_dob" class="form-control" value="<?php echo $row['donor_dob'] ?>" placeholder="donor Date of birth" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <button  type="submit" name="update_donor" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Update donor
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

      $("#donor_cnic").mask("99999-9999999-9");


      $("#client_phone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

              var lastfour = last.substr(1,4);

              var first = $(this).val().substr( 0, 9 );

              $(this).val( first + move + '-' + lastfour );
          }
      });

        $("#donor_cnic").on("blur", function() {
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
