<?php
	include 'inc/header.php';
?>
<?php 
    if(isset($_POST['chuyen'])){
        $id = Session::get('customer_id');
        $chuyen = $cs->chuyen_tien($id,$_POST);
    }
?>
<div class="container">
    <?php
        if(isset($chuyen)){
            echo $chuyen;
        }
    ?>
<form method="POST" action="">
  <div class="form-group">
    <label><h5>Người nhận(email):</h5></label>
    <input type="email" name="nguoinhan" class="form-control" placeholder="Người nhận...">
  </div>
  <div class="form-group">
    <label><h5>Số tiền:</h5></label>
    <input type="number" name="sotien" class="form-control" min="0" placeholder="Số tiền...">
  </div>
  <div><input type="submit" name="chuyen" value="Chuyển ngay" class="btn btn-primary btn-block"></div>
  <hr>
</form>
<?php
	include 'inc/footer.php';
 ?>