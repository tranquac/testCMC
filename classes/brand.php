<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    //include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class brand
    {
        private $db;
        //private $fm;

        public function __construct()
        {
            $this->db = new Database();
            //$this->fm = new Format();
        }

        public function insert_brand($brandName){
            $adminPass = $this->fm->validation($brandName);

            $catName = mysqli_real_escape_string($this->db->link,$brandName);

            if(empty($brandName)){
                $alert = "<span style='color:red;'>Brand must be not empty</span>";
                return $alert;
            }else{
                $query = "insert into tbl_brand(brandName) values('$brandName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Brand not Success</span>";
                    return $alert;
                }
            }
        }

        public function show_brand()
        {
            $query = "select * from tbl_brand order by brandId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getBrandById($id){
            $query = "select * from tbl_brand where brandId='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_brand($brandName,$id){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link,$brandName);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($brandName)){
                $alert = "<span style='color:red;'>brand must be not empty</span>";
                return $alert;
            }else{
                $query = "update tbl_brand set brandName = '$brandName' where catId='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Brand not Success</span>";
                    return $alert;
                }
            }
        }

        public function del_brand($id){
            $query = "delete from tbl_brand where brandId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Delete brand Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Delete brand not Success</span>";
                return $alert;
            }
        }
    }
    
?>