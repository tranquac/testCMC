<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php 
				  $getproduct = $product->getproduct_feathered();
				  if($getproduct){
					  while($result = $getproduct->fetch_assoc()){
					
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 
				  }
				}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
		</div>
			<div class="section group">

			<?php 
				  $getproduct_new = $product->getproduct_new();
				  if($getproduct_new){
					  while($result = $getproduct_new->fetch_assoc()){	
			  ?>
					<div class="grid_1_of_4 images_1_of_4">
					<img src="admin/uploads/<?php echo $result['image']?>" alt="" />
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
					</div>
					<?php 
				  }
				}
				?>
			</div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
 ?>

