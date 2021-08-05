<?php
require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$donate = NEW Donate;


if (isset($_GET['donate_id'])) {

   $donate_id = $_GET['donate_id'];
   $donate = $donate->get_donate_fund_list($donate_id);
   
}

    $donateSumbalance = $mysqli->query("SELECT SUM(donate_balance) FROM donate_fund where donate_id = '$donate_id'");
    $row2 = mysqli_fetch_assoc($donateSumbalance);
    $donateSumbalance = $row2['SUM(donate_balance)'];

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>View Donate Persion - Charity</title>
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
                                <strong class="card-title">Donate</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">View Donate Persion</h3>
                                        </div>
                                        <hr>




                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Donate Fund's</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Cnic No</th>
                                    <th>Name</th>
                                    <th scope="col">Amount Pkr</th>
                                    <th>Transaction Invoice</th>
                                    <th>Transaction Process</th>

                                </tr>
                            </thead>
                            <tbody> 
                                <?php while ($row = mysqli_fetch_assoc($donate)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']?></th>
                                    <td><?php echo $row['donate_cnic']?></td>
                                    <td><?php echo donate_name($row['donate_id']) ?></td>
                                    <td><?php echo $row['donate_balance']?></td>
                                    <td><?php echo $row['donate_transaction_invoice']?></td>
                                    <td><?php echo $row['transaction_process']?></td>
                                </tr>
                            <?php } ?>
                                <tr >
                                    <td colspan="3"></td>
                                    <td colspan="1">Total : <?php echo $donateSumbalance ?> </td>
                                </tr>
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
