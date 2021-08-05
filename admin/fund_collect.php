<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}
$donor = NEW Donor;
if (isset($_GET['donor_id'])) {
    
    $donor_id = $_GET['donor_id'];

    $donor = $donor->get_donor_by_id($donor_id);
    $row = mysqli_fetch_assoc($donor);
}
$donor = NEW Donor;
if (isset($_POST['collect_fund'])) {

   $user_id             = $_GET['donor_id'];
   $user_cnic           = $_POST['user_cnic'];
   $fund_amount         = $_POST['fund_amount'];
   $transaction_invoice = random_num(3).'-'.time();
   $transaction_process = "complete";

  //$ok = $donor->collect_fund($user_id,$user_cnic,$fund_amount,$transaction_invoice,$transaction_process);

    if ($donor->collect_fund($user_id,$user_cnic,$fund_amount,$transaction_invoice,$transaction_process)) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Funds Has Been Collected 
             </div> ";
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

    <title>Collect Donation - Charity</title>
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
                                <strong class="card-title">Charity</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Collect's Funds</h3>
                                        </div>
                                        <hr>
                                        <form action="#" method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="user_name">User Name</label>
                                                <input type="text" name="user_name" class="form-control" value="<?php echo $row['donor_name']?>" placeholder="User Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_adrs">User Addres</label>
                                                <input type="text" name="user_adrs" class="form-control" value="<?php echo $row['donor_adrs']?>"placeholder="User Addres" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="user_cnic">User Cnic</label>
                                                  <input type="text" name="user_cnic" id="user_cnic" class="form-control" value="<?php echo $row['donor_cnic']?>" placeholder="User Cnic" required>
                                                </div>
                                             </div>

                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="client_phone">User Phone</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" value="<?php echo $row['donor_phone']?>" placeholder="User phone" required>
                                                </div>
                                             </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="fund_amount">Amount Pkr</label>
                                                  <input type="text" name="fund_amount" class="form-control" placeholder="Donor Amount In Pkr" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <button  type="submit" name="collect_fund" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-money fa-lg"></i>&nbsp;
                                                    Submit Collect Fund
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
