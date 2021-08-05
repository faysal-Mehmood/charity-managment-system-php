<?php
require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$donates = NEW Donate;


if (isset($_GET['inventory_delete'])) {
    $ok = $donates->delete_invetory($_GET['inventory_delete']);

 if ($ok) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Inventory Has Been Delete
             </div> ";


}

}
$donate = $donates->get_inventory();
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html > <!--<![endif]-->
<head>

    <title>Manage Inventory - Charity</title>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Inventory</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Person CNIC</th>
                                            <th>Process</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         while ($row = mysqli_fetch_assoc($donate)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['user_cnic'] ?></td>
                                            <td><?php echo $row['transaction_process'] ?></td>
                                            <td><div class="dropdown text-center">
                                                <button id="dropdownMenu1" class="btn btn-primary dropdown-toggle btn-width" data-toggle="dropdown">
                                                    <i class="hidden-xs">Actions</i> <i class="caret"></i></button>
                                                    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1" role="menu">
                                                    <li><a role="menuitem" tabindex="-1" href="edit_inventory.php?inventory_id=<?php echo $row['id'] ?>" class="dropdown-item">Edit</a></li>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <li><a class="dropdown-item" role="menuitem" tabindex="-1" href="?inventory_delete=<?php echo $row['id'] ?>">Delete</a></li></ul>
                                            </div></td>
                                        </tr> 
                                        <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


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




    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>



</body>
</html>
