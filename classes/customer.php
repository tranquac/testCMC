<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    //include_once ($filepath.'/../lib/format.php');
?>

<?php
    class customer{
        private $db;
        //private $fm;

        public function __construct()
        {
            $this->db = new Database();
            //$this->fm = new Format();
        }

        public function insert_binhluan($data){
            $nguoibinhluan = $data['nguoibinhluan'];
            $binhluan = $data['binhluan'];
            $id_binhluan = $data['product_id_binhluan'];

            if($nguoibinhluan==""||$binhluan==""){
                $alert = "<span class='error'>Feilds must be not empty</span>";
                return $alert;
            }else{
                $query = "insert into tbl_binhluan(nguoibinhluan,binhluan,product_id) values('$nguoibinhluan','$binhluan','$id_binhluan')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Bình luận thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Có lỗi xảy ra.Xin kiểm tra lại</span>";
                    return $alert;
                }
            }
        }

        public function get_binhluan($id){
            $query = "select * from tbl_binhluan where product_id='$id'";
            $result = $this->db->select($query);
            if($result){
                return $result;
            }
        }

        public function nap_tien($id,$data){
            $tiennap = $data['sotien'];
            $select = "select tbl_customer.money from tbl_customer where id='$id'";
            $result = $this->db->select($select);
            $tienhienco = 0;
            if($result != false){
                $value = $result->fetch_assoc();
                $tienhienco = $value['money'];
            }
            $tien = $tienhienco+$tiennap;
           $updateMoney = "update tbl_customer set money = '$tien' where id='$id'";
           $result2 = $this->db->update($updateMoney);
           if($result2){
            $alert = "<span class='success'>Chúc mừng bạn nạp tiền thành công!</span>";
            return $alert;
           }else{
            $alert = "<span class='error'>Hệ thống đang có lỗi.Vui lòng thử lại sau.</span>";
            return $alert;
           }
        }

        public function chuyen_tien($id,$data){
            $sotien = $data['sotien'];
            $nguoinhan = $data['nguoinhan'];

            if($sotien=='' || $nguoinhan==''){
                $alert = "<span class='error'>Điền thông tin đầy đủ trước khi chuyển.</span>";
                return $alert;
            }else{
                $select = "select tbl_customer.money from tbl_customer where id='$id'";
            $result = $this->db->select($select);
            $tienhienco = 0;
            if($result != false){
                $value = $result->fetch_assoc();
                $tienhienco = $value['money'];
            }//lay ra tien nguoi chuyen dang co

            $select = "select tbl_customer.money from tbl_customer where email='$nguoinhan'";
            $nhan = $this->db->select($select);
            $tiennguoinhan = 0;
            if($nhan != false){
                $value = $nhan->fetch_assoc();
                $tiennguoinhan = $value['money'];
            }//lay ra so tien nguoi nhan dang co

            $tien = $tienhienco-$sotien;
            $tiennhan = $sotien+$tiennguoinhan;
            if($tien<0){
                $alert = "<span class='error'>Bạn không có đủ tiền để chuyển.</span>";
            }else{
                $updateMoneyNguoiChuyen = "update tbl_customer set money = '$tien' where id='$id'";
                $ok1 = $this->db->update($updateMoneyNguoiChuyen);
                $updateMoneyNguoiNhan = "update tbl_customer set money = '$tiennhan' where email='$nguoinhan'";
                $ok2 = $this->db->update($updateMoneyNguoiNhan);

                if($ok1 && $ok2){
                    $alert = "<span class='success'>Chúc mừng bạn chuyển tiền thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Hệ thống đang có lỗi.Vui lòng thử lại sau.</span>";
                    return $alert;
                }
            }
            }
        }

        

        public function getMoneyCustomer($id){
            $query = "select tbl_customer.money from tbl_customer where id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            $country = mysqli_real_escape_string($this->db->link,$data['country']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

            if($name=="" || $city=="" || $zipcode==""||$email==""||$address==""||$country==""||$phone==""||$password==""){
                $alert = "<span style='color:red;'>Fiels must be not empty</span>";
                return $alert;
            }else{
                $check_email = "select * from tbl_customer where email='$email' limit 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span class='error'>Email Already Existed</span>";
                    return $alert;
                }else{
                    $query = "insert into tbl_customer(name,address,city,country,zipcode,phone,email,password) values('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Create User Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Create User Not Success</span>";
                        return $alert;
                    }
                }
            }
        }

        public function login($data){
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

            if($email==""||$password==""){
                $alert = "<span style='color:red;'>Email and Password must be not empty</span>";
                return $alert;
            }else{
                $check_login = "select * from tbl_customer where email='$email' and password='$password' limit 1";
                $result_check = $this->db->select($check_login);
                if($result_check!=false){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('Location:index.php');
                }else{
                    $alert = "<span class='error'>Email or Password doesn't match Existed</span>";
                    return $alert;
                }
            }
        }

        public function update_Profile($data,$id){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            if($name=="" || $city=="" || $email==""||$address==""||$phone==""){
                $alert = "<span style='color:red;'>Fiels must be not empty</span>";
                return $alert;
            }else{
                $query = "update tbl_customer set name='$name',city='$city',email='$email',address='$address',phone='$phone' where id='$id'";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Update Infomation Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Update Infomation Not Success</span>";
                        return $alert;
                    }
            }
        }

        public function show_customer($id){
            $query = "select * from tbl_customer where id='$id'";
            $result = $this->db->insert($query);
            return $result;
        }
    }
?>


