<?php require_once (dirname(__FILE__)."/include/head.php");

$report = NEW Report;


$report_today = $report->get_today_report();
$report_week = $report->get_week_report();


?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <title>Data Reports - Charity</title>
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
                                <h4>Report</h4>
                            </div>
                            <div class="card-body">
                                

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Daily</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Weekly</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                <div class="pull-right">
                                    <input type="submit" onClick="window.location.href='download_report.php?today_report'" class="btn btn-primary" value="Generate Today Report">
                                </div>

                                        <h3>Daily Report</h3>
                                        <p>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Cnic</th>
                                                                    <th scope="col">Amount In</th>
                                                                    <th scope="col">Amount Out</th>
                                                                    <th scope="col">Transaction Invoice</th>
                                                                    <th scope="col">Transaction Process</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($report_today)) { ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $row['id']?></th>
                                                                    <td><?php echo $row['user_cnic']?></td>
                                                                    <td><?php echo $row['amount_in']?></td>
                                                                    <td><?php echo $row['amount_out']?></td>
                                                                    <td><?php echo $row['transaction_invoice']?></td>
                                                                    <td><?php echo $row['transaction_process']?></td>
                                                                </tr>
                                                    <?php  } ?>
                                                            </tbody>
                                                        </table>

                                        </p>
                                     </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="pull-right">
                                    <input type="submit" onClick="window.location.href='download_report.php?weekly_report'" class="btn btn-primary" value="Generate Weekly Report">
                                </div>                                        
                                        <h3>Weekly </h3>
                                        <p>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Cnic</th>
                                                                    <th scope="col">Amount In</th>
                                                                    <th scope="col">Amount Out</th>
                                                                    <th scope="col">Transaction Invoice</th>
                                                                    <th scope="col">Transaction Process</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($report_week)) { ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $row['id']?></th>
                                                                    <td><?php echo $row['user_cnic']?></td>
                                                                    <td><?php echo $row['amount_in']?></td>
                                                                    <td><?php echo $row['amount_out']?></td>
                                                                    <td><?php echo $row['transaction_invoice']?></td>
                                                                    <td><?php echo $row['transaction_process']?></td>
                                                                </tr>
                                                    <?php  } ?>
                                                            </tbody>
                                                        </table>
                                        </p>
                                    </div>

                                </div>






                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

             </div>

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
