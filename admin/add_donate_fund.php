<?php require_once (dirname(__FILE__)."/include/head.php");

$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}



$donate = NEW Donate;
$donors = NEW Donor;

if (isset($_POST['donate_fund_now'])) {
    
    $donate_id    = $_GET['donate_id'];
    $donatess = $donate->get_donate_persion_by_id($donate_id);
    $row    = mysqli_fetch_assoc($donatess);
    $persion_cnic = $row['persion_cnic'];
    $donate_fund  = $_POST['donate_fund'];
    $donor_id     = $_POST['donor_list'];
    $transaction_process = "complete";
    $transaction_invoice = random_num(2).'-'.time();

    $ok = $donate->donate_fund($donate_id,$persion_cnic,$donate_fund,$donor_id,$transaction_process,$transaction_invoice);

    if ($ok) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Fund Has Been Donated SuccessFully
             </div> ";
}   
}

if (isset($_GET['donate_id'])) {
    
    $donate_id = $_GET['donate_id'];

    $donate = $donate->get_donate_persion_by_id($donate_id);
    $row    = mysqli_fetch_assoc($donate);
    $donor  = $donors->get_donors_balance();
    //$row2   = mysqli_fetch_assoc($donors);

} 

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>Donate Money - Charity</title>
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
                                <strong class="card-title">Donate Fund</strong>
                                <strong id="msg"></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Donate Fund To Needy Person</h3>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="persion_name">Person Name</label>
                                                <input type="text" name="persion_name" class="form-control" value="<?php echo $row['persion_name'] ?>" placeholder="Persion Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="persion_adrs">Person Address</label>
                                                <input type="text" name="Persion_adrs" class="form-control" value="<?php echo $row['persion_adrs'] ?>" placeholder="Persion Addres" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="persion_cnic">Person CNIC</label>
                                                  <input type="text" name="persion_cnic" id="persion_cnic" value="<?php echo $row['persion_cnic'] ?>" class="form-control" placeholder="Persion Cnic" required>
                                                </div>
                                             </div>

                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="donor_list">Donor Balance List</label>
                                                  <select name="donor_list" id="donor_list" class="form-control">
                                                    <?php while ($row1 = mysqli_fetch_assoc($donor)) {   ?>
                                                      <option  balance="<?php echo $row1['donor_balance'] ?>" value="<?php echo $row1['id'] ?>"><?php echo $row1['donor_cnic'] ?> (<?php echo $row1['donor_balance'] ?> Pkr)</option>
                                                    <?php } ?>
                                                  </select>
                                                </div>
                                             </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="donate_fund">Donate Fund Amount</label>
                                                  <input type="text" name="donate_fund" class="form-control" id="check_donate_fund" placeholder="Donate Fund Now" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <input type="submit" name="donate_fund_now" id="donate_fund_now" class="btn btn-lg btn-info btn-block" value="Donate Fund Now">
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
<script src="http://localhost/validation//assets/js/jquery2.js"></script>

<script type="text/javascript" src="http://localhost/validation/assets/js/phone.js"></script>    
<script type="text/javascript">
$(document).ready(function() {

$('#check_donate_fund').on('keyup keypress', function(e) {
    var donate = $('#check_donate_fund').val();
    var donor = $('#donor_list').find(":selected").attr("balance");

    if (Number(donor) < Number(donate)) {
        $("#donate_fund_now").val("Donor Balance Low");
        $('#donate_fund_now').attr('disabled', 'disabled');
    } else {
        $("#donate_fund_now").val("Donate Fund Now");
        $('#donate_fund_now').removeAttr('disabled');
    }

});


$('#donor_list').on('change', function(e) {
    var donate = $('#check_donate_fund').val();
    var donor = $('#donor_list').find(":selected").attr("balance");

    if (Number(donor) < Number(donate)) {
        $("#donate_fund_now").val("Donor Balance Low");
        $('#donate_fund_now').attr('disabled', 'disabled');
    } else {
        $("#donate_fund_now").val("Donate Fund Now");
        $('#donate_fund_now').removeAttr('disabled');
    }

});


} );
</script>    

    <!-- Scripts -->






</body>
</html>
