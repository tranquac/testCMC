<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>

<?php
    $cat = new category();
    if(!isset($_GET['id']) && $_GET['id']==NULL){
        echo "<script>'window.location = 'catlist.php''</script>";
    }else{
        $id = $_GET['id'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName'];
		$updateCat = $cat->update_category($catName,$id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
               <?php 
                    if(isset($updateCat)){
                        echo $updateCat;
                    }
                ?>
                <?php 
                    $get_cat_name = $cat->getCatById($id);
                    if(isset($get_cat_name)){
                        while($result = $get_cat_name->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" name="catName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
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