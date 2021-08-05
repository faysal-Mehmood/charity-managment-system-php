<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}
$donor = NEW Donor;
if (isset($_GET['donor_id'])) {
    
    $donor_id = $_GET['donor_id'];

    $user = $donor->get_donors_fund_list($donor_id);

    $donor_balance = $mysqli->query("SELECT * FROM donor where donor_cnic = '$donor_id'");
    $row1 = mysqli_fetch_assoc($donor_balance);
    $donor_balance = $row1['donor_balance'];

    $donorSumbalance = $mysqli->query("SELECT SUM(amount_in) FROM FUND_TRANSACTION where user_cnic = '$donor_id'");
    $row2 = mysqli_fetch_assoc($donorSumbalance);
    $donorSumbalance = $row2['SUM(amount_in)'];
}



?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>View Donor - Charity</title>
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
                
                
              <div class="row">                   
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Donor</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">View Donor</h3>
                                        </div>
                                        <hr>
              <div class="form-group">
                  <div class="col-4">
                      <label>Current Donor Balance</label>
                      <input type="text" class="form-control" value="<?php echo $donor_balance ?>" disabled>
                  </div>
              </div>



                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Donor Fund's Collect Report</strong>
                    </div>
                    <div class="card-body">
                        <table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Cnic No</th>
                                    <th>Name</th>
                                    <th scope="col">Amount Pkr</th>
                                    <th scope="col">Transaction Invoice</th>
                                    <th scope="col">Process</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (mysqli_num_rows($user) > 0) {
                                while ($row = mysqli_fetch_assoc($user)) { 
                                    if ($row['amount_in'] !== "0") {
                                   
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['user_cnic'] ?></td>
                                    <td><?php echo donor_name($row['user_cnic']) ?></td>
                                    <td><?php echo $row['amount_in'] ?></td>
                                    <td><?php echo $row['transaction_invoice'] ?></td>
                                    <td><?php echo $row['transaction_process'] ?></td>
                                </tr>

                                <?php } } ?> 
                                <tr >
                                    <td colspan="3"></td>
                                    <td colspan="1">Total : <?php echo $donorSumbalance ?> </td>
                                </tr>
                            <?php } else { echo "No Record's Found For this Donor"; }?>
                            </tbody>
                        </table>
                    </div>
                </div>






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











</body>
</html>
