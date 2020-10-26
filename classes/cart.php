<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    //include_once ($filepath.'/../lib/format.php');
?>

<?php
    class cart{
        private $db;
        //private $fm;

        public function __construct()
        {
            $this->db = new Database();
            //$this->fm = new Format();
        }

        public function add_to_cart($quantity,$id){
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $sId = session_id();

            $query = "select * from tbl_product where productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $productName=$result['productName'];
            $price=$result['price'];
            $image=$result['image'];

            $check_cart = false;//"select * from tbl_cart where cartid = '$id' and sId = '$sId'";
            if($check_cart){
                $msg = "Product Already Added";
                return $msg;
            }else{
                $query_insert = "insert into tbl_cart(productId,sId,productName,price,quantity,image) values ('$id','$sId','$productName','$price','$quantity','$image')";
                $insert_cart = $this->db->insert($query_insert);
                if($insert_cart){
                    header('Location:cart.php');
                }else{
                    header('Location:404.php');
                }
            }
        }

        public function get_product_cart(){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        
        public function update_quantity_cart($quantity,$cartid){
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);

            $query = "update tbl_cart set
                    quantity = '$quantity'
                    where cartid='$cartid'";
            $result = $this->db->update($query);
            if($result){
                $msg = "<span class='success'>Product Quantity Updated Successfully</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Product Quantity Updated Not Successfully</span>";
                return $msg;
            }

        }

        public function del_cart($id){
            $query = "delete from tbl_cart where cartid='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='error'>Delete Cart Success</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Delete Cart not Success</span>";
                return $alert;
            }
        }

        public function check_cart(){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_all_cart(){
            $sId = session_id();
            $query = "delete from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insertOrder($id){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $getProduct = $this->db->select($query);
            if($getProduct){
                while($result = $getProduct->fetch_assoc()){
                    $productid = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price']*$quantity;
                    $image = $result['image'];
                    $customer_id =$id;

                    $query_order = "insert into tbl_order(productId,productName,customer_id,quantity,price,image) values('$productid','$productName','$customer_id','$quantity','$price','$image')";
                    $insert_order = $this->db->insert($query_order);
                }
            }
        }

        public function changeStatus($id){
            $changeStatus = "update tbl_order set status = '0' where id='$id'";
            $ok1 = $this->db->update($changeStatus);
        }

        public function insertOrder_Online($id){
            $select = "select tbl_customer.money from tbl_customer where id='$id'";
            $nhan = $this->db->select($select);
            $tienco = 0;
            if($nhan != false){
                $value = $nhan->fetch_assoc();
                $tienco = $value['money'];
            }//so tien dang co

            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $getProduct = $this->db->select($query);
            if($getProduct){
                while($result = $getProduct->fetch_assoc()){
                    $productid = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price']*$quantity;
                    $image = $result['image'];
                    $customer_id =$id;

                    if($tienco<$price){
                        return false;
                    }else{
                        $query_order = "insert into tbl_order(productId,productName,customer_id,quantity,price,image,tratien) values('$productid','$productName','$customer_id','$quantity','$price','$image','1')";
                        $insert_order = $this->db->insert($query_order);
                        return true;
                    }
                }
            }


        }

        public function get_inbox(){
            $query = "select * from tbl_order order by date_order";
            $get_inbox = $this->db->select($query);
            return $get_inbox;
        }
    }
?>