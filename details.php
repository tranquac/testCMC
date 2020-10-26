<?php
	include 'inc/header.php';
?>
<?php
	if(!isset($_GET['proid']) && $_GET['proid']==NULL){
        echo "<script>'window.location = '404.php''</script>";
    }else{
        $id = $_GET['proid'];
	}
	
	if(isset($_POST['submit'])) { 
		$quantity = $_POST['quantity'];
        $addToCart = $ct->add_to_cart($quantity,$id);
	} 
?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['binhluan_submit'])){
		$binhluan_insert = $cs->insert_binhluan($_POST);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php 
				  $getproduct = $product->getProductById($id);
				  if($getproduct){
					  while($result = $getproduct->fetch_assoc()){	
			  ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
					<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'] ?></h2>
					<p><?php echo $result['product_desc'] ?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price'] ?></span></p>
						<p>Category: <span>$<?php echo $result['brandName'] ?></span></p>
						<p>Brand:<span>$<?php echo $result['catName'] ?></span></p>
					</div>
					<?php 
				  }
				}
				?>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						<?php 
							if(isset($addToCart)){
								echo "<br><br><span style='color:red;font-size:20pxl'>Product Already Added</span>";
							}
						?>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Supercar Detailing is one of the top car detailers in the UK and our car detailing services have been rated the 5.0 star solution from 125 loyal customers.
			We’re number one because we have an expert knowledge of all types of paintwork finishes.</p>
	        <p>Supercar Detailing offers a bespoke and exclusive car detailing service to discerning clients in the South East of England. Despite our main bulk of clients being within the London, Kent and Surrey borders, we are happy to discuss travelling further in some cases.</p>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 
						$getbrand = $brand->show_brand();
						if($getbrand){
							while($result = $getbrand->fetch_assoc()){	
			  		?>
					  <li><a href="topbrands.php"><?php echo $result['brandName'] ?></a></li>
					  <?php 
				  }
				}
				?>
    				</ul>
    	
 				</div>
		 </div>
	 </div>
	 <div class="binhluan">
		 <?php if(isset($binhluan_insert)){
			 echo $binhluan_insert;
		 }?>
		 <form action="" method="POST">
			 <p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
		<p> <input type="text" placeholder="Nhập tên"  class="form-control" name="nguoibinhluan"></p>
		 <p><textarea name="binhluan" rows="5" style="resize: none;" class="form-control" placeholder="Bình luận của bạn..."></textarea></p>
		 <p><input type="submit" name="binhluan_submit" value="Gửi phản hồi" class="btn btn-success"></p>
		 </form>
	 </div>
	 <div class="showbinhluan" style="border:1px solid gray;">
	 	<?php 
			$showbinhluan = $cs->get_binhluan($id);
			if(isset($showbinhluan)){
				while($resultbl = $showbinhluan->fetch_assoc()){	
		?>
			<div class="motbinhluan" >
			<p style="color:green;"><b><?php echo $resultbl['nguoibinhluan']?></b></p>
			<p><?php echo $resultbl['binhluan']?></p>
			</div>
			<hr>
				<?php }}
				else{
					echo '<p>Chưa có bình luận nào cho bài viết này</p>';
				}?>
	 	</div>
	 <?php
	include 'inc/footer.php';
 ?>
