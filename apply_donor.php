<?php require_once (dirname(__FILE__)."/include/head.php");
$user_login = NEW USER;
if($user_login->User_not_logged_in())
{
  ?>
  <script> window.location.href="index.php";
  </script>
  <?php
}

$donor = NEW Donor;

$check = $donor->get_donor_by_id($_SESSION['Charity_Session']);

if (isset($_POST['create_donor'])) {
  

   $donor_name    = $_POST['donor_name'];
   $donor_adrs    = $_POST['donor_adrs'];
   $donor_cnic    = $_POST['donor_cnic'];
   $donor_balance=0;
   $client_phone  = $_POST['client_phone'];
   $donor_dob     = $_POST['donor_dob'];
   $donor_id      = $_SESSION['Charity_Session'];

$check = $mysqli->query("SELECT * FROM Donor WHERE donor_cnic = '$donor_cnic'");
if (mysqli_num_rows($check) > 0) {

     $msg = "<div class='alert alert-success' style='margin: 4px'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Eror!</strong> Donor Cnic ALready Register
             </div> ";

 } else  {
  $donor = NEW Donor;
  $donor->donor_registration($donor_name,$donor_id,$donor_adrs,$donor_balance,$donor_cnic,$client_phone,$donor_dob);
  $msg = "<div class='alert alert-success' style='margin: 4px'>
  <button class='close' data-dismiss='alert'>&times;</button>
  <strong>Done!</strong> Donor Added successfully!
</div> ";
 }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Dashboard - <?php echo SITE_TITLE; ?></title>
<?php
include("theme/meta-head.php");
?>
  <style>

  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
include("theme/header.php");
?>

<div class="wrap container">
 <div class="row">

  <div class="col-sm-4 col-md-4">
    <div class="list-group">
        <a href="<?php echo BASE_URL?>/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="<?php echo BASE_URL?>/apply_donor.php" class="list-group-item list-group-item-action">Apply For Donor</a>
        <a href="<?php echo BASE_URL?>/donate_now.php" class="list-group-item list-group-item-action">Donate Now</a>
        <a href="<?php echo BASE_URL?>/donate_inventory.php" class="list-group-item list-group-item-action">Donate Inventory</a>

    </div>
  </div> 

  <div class="col-sm-8 col-md-8">
<?php if (isset($msg)) echo $msg ?>
<?php 
$donor = NEW Donor;

//echo mysqli_num_rows($check);

//$users = $mysqli->query("SELECT * FROM donor WHERE id = ".$_SESSION['Charity_Session']." ");
if (mysqli_num_rows($check) == 0) {
?>

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
                                            <h3 class="text-center">Add Donor</h3>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data" required>
                                            <div class="form-group">
                                                <label for="donor_name">donor Name</label>
                                                <input type="text" name="donor_name" class="form-control" placeholder="donor Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_email">donor Email</label>
                                                <input type="email" name="donor_email" class="form-control" placeholder="donor Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_adrs">donor Addres</label>
                                                <input type="text" name="donor_adrs" class="form-control" placeholder="donor Addres" required>
                                            </div>
                                            <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="donor_cnic">donor Cnic</label>
                                                  <input type="text" name="donor_cnic" id="donor_cnic" class="form-control" value="<?php echo $UserCnic?>" required>
                                                </div>
                                             </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="client_phone">donor Phone</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" placeholder="donor phone" required>
                                                </div>
                                             </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="donor_dob">donor Date Birth</label>
                                                  <input type="date" id="user_dob" name="donor_dob" class="form-control" placeholder="donor Date of birth" required>
                                                </div>
                                             </div>                                            

                                            </div>
                                            <div>
                                                <button  type="submit" name="create_donor" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col--> 
              </div><!--/.row--> 

<?php } else { echo "Your Are Already In Donor's List";} ?>


  </div>

 </div>
</div>

<?php
include("theme/footer.php");
?>


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
  

$(function(){

  /* Sets the minimum height of the wrapper div to ensure the footer reaches the bottom */
  function setWrapperMinHeight() {
    $('.wrapper').css('minHeight', window.innerHeight - $('.nav').height() - $('.footer').height());
  }
  /* Make sure the main div gets resized on ready */
  setWrapperMinHeight();

  /* Make sure the wrapper div gets resized whenever the screen gets resized */
  window.onresize = function() {
    setWrapperMinHeight();
  }
});

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
      