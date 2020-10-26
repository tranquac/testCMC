<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
?>
<?php 
    if(isset($_GET['status']) && $_GET['status']==1){
        $id = $_GET['id'];
        $ct = new cart();
        $ct->changeStatus($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th>No.</th>
                            <th>Order Time</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Customer Info</th>
                            <th>Thanh toán</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                            $ct = new cart();
                            $i = 1;
                            $get_inbox_cart = $ct->get_inbox();
                            if($get_inbox_cart){
                                while($result = $get_inbox_cart->fetch_assoc()){

                            
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $result['date_order']?></td>
							<td><?php echo $result['productName']?></td>
							<td><?php echo $result['quantity']?></td>
							<td>$<?php echo $result['price']?></td>
                            <td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">View Info</a></td>
                            <td>
                                <?php 
                                    if($result['tratien'] == 0){
                                        echo '<b>No</b>';
                                    }else{
                                        echo '<b>Yes</b>';
                                    }
                                ?>
                            </td>
							<td>
                                <?php 
                                    if($result['status'] == 0){
                                        $idUp = $result['id'];
                                        echo '<a href="?status=1&&id='.$idUp.'"><b>Pending</b></a>';
                                    }else{
                                        echo '<b>Shipping</b>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php     }
                            }?>
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
