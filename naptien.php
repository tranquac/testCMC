<?php
	include 'inc/header.php';
?>
<?php 
    if(isset($_POST['napngay'])){
        $id = Session::get('customer_id');
        $naptien = $cs->nap_tien($id,$_POST);
    }
?>
<div class="container">
    <?php
        if(isset($naptien)){
            echo $naptien;
        }
    ?>
<form method="POST" action="">
  <div class="form-group">
    <label><h5>Số tiền bạn muốn nạp:</h5></label>
    <input type="number" name="sotien" class="form-control" min="0" placeholder="Nhập só tiền ở đây...">
  </div>
  <div class="form-group">
    <label><h5>Chọn loại thẻ:</h5></label>
    <select class="form-control" name="loaithe">
      <option>Vietel</option>
      <option>Mobifone</option>
      <option>Vinafone</option>
    </select>
  </div>
  <div><input type="submit" name="napngay" value="Nạp ngay" class="btn btn-primary btn-block"></div>
  <hr>
</form>
<?php
	include 'inc/footer.php';
 ?>