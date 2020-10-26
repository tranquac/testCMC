<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include_once 'lib/database.php';
	//include_once 'helpers/format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db = new Database();
	//$fm = new Format();
	$cs = new customer();
    $ct = new cart();
	$cat= new category();
	$brand = new brand();
	$product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<style>
	.money{
		font-size: 25px;
		text-align: center;
		
	}
</style>

<!DOCTYPE HTML>
<head>
<title>SuperCar Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo3.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
						<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
						<input name="search_product" type="submit" value="Tìm kiếm">
				    </form>
				</div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"><?php 
									$check_cart = $ct->check_cart();
									if($check_cart){
										echo '$'.Session::get("sum");
									}else{
										echo 'Empty';
									}
								?></span>
							</a>
						</div>
				  </div>

				  <?php 
				 	if(isset($_GET['customer_id'])){	
						 $delCart = $ct->del_all_cart();
						session_destroy();
						header('Location:login.php');
					 } 
				  ?>
		   <div class="login">
		   <?php 
				 $login_check = Session::get('customer_login');
				 if($login_check==false){
					 echo "<a href='login.php'>Login</a></div>";
				 }else{
					 $customerid = Session::get('customer_id');
					$money = $cs->getMoneyCustomer($customerid);
					if(isset($money)){
						while($resultMoney = $money->fetch_assoc()){		
							echo '<a href="?customer_id='.Session::get('customer_id').'">Logout</a></div>';
							echo '<div class="money">'.Session::get('customer_name').' <b>: $'.$resultMoney['money'].'</b></div>';
						}
					}
				 }
		   ?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
	</b></div>
	 <br>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <?php 
		 $check_cart = $ct->check_cart();
		 if($check_cart){
			echo '<li><a href="cart.php">Thanh toán</a></li>';
		 } 
	  ?>
	  <?php 
		 $check_login = Session::get('customer_login');
		 if($check_login){
			echo '<li><a href="naptien.php">Nạp tiền</a></li>';
			echo '<li><a href="chuyentien.php">Chuyển tiền</a></li>';
			echo '<li><a href="profile.php">Profile</a></li>';
		 }
	  ?>
	  <li><a href="contact.php">Contact</a></li>
	  <div class="clear"></div>
	</ul>
</div>
