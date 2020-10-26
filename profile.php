<?php
	include 'inc/header.php';
?>
<?php
	if($check_login==false){
        header('Location:login.php');
    }
?>
            <div class="container" style="background-color: lightgray;">
            <h2>Thông tin khách hàng:</h2>
            <table class="table table-striped" style="text-align: center;">
                <?php 
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                ?>
                <tr>
                    <td><b>Name</b></td>
                    <td>-</td>
                    <td><?php echo $result['name']?></td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td>-</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td><b>Phone</b></td>
                    <td>-</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>-</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td><b>Adress</b></td>
                    <td>-</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php"><b>Update Profile</b></a></td>
                </tr>
                <?php    }
                    }?>
            </table>
            </div>
	 <?php
	include 'inc/footer.php';
 ?>
