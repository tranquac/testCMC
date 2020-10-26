<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'?>
<?php
	$pd = new product();
	if(!isset($_GET['delid'])){
		//echo "<script>window.location ='catlist.php'</script>";
	}else{
		$id = $_GET['delid'];
		$delproduct = $pd->del_product($id);
	}
	
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
		<?php 
            if(isset($delproduct)){
                echo $delproduct;
            }
        ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$pd = new product();
					$pdlist = $pd->show_product();
					if($pdlist){
						$i = 1;
						while($result = $pdlist->fetch_assoc()){

				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $result['product_desc'] ?></td>
					<td class="center"><?php 
						if($result['type']) echo "Feathered";
						else echo "Non_feathered";
					?></td>
					<td><a href="productedit.php?id=<?php echo $result['productId']?>">Edit||</a><a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php 
					$i++;
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
