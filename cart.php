<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>

<?php
	if(isset($_POST['submit'])) { 
		$cartid = $_POST['cartid'];
		$quantity = $_POST['quantity'];
		$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartid);
		if($quantity<=0){
			$delcart = $ct->del_cart($cartid);
		}
    } 
?>

<?php
	if(!isset($_GET['cartdel'])){
		//echo "<script>window.location ='cart.php'</script>";
	}else{
		$id = $_GET['cartdel'];
		$delcart = $ct->del_cart($id);
	}	
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
					<h2>Your Cart</h2>
					<?php 
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					if(isset($del_cart)){
						echo $del_cart;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$getproduct = $ct->get_product_cart();
								$subtotal = 0;
								if($getproduct){
									while($result = $getproduct->fetch_assoc()){	
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['cartid']?>"/>
										<input type="number" min="0" name="quantity" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
								$total = $result['quantity']*$result['price'];
								$subtotal+=$total;
								echo $total ?></td>
								<td><a href="?cartdel=<?php echo $result['cartid'] ?>">Xóa</a></td>
							</tr>
							<?php 	}
								} ?>
							
						</table>
						<?php 
							$check_cart = $ct->check_cart();
							if($check_cart){							
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $subtotal;
									Session::set('sum',$subtotal);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php echo ($subtotal+($subtotal*0.1)) ?></td>
							</tr>
					   </table>
					   <?php 
					   }else{
							echo "Your cart is empty.Please shopping now!!";
					   }?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop4.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check2.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
 ?>
