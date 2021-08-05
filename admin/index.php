<?php
require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$currentBalance = $mysqli->query("SELECT SUM(donor_balance) FROM donor");
while ($row = mysqli_fetch_assoc($currentBalance)){
$current_balance = $row['SUM(donor_balance)'];
}


$donateBalance = $mysqli->query("SELECT SUM(donate_balance) FROM donate_fund");
while ($row = mysqli_fetch_assoc($donateBalance)){
$donate_balance = $row['SUM(donate_balance)'];
}


$maxDonateBalances = $mysqli->query("SELECT * FROM donor");
    while ($row1 = mysqli_fetch_assoc($maxDonateBalances)){
    $donor_cnic = $row1['donor_cnic'];    
    $maxDonate = $mysqli->query("SELECT SUM(amount_in) FROM fund_transaction where user_cnic = '$donor_cnic'");
    while ($row = mysqli_fetch_array($maxDonate)){
    $maxDonateBalance = $row['SUM(amount_in)'];   
    $maxDonateBalancez[] = $maxDonateBalance;
    $maxDonateBalance =  max($maxDonateBalancez);
}
}


$Tdonor = $mysqli->query("SELECT * FROM donor");
$total_donor = mysqli_num_rows($Tdonor);

$donate = $mysqli->query("SELECT * FROM donate");
$total_donates = mysqli_num_rows($donate);



$donor = NEW Donor;

$user_d = $donor->get_donors_fund_lists();

$donate = NEW Donate;
$donate = $donate->get_donate_fund_lists();




?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <title>Index - Charity</title>
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
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">PKR : <span class="count"><?php echo $current_balance ?></span></div>
                                            <div class="stat-heading">Current Balance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">PKR : <span class="count"><?php echo $donate_balance ?></span></div>
                                            <div class="stat-heading">Total Amount Donate</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_donor ?></span></div>
                                            <div class="stat-heading">Total  Donor's</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_donates ?></span></div>
                                            <div class="stat-heading">Total Consumers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $maxDonateBalance ?></span></div>
                                            <div class="stat-heading">Highest Donate Amount</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Widgets -->

                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Donor Status</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">id</th>
                                                    <th class="avatar">Cnic</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Transaction Invoice</th>
                                                    <th>Transaction Process</th>
                                                    <th>Date & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if (mysqli_num_rows($user_d) > 0) {
                                            while ($row = mysqli_fetch_assoc($user_d)) { 
                                                if ($row['amount_in'] !== "0") {?>
                                            <tr>
                                                <td class="serial"><?php echo $row['id'] ?></th>
                                                <td class="avatar"><?php echo $row['user_cnic'] ?></td>
                                                <td><?php echo donor_name($row['user_cnic']) ?></td>
                                                <td><?php echo $row['amount_in'] ?></td>
                                                <td><?php echo $row['transaction_invoice'] ?></td>
                                                <td><?php echo $row['transaction_process'] ?></td>
                                                <td><?php echo date_format(date_create($row['date_time']),'d F Y & g:i A')?></td>
                                            </tr>
                                            <?php } }  } else { echo "No Record's Found For this Donor"; }?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->


                    </div>
                </div>
                <!-- /.orders -->

                <!-- Orders - 2 -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Donate Status </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">Id</th>
                                                    <th>Cnic</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Transaction Invoice</th>
                                                    <th>Transaction Status</th>
                                                    <th>Date & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                if (mysqli_num_rows($donate) > 0) {
                                                while ($row = mysqli_fetch_assoc($donate)) { 
                                                   
                                                ?>
                                                <tr>
                                                    <td class="serial"><?php echo $row['id'] ?></td>
                                                    <td> <?php echo $row['donate_cnic'] ?></td>
                                                    <td><?php echo donate_name($row['donate_id']) ?></td>
                                                    <td> <span class="name"><?php echo $row['donate_balance'] ?></span> </td>
                                                    <td> <span class="product"><?php echo $row['donate_transaction_invoice'] ?></span> </td>
                                                    <td>
                                                        <span class="badge badge-complete"><?php echo $row['transaction_process'] ?></span>
                                                    </td>
                                                    <td><?php echo date_format(date_create($row['date_time']),'d F Y & g:i A')?></td>
                                                </tr>
                                <?php } } else { echo "No Record's Found For this Donor"; }?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->


                    </div>
                </div>
                <!-- /.orders -->


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


</body>
</html>
