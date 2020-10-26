<?php include 'inc/header.php';?>
<?php if(!Session::get('adminLogin')){
  header('Location:login.php');
} ?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  <h1>This is admin's page! <?php echo Session::get('adminName') ?></h1>    
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>