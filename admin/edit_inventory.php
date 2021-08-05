<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

$donate = NEW Donate;

if (isset($_POST['update_inventory'])) {

    $id                   = $_GET['inventory_id'];
    $inventory_action     = $_POST['inventory_action'];

  $donate = NEW Donate;
  
  if ($donate->update_inventory($id,$inventory_action)) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Inventory Has Been Updated
             </div> ";
  }



}

if (isset($_GET['inventory_id'])) {

   $user_id = $_GET['inventory_id'];
   $get_inventory = $donate->get_inventory_by_id($user_id);
   $row = mysqli_fetch_assoc($get_inventory);

}



?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>

    <title>Update Inventory - Charity</title>
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
                                <strong class="card-title">Inventory</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Edit Inventory</h3>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="user_name">User Cnic</label>
                                                <input type="text" name="user_name" class="form-control" placeholder="user Name" value="<?php echo $row['user_cnic'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inventory">Inventory</label>
                                                <textarea type="text" name="inventory" class="form-control" rows="5" disabled><?php echo $row['inventory_list'] ?></textarea>
                                            </div>  


                                            <div class="form-group">
                                                <label for="inventory_action">Inventory Action</label>
                                                <select name="inventory_action" class="form-control">
                                                  <option value="Recieve">Recieve</option>
                                                  <option value="Not-Recieve">Not Recieve</option>                                               
                                                </select>
                                            </div>  

                                            <div>
                                                <button  type="submit" name="update_inventory" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Update Inventory
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
