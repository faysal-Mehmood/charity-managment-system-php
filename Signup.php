<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_is_logged_in())
{
  ?>
  <script> window.location.href="index.php";
  </script>
  <?php
}
$userREG = New USER;
if (isset($_POST['SignUp'])) {
  if ($_POST['user_pass'] == $_POST['user_passCnfrm']) {

      $user_name = $_POST['user_name'];
      $user_cnic = $_POST['user_cnic'];
      $user_email = $_POST['user_email'];
      $client_phone = $_POST['phone_number'];
      $user_adrs    = $_POST['user_adrs'];
      $user_pass = md5($_POST['user_pass']);
      $user_dob = $_POST['user_dob'];
      $user_roll = "user";

      if (mysqli_num_rows(user_info($user_email)) > 0) {
        $msg = "Email Already In Use ";
      } else {
         $sql="INSERT INTO User (user_name,user_email,user_pass,user_adrs,user_phone,user_dob,user_role) VALUES ('{$user_name}','{$user_email}','{$user_pass}','{$user_adrs}','{$client_phone}','{$user_dob}','{$user_roll}')";
       
        $result= mysqli_query($mysqli,$sql);
         
           if(isset($result)){
           $msg = " SignUp Have SuccessFully ";
         } else {
           $msg = " SignUp Can't Success";
         }
      }
   
     } else {
    $msg = "Password Can't Match";
  }

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By Abdullah -->
  <title>SignUp - <?php echo SITE_TITLE; ?></title>
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

  <div class="modal-dialog">
    <div style="box-shadow: 0 3px 8px -1px rgba(0, 0, 0, 0.2);">

            <form method="post" enctype="multipart/form-data" id="signForm">
             <div id="showReturnMsg"></div>

              <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="category-title">
                    <h3 class="c-heading">Enter SignUp Details</h3>
                    <?php if(isset($msg)) echo $msg ?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_name">User Name:</label>
                      <input type="text" class="form-control" id="user_name" placeholder="Enter Name" name="user_name" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">User Email:</label>
                      <input type="email" class="form-control" id="user_email" placeholder="Enter email" name="user_email" required="email">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_adrs">User Address:</label>
                      <input type="text" class="form-control" id="user_adrs" placeholder="Enter email" name="user_adrs" required="">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phone_number">Phone No</label>
                      <input type="text" class="form-control" id="phone_number" placeholder="Enter Mobile No" name="phone_number" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_dob">Date Birth:</label>
                      <input type="date" class="form-control" id="user_dob" placeholder="Enter DOB" name="user_dob">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_cnic">User Cnic:</label>
                      <input type="text" class="form-control" id="user_cnic" placeholder="Enter Cnic" name="user_cnic">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_pass">Password:</label>
                      <input type="Password" class="form-control" id="user_pass" placeholder="Enter Password" name="user_pass" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_passCnfrm">Confirm Password:</label>
                      <input type="Password" class="form-control" id="user_passCnfrm" placeholder="Enter Again Password" name="user_passCnfrm" required>
                    </div>
                  </div>

                  <center class="col-md-12">
                    <center><button type="submit" class="btn btn-secondary" name="SignUp" id="SignUp">SignUp</button></center>
                  </center>                 

                            
                    </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="login.php">Login</a></button>
            </div>

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
      
      $("#phone_number").mask("99999999999");

      $("#user_cnic").mask("99999-9999999-9");


      $("#phone_number").on("blur", function() {
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


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("user_dob").setAttribute("max", today);

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
