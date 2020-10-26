<?php
	include 'inc/header.php';
?>
<style>

    div.payment{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        text-decoration: none;
        background-color: lightblue;
    }
</style>
 <div class="main">
    <div class="content" style="text-align: center;">
    	<div class="section group">
            <div class="content-top">
                <div class="heading">
                    <h2>Payment Method:</h2>
                </div>
            </div>
         </div>
         <div class="payment">
         <a class="" href="paymentoffline.php">Offline Payment</a>
         <br>
         <br>
         <a class="" href="paymentonline.php">Online Payment</a>
         <br>
         <br>
         <a class="" href="cart.php"><< Previous</a>
         </div>
 	</div>
</div>
	 <?php
	include 'inc/footer.php';
 ?>
