<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    //include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class product
    {
        private $db;
       // private $fm;

        public function __construct()
        {
            $this->db = new Database();
           // $this->fm = new Format();
        }

        public function search_product($tukhoa){
            $query = "select * from tbl_product where productName like '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_product($data,$file){
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = 'uploads/'.$unique_image;

            if(empty($productName || $brand  ||$category || $price ||$product_desc || $type|| $file_name)){
                $alert = "<span style='color:red;'>Fiels must be not empty</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "insert into tbl_product(productName,catId,brandId,product_desc,type,price,image) values('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Product Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Product not Success</span>";
                    return $alert;
                }
            }
        }

        public function show_product()
        {
            $query = "select tbl_product.*,tbl_category.catName,tbl_brand.brandName from tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId
            inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId
            order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getProductById($id){
            $query = "select tbl_product.*,tbl_category.catName,tbl_brand.brandName from tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId
            inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$file,$id){

            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = 'uploads/'.$unique_image;

            if(empty($productName || $brand  ||$category || $price ||$product_desc || $type|| $file_name)){
                $alert = "<span style='color:red;'>Fiels must be not empty</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //neu nguoi dung chon anh
                    if($file_size > 10000){
                        $alert = "<span class='success'>Image should be less than 2M!</span>";
                        return $alert;
                    }else if(in_array($file_ext,$permited)===false){
                        $alert = "<span class='success'>You can upload only:-".implode(', ',$permited)."</span>";
                        return $alert;
                    }
                    $query = "update tbl_product set
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category',
                    type = '$type',
                    price = '$price',
                    image = '$unique_image',
                    product_desc = '$product_desc'
                    where productId = '$id'";
                }else{
                    $query = "update tbl_product set
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category',
                    type = '$type',
                    price = '$price',
                    product_desc = '$product_desc'
                    where productId = '$id'";
                }
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Product update Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Product update not Success</span>";
                    return $alert;
                }
            }
        }

        public function del_product($id){
            $query = "delete from tbl_product where productId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Delete Product Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Delete Product not Success</span>";
                return $alert;
            }
        }


        //END Backend
        public function getproduct_feathered(){
            $query = "Select * from tbl_product where type='0'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new(){
            $query = "Select * from tbl_product order by productId desc LIMIT 0,4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastLam(){
            $query = "Select * from tbl_product where brandId=12 order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastFe(){
            $query = "Select * from tbl_product where brandId=13 order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastPor(){
            $query = "Select * from tbl_product where brandId=14 order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastMoun(){
            $query = "Select * from tbl_product where brandId=15 order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAllLam(){
            $query = "Select * from tbl_product where brandId=12 order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getAllFe(){
            $query = "Select * from tbl_product where brandId=13 order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getAllPor(){
            $query = "Select * from tbl_product where brandId=14 order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getAllMoun(){
            $query = "Select * from tbl_product where brandId=15 order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAllProduct(){
            $query = "Select * from tbl_product";
            $result = $this->db->select($query);
            return $result;
        }
    }
    
?>