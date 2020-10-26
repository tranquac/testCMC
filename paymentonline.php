<?php
	include 'inc/header.php';
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrderOnline = $ct->insertOrder_online($customer_id);
        if($insertOrderOnline){
            $del_cart = $ct->del_all_cart();
            header('Location:success.php');
        }
    }
?>
<style>
    .box_left{
        width: 50%;
        border: 1px solid #666;
        float: left;
        padding: 5px;
    }
    .box_right{
        padding: 5px;
        width: 45%;
        border:1px solid #666;
        float: right;
    }
	.submit_order{
		padding: 10px 40px;
		border: none;
		background-color: red;
		font-size: 25px;
		color: white;
		cursor: pointer;
	}
</style>
<h1 style="color:chocolate;">Với hình thức này bạn sẽ thanh toán với số dư hiện có.</h1>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="heading">
                <h3>Online Payment</h3>
                <?php 
					if(isset($insertOrderOnline)&&$insertOrderOnline==false){
						echo "<span class='error'>Bạn không có dủ tiền.Vui long nạp thêm tại <a href='naptien.php'>trang nạp tiền</a></span>";
					}
					?>
            </div>
            <div class="clear">
                <div class="box_left">
                <div class="cartpage">
					<!-- <h2>Your Cart</h2> -->
					<form action="" method="POST">
						<table class="tblone">
						<?php 
								$i = 1;
								$getproduct = $ct->get_product_cart();
								$subtotal = 0;
								if($getproduct){
									while($result = $getproduct->fetch_assoc()){	
							?>
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $result['productName'] ?></td>
								<td>$<?php echo $result['price'] ?></td>
								<td>
								<?php echo $result['quantity'] ?>
								</td>
								<td>$<?php 
								$total = $result['quantity']*$result['price'];
								$subtotal+=$total;
								echo $total ?></td>
							</tr>
							<?php 	}
								} 
								?>
							
						</table>
						<?php 
							$check_cart = $ct->check_cart();
							if($check_cart){							
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$<?php echo $subtotal;
									Session::set('sum',$subtotal);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$<?php echo ($subtotal+($subtotal*0.1)) ?></td>
							</tr>
					   </table>
					   <?php 
					   }else{
							echo "Your cart is empty.Please shopping now!!";
					   }?>
					</div>
                </div>
                <div class="box_right">
				<table class="tblone">
                <?php 
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                ?>
                <tr>
                    <td>Name</td>
                    <td>-</td>
                    <td><?php echo $result['name']?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>-</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>-</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>-</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td>-</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Update Profile</a></td>
                </tr>
                <?php    }
                    }?>
            </table>
                </div>
			</div>
		 </div>
		 <br>
		<center><a href="?orderid=order" class="submit_order">Order Now</a></center>
 		</div>
 </div>
</form>
	 <?php
	include 'inc/footer.php';
 ?>
