<?php
require_once (dirname(__FILE__)."/include/head.php");


$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
   $user_login->redirect('login.php');
}

if (isset($_POST['update'])) {
  
 $site_title    = $_POST['site_title'];
 $site_slogan   = $_POST['site_slogan'];
 $site_desc     = $_POST['site_description'];
 $site_keywords = $_POST['site_keyword'];

 $ok = $mysqli->query("UPDATE config SET site_title = '$site_title', site_slogan = '$site_title', site_description = '$site_desc', site_keywords = '$site_keywords' where id = '1'");

 if ($ok) {
        $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Success</strong> Config Updated
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

    <title>Site Config - Charity</title>
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
                                <strong class="card-title">Configuration</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Update Site Configuration</h3>
                                        </div>
                                        <hr>
                                        <form action="#" method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="site_name">Site Title</label>
                                                <input type="text" name="site_title" class="form-control" value="<?php echo $site_title ?>" placeholder="Site Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_slogan">Site Slogan</label>
                                                <input type="text" name="site_slogan" class="form-control" value="<?php echo $site_slogan ?>" placeholder="Site Slogan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_description">Site Description</label>
                                                <input type="text" name="site_description" class="form-control" value="<?php echo $site_desc ?>" placeholder="Site Description" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-4">
                                                <div class="form-group">
                                                  <label for="site_keyword">Site Keywords</label>
                                                  <input type="text" name="site_keyword" class="form-control" value="<?php echo $site_keywords ?>" placeholder="Site Keywords" required>
                                                </div>
                                             </div>
                                        

                                            </div>
                                            <div>
                                                <button  type="submit" name="update" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Update
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
