   <?php require_once (dirname(__FILE__)."/include/head.php");
 
if(User_not_logged_in())
{
   redirect('index.php');
}

$donor = NEW Donor;

   $donor_id = $_SESSION['Charity_Session'];

   $usera = $donor->get_donor_by_id($donor_id);
   $row    = mysqli_fetch_array($usera);

$donors = NEW Donor;
if (isset($_POST['donate_inventory'])) {

   $user_id              = $_SESSION['Charity_Session'];
   $user_cnic            = $_POST['user_cnic'];
   $collect_inventory    = $_POST['collect_inventory'];
   $transaction_invoice  = random_num(3).'-'.time();
   $transaction_process  = "not-recieve";
   
   $donors->collect_inventory($user_id,$user_cnic,$collect_inventory,$transaction_invoice,$transaction_process);
   $msg = "<div class='alert alert-success' style='margin: 4px'>
   <button class='close' data-dismiss='alert'>&times;</button>
   <strong>Done!</strong>Your Inventory is added successfully!
 </div> ";
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Donate Inventory - <?php echo SITE_TITLE; ?></title>
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
$check = $donor->get_donor_by_id($_SESSION['Charity_Session']);
if (mysqli_num_rows($check) > 0) {?>
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
                                            <h3 class="text-center">Donate Inventory</h3>
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
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="user_cnic">User Cnic</label>
                                                  <input type="text" name="user_cnic" id="user_cnic" class="form-control" value="<?php echo $row['donor_cnic']?>" placeholder="User Cnic" required>
                                                </div>
                                             </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="client_phone">User Phone</label>
                                                  <input type="text" name="client_phone" id="client_phone" class="form-control" value="<?php echo $row['donor_phone']?>" placeholder="User phone" required>
                                                </div>
                                             </div>                                           

                                            </div>

                                             <div class="form-group">
                                                  <label for="fund_amount">Write Donate Inventory</label>
                                                  <textarea type="text" class="form-control" name="collect_inventory" rows="5" required=""></textarea>
                                             </div>
      


                                            <div>
                                                <button  type="submit" name="donate_inventory" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-money fa-lg"></i>&nbsp;
                                                    Donate Now Inventory
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col--> 
              </div><!--/.row-->  

              <?php } else { echo "Your Are Not In Donor List";  } ?>


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
      