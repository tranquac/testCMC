<?php
	include 'inc/header.php';
?>
 <div class="main">
    <div class="content">
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $tukhoa = $_POST['tukhoa'];
                $search_product1 = $product->search_product($tukhoa);
            }
        ?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Kết quả tìm kiếm <?php echo $tukhoa?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php 
				  if($search_product1){
					  while($result = $search_product1->fetch_assoc()){
					
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
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

