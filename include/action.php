<?php
require_once (dirname(__FILE__)."/head.php");

$ip_add = getenv("REMOTE_ADDR");

if(isset($_POST["addToCart"])){
		

		$product_id = $_POST["proId"];
		

		if(isset($_SESSION["Parlor_Session"])){

		$user_id = $_SESSION["Parlor_Session"];

		$run_query = $mysqli->query("SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'");
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = $mysqli->query("INSERT INTO `cart` (`product_id`, `ip_add`, `user_id`, `qty`) VALUES ('$product_id','$ip_add','$user_id','1')");
			if($sql){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = $mysqli->query("SELECT cart_id FROM cart WHERE ip_add = '$ip_add' AND product_id = '$product_id' AND user_id = -1");
			if (mysqli_num_rows($sql) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = $mysqli->query("INSERT INTO `cart`(`product_id`, `ip_add`, `user_id`, `qty`) VALUES ('$product_id','$ip_add','-1','1')");
			if ($sql) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["Parlor_Session"])) {
		$sql = $mysqli->query("SELECT COUNT(*) AS count_item FROM cart WHERE user_id = '1' ");
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = $mysqli->query("SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0");
	}
	
	$query = $sql;
	$row = mysqli_fetch_assoc($query);
	echo $row["count_item"];
	exit();
}

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["Parlor_Session"])) {
		//When user is logged in this query will execute
		$sql = $mysqli->query("SELECT a.id,a.product_name,a.product_price,a.product_token,b.cart_id,b.qty FROM products a,cart b WHERE a.id=b.product_id AND b.user_id='$_SESSION[Parlor_Session]'");
	}else{
		//When user is not logged in this query will execute
		$sql = $mysqli->query("SELECT a.id,a.product_name,a.product_price,a.product_token,b.cart_id,b.qty FROM products a,cart b WHERE a.id=b.product_id AND b.ip_add='$ip_add' AND b.user_id < 0");
	}
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($sql) > 0) {
			$n=0;
			while ($row=mysqli_fetch_assoc($sql)) {
				$n++;
				$product_id = $row["id"];
				$product_title = $row["product_name"];
				$product_price = $row["product_price"];
				$product_token = $row["product_token"];
				$cart_item_id = $row["cart_id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="'.BASE_URL.'/data/product-images/'.$product_id.'/'.$product_token.'.jpg" /></div>
						<div class="col-md-3">'.$product_name.'</div>
						<div class="col-md-3">'.$product_price.'</div>
					</div><br>';
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}


	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($sql) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login.php?redirect=cart.php'>";
				$n=0;
				while ($row=mysqli_fetch_assoc($sql)) {
					$n++;
					$product_id = $row["id"];
					$product_title = $row["product_name"];
					$product_price = $row["product_price"];
					$product_token = $row["product_token"];
					$cart_item_id = $row["cart_id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="'.BASE_URL.'/data/product-images/'.$product_id.'/'.$product_token.'.jpg"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div><br>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;float:right"> </b>
					</div>';


				if (!isset($_SESSION["Parlor_Session"])) {
					echo '<div class="col-md-12"><center><input type="submit" name="login_user_with_product" class="btn btn-secondary" value="Checkout" ></center></div>
							</form>';
					
				}else if(isset($_SESSION["Parlor_Session"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="http://localhost/parlor/payment_success.php" method="post">';
				                ?>
						<div class="col-md-12">
						  <div class="panel-group" id="accordion">
						    <div class="panel panel-default">
						      <div class="panel-heading">
						        <h4 class="panel-title">
						          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">User Information</a>
						        </h4>
						      </div>
						      <div id="collapse1" class="panel-collapse collapse in">
						        <div class="panel-body">
						        	<div class="col-md-6">
						        		<label for="reciever_name">Reciever Name</label>
						        		<input type="text" name="reciever_name" id="reciever_name" class="form-control" value="" required>
						        	</div>

						        	<div class="col-md-6">
						        		<label for="reciever_phone">Reciever Phone</label>
						        		<input type="text" name="reciever_phone" id="reciever_phone" class="form-control" value="" required>
						        	</div>

						        	<div class="col-md-6">
						        		<label for="reciever_city">City Name</label>
						        		<input type="text" name="reciever_city" id="reciever_city" class="form-control" value="" required>
						        	</div>	

						        	<div class="col-md-6">
						        		<label for="reciever_postal_code">Postal Code</label>
						        		<input type="text" name="reciever_postal_code" id="reciever_postal_code" class="form-control" value="" required>
						        	</div>

						        	<div class="col-md-12">
						        		<label for="reciever_home_address">Home Address ( E.g : Town,Street,House No/Name )</label>
						        		<input type="text" name="reciever_home_address" id="reciever_home_address" class="form-control" value="" required>
						        	</div>						        	

						        </div>
						      </div>
						    </div>


						</div>
						</div>
      <?php  
							$x=0;
							$sql = $mysqli->query("SELECT a.id,a.product_name,a.product_price,a.product_token,b.cart_id,b.qty FROM products a,cart b WHERE a.id=b.product_id AND b.user_id='$_SESSION[Parlor_Session]'");
							while($row=mysqli_fetch_assoc($sql)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_name"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'
									<input type="hidden" name="ses" value="'.$_SESSION["Parlor_Session"].'"/>
                                    <div class="col-md-12">
                                    <center>
                                    <input type="submit" value="Checkout" name="checkout" class="btn btn-secondary" />
                                    </center>
                                    </div>
								</form>';
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["Parlor_Session"])) {
		$sql = $mysqli->query("DELETE FROM cart WHERE product_id = '$remove_id' AND user_id = '$_SESSION[Parlor_Session]'");
	}else{
		$sql = $mysqli->query("DELETE FROM cart WHERE product_id = '$remove_id' AND ip_add = '$ip_add'");
	}
	if($sql){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["Parlor_Session"])) {
		$sql = $mysqli->query("UPDATE cart SET qty='$qty' WHERE product_id = '$update_id' AND user_id = '$_SESSION[Parlor_Session]'");
	}else{
		$sql = $mysqli->query("UPDATE cart SET qty='$qty' WHERE product_id = '$update_id' AND ip_add = '$ip_add'");
	}
	if($sql){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}

?>