<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_not_logged_in())
{
  ?>
   <script> window.location.href="index.php";
   </script>
   <?php
}


$report = NEW Report;

$report_today = $report->get_today_report($UserCnic);
$report_week = $report->get_week_report($UserCnic);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By Abdullah -->
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

    <div class="row">

      <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
          <center>
            <div class="panel-heading">My Donate Balance</div>
            <div class="panel-body">
              <?php 
              //$user = $_SESSION['Charity_Session'];
              $currentBalance = $mysqli->query("SELECT SUM(donor_balance) FROM donor where donor_cnic = '$UserCnic' ");
              while ($row = mysqli_fetch_array($currentBalance)){
              $current_balance = $row['SUM(donor_balance)'];
              }

              echo $current_balance;
              ?>
            </div>
          </center>
        </div>
      </div>   

      <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
          <center>
            <div class="panel-heading">My Donate Inventory</div>
            <div class="panel-body">
              <?php 
              //$user = $_SESSION['Charity_Session'];
              $currentInventory = $mysqli->query("SELECT * FROM inventory where user_id = ".$_SESSION['Charity_Session']." ");
              $currentInventory = mysqli_num_rows($currentInventory);
              echo $currentInventory;
              ?>
            </div>
          </center>
        </div>
      </div>    

    </div>

             <div class="row">

  <ul class="nav nav-tabs" role="tablist">
    <li class="active"><a role="tab" data-toggle="tab" aria-controls="home" href="#home">Today</a></li>
    <li><a role="tab" data-toggle="tab" aria-controls="menu1" href="#menu1">Week</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" id="home" class="tab-pane active">
          <table class="table table-bordered">
             <thead>
               <tr>
                <th scope="col">#</th>
                <th scope="col">Cnic</th>
                <th>Name</th>
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
            <td><?php echo donor_name($row['user_cnic']) ?></td>
            <td><?php echo $row['amount_in']?></td>
            <td><?php echo $row['amount_out']?></td>
            <td><?php echo $row['transaction_invoice']?></td>
            <td><?php echo $row['transaction_process']?></td>
           </tr>
           <?php  } ?>
          </tbody>
          </table>
    </div>
    <div role="tabpanel" id="menu1" class="tab-pane">
          <table class="table table-bordered">
             <thead>
               <tr>
                <th scope="col">#</th>
                <th scope="col">Cnic</th>
                <th>Name</th>
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
            <td><?php echo donor_name($row['user_cnic']) ?></td>
            <td><?php echo $row['amount_in']?></td>
            <td><?php echo $row['amount_out']?></td>
            <td><?php echo $row['transaction_invoice']?></td>
            <td><?php echo $row['transaction_process']?></td>
           </tr>
           <?php  } ?>
          </tbody>
          </table>
    </div>
  </div>              
                 


</div>




  </div>

 </div>
</div>

<?php
include("theme/footer.php");
?>


</body>
</html>
