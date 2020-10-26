<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    //include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class category
    {
        private $db;
       // private $fm;

        public function __construct()
        {
            $this->db = new Database();
            //$this->fm = new Format();
        }

        public function insert_category($catName){
            $adminPass = $this->fm->validation($catName);

            $catName = mysqli_real_escape_string($this->db->link,$catName);

            if(empty($catName)){
                $alert = "<span style='color:red;'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "insert into tbl_category(catName) values('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Category not Success</span>";
                    return $alert;
                }
            }
        }

        public function show_category()
        {
            $query = "select * from tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getCatById($id){
            $query = "select * from tbl_category where catId='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($catName)){
                $alert = "<span style='color:red;'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "update tbl_category set catName = '$catName' where catId='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Category not Success</span>";
                    return $alert;
                }
            }
        }

        public function del_category($id){
            $query = "delete from tbl_category where catId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Delete Category Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Delete Category not Success</span>";
                return $alert;
            }
        }
    }
    
?>