<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>

<?php
    $brand = new brand();
    if(!isset($_GET['id']) && $_GET['id']==NULL){
        echo "<script>'window.location = 'brandlist.php''</script>";
    }else{
        $id = $_GET['id'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$brandName = $_POST['brandName'];
		$updateBrand = $brand->update_brand($brandName,$id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
               <div class="block copyblock"> 
               <?php 
                    if(isset($updateBrand)){
                        echo $updateBrand;
                    }
                ?>
                <?php 
                    $get_brand_name = $brand->getBrandById($id);
                    if(isset($get_brand_name)){
                        while($result = $get_brand_name->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
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