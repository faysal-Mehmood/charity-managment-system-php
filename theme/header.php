    <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

              <div class="container">
                  <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="#">+92340 3986 213 </a> </li>
                             <li> <i class="fa fa-envelope"></i> <a href="#">sadaka@gmail.com</a> </li>
                       </ul> <!-- /.header-contact  -->
                      
                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">

                            <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>
                       </ul> <!-- /.header-social  -->
                      
                    </div>


                  </div>
              </div>

            </div>

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="index.php"><img src="assets/images/sadaka-logo.png" alt=""></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a class="is-active" href="index.php">HOME</a></li>
                    <li class="has-child"><a href="http://localhost/charity/donate_now.php">DONATE</a>
                    <li><a href="gallery.html">GALLERY</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    
                    <li><a href="contact.html">CONTACT</a></li>
                  <?php if (User_not_logged_in()) { ?>
                    <li><a href="<?php echo BASE_URL; ?>/login.php">LOGIN</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/Signup.php">SIGNUP</a></li>
                  <?php } if (User_is_logged_in()) { ?>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $Username; ?>
                        <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL; ?>/dashboard.php">DashBoard</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/logout.php">logout</a></li>
                      </ul>
                    </li>
                  <?php } ?>                    

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->