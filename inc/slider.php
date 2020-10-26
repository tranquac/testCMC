
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getLastLam = $product->getLastLam();
					if($getLastLam){
						while($resultLam1 = $getLastLam->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultLam1['productId'] ?>"> <img src="admin/uploads/<?php echo $resultLam1['image'] ?>	" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Lamborghini</h2>
						<p><?php echo $resultLam1['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultLam1['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php 
			   	}
			}
			   ?>
			   <?php 
					$getLastFe = $product->getLastFe();
					if($getLastFe){
						while($getLastFe1 = $getLastFe->fetch_assoc()){
				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $getLastFe1['productId'] ?>"><img src="admin/uploads/<?php echo $getLastFe1['image'] ?>" alt=""  ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Ferrari</h2>
						  <p><?php echo $getLastFe1['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $getLastFe1['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
			   	}
			}
			   ?>
			</div>
			<div class="section group">
			<?php 
					$getLastPor = $product->getLastPor();
					if($getLastPor){
						while($getLastPor1 = $getLastPor->fetch_assoc()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $getLastPor1['productId'] ?>"> <img src="admin/uploads/<?php echo $getLastPor1['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Ferrari</h2>
						<p><?php echo $getLastPor1['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $getLastPor1['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php 
			   	}
			}
			   ?>	
			   <?php 
					$getLastMoun = $product->getLastMoun();
					if($getLastMoun){
						while($getLastMoun1 = $getLastMoun->fetch_assoc()){
				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $getLastMoun1['productId'] ?>"><img src="admin/uploads/<?php echo $getLastMoun1['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Mountain B</h2>
						  <p><?php echo $getLastMoun1['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $getLastMoun1['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
			   	}
			}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="admin/uploads/99d1770893.jpg" alt=""/></li>
						<li><img src="admin/uploads/d528b92412.jpg" alt=""/></li>
						<li><img src="admin/uploads/ae6589ee6e.jpg" alt=""/></li>
						<li><img src="admin/uploads/437f569e32.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>