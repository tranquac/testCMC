<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/brand.php'?>

<?php
    $pd = new product();
    if(!isset($_GET['id']) && $_GET['id']==NULL){
        echo "<script>'window.location = 'productlist.php''</script>";
    }else{
        $id = $_GET['id'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$updateProduct = $pd->update_product($_POST,$_FILES,$id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa sản phẩm</h2>
               <div class="block copyblock"> 
               <?php 
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
                ?>
                <?php 
                    $get_product_name = $pd->getProductById($id);
                    if(isset($get_product_name)){
                        while($result = $get_product_name->fetch_assoc()){
                ?>
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Product Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['productName'] ?>" name="productName" placeholder="Sửa san pham..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select Category</option>
                            <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result_cat = $catlist->fetch_assoc()){
                            ?>
                            <option 
                            <?php if($result_cat['catId'] == $result['catId']){echo 'selected';} ?>
                            value="<?php echo $result['catId'] ?>"><?php echo $result_cat['catName']?></option>
                                <?php }} ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php 
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while($result_brand = $brandlist->fetch_assoc()){
                            ?>
                            <option 
                            <?php if($result_brand['brandId'] == $result['brandId']){echo 'selected';} ?>
                            value="<?php echo $result['brandId'] ?>"><?php echo $result_brand['brandName']?></option>
                                <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $result['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" value="<?php echo $result['price'] ?>" type="text" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result['image'] ?>" width="80">
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select name="type" id="select" name="select">
                            <option>Select Type</option>
                            <?php
                                if($result['type']==0){
                            ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                                <?php }else{ ?>
                            <option  value="0">Featured</option>
                            <option selected value="1">Non-Featured</option>
                                <?php } ?>
                        </select>
                    </td>
                </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>