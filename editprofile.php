<?php
	include 'inc/header.php';
?>
<?php
	if($check_login==false){
        header('Location:login.php');
    }
?>
<?php 
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])){
        $updateProfile = $cs->update_Profile($_POST,$id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content-top">
                <div class="heading">
                    <h2>Update Profile Customer</h2>
                </div>
            </div>
            <form action="" method="POST">
            <table class="tblone">
                <?php 
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                ?>
                <?php 
                    if(isset($updateProfile)){
                        echo $updateProfile;
                    }
                ?>
                <tr>
                    <td>Name</td>
                    <td>-</td>
                    <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>-</td>
                    <td><input type="text" name="city" value="<?php echo $result['city']?>"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>-</td>
                    <td><input type="text" name="phone" value="<?php echo $result['phone']?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>-</td>
                    <td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td>-</td>
                    <td><input type="text" name="address" value="<?php echo $result['address']?>"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Update"></td>
                </tr>
                <?php    }
                    }?>
            </table>
            </form> 
 		</div>
 	</div>
</div>
	 <?php
	include 'inc/footer.php';
 ?>
