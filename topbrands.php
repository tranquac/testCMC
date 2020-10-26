<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Lamborghini</h3>
    		</div>
    		<div class="clear"></div>
		</div>
		<div id="1" class="section group">
			  <?php 
				 $all = $product->getAllLam();
				 if($all){
					 while($result = $all->fetch_assoc()){ 
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
				<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 	 }
				 }?>
			</div>

		<div class="content_bottom">
    		<div class="heading">
    		<h3>Ferrari</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			  <?php 
				 $all = $product->getAllFe();
				 if($all){
					 while($result = $all->fetch_assoc()){ 
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
				<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 	 }
				 }?>
			</div>

	<div class="content_bottom">
    		<div class="heading">
    		<h3>Porsche</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			  <?php 
				 $all = $product->getAllPor();
				 if($all){
					 while($result = $all->fetch_assoc()){ 
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
				<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 	 }
				 }?>
			</div>
			
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Mountain Biking</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			  <?php 
				 $all = $product->getAllMoun();
				 if($all){
					 while($result = $all->fetch_assoc()){ 
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
				<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 	 }
				 }?>
			</div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
 ?>