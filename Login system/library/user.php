<?php
    include_once "session.php";
    include "database.php";

    class user{
        private $db;
        public function __construct(){
            $this->db = new database();
        }
        public function userRegistration($data){
            $name      = $data['name'];
            $username  = $data['username'];
            $email     = $data['email'];
            $password = md5($data['password']);
            
            $chk_email = $this->emailCheck($email);
            
            if($name == "" || $username == "" || $email == "" || $password == "" ){
                $msg = "<div class='alert alert-danger'><strong> Error !</strong> Field Must Not Be Empty</div>";
                return $msg;
            }
                if(strlen($username) < 3){
                     $msg = "<div class='alert alert-danger'><strong> Error !</strong> Username is too short</div>";
                return $msg;
                }elseif(preg_match('/[^a-z0-9_-]+/i' ,$username)){
                     $msg = "<div class='alert alert-danger'><strong> Error !</strong> Username Must Contain Alphanumerical Characters</div>";
                }
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $msg = "<div class='alert alert-danger'><strong> Error !</strong> Email is not valid</div>";
                return $msg;
                }
                if($chk_email == true){
                    $msg = "<div class='alert alert-danger'><strong> Error !</strong> Email already exists</div>";
                return $msg;
                }
            $sql = "INSERT INTO tbl_user (name, username, email, password) VALUES(:name, :username, :email, :password)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $result = $query->execute();
            if($result){
                $msg = "<div class='alert alert-success'><strong> Success !</strong> You have been registered</div>";
                    return $msg;
            }else{
                $msg = "<div class='alert alert-success'><strong> Error !</strong> Sorry !</div>";
                    return $msg;
            }
            }
        
        
    
        public function emailCheck($email){
            $sql = "SELECT email FROM tbl_user WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->execute();
            if($query->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getLoginuser($email, $password){
            $sql = "SELECT email FROM tbl_user WHERE email = :email AND password=:password";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }
        public function userLogin($data){
            $email     = $data['email'];
            $password = md5($data['password']);
            
            $chk_email = $this->emailCheck($email);
            
            if($name == "" || $username == "" || $email == "" || $password == "" ){
                $msg = "<div class='alert alert-danger'><strong> Error !</strong> Field Must Not Be Empty</div>";
                return $msg;
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $msg = "<div class='alert alert-danger'><strong> Error !</strong> Email is not valid</div>";
                return $msg;
                }
                if($chk_email == true){
                    $msg = "<div class='alert alert-danger'><strong> Error !</strong> Email already exists</div>";
                return $msg;
                }
            $result = $this->getLoginuser($email, $password);
            if ($result){
                Session::init();
                Session::set("login", true);
                Session::set("id", $result->id);
                Session::set("name", $result->name);
                Session::set("username", $result->username);
                Session::set("loginmsg", "<div class='alert alert-success'><strong> success !</strong> you are logged in </div");
                header("Location: index.php");
            }else{
                $msg = "<div class='alert alert-danger'><strong> Error !</strong> Not found</div>";
                return $msg;
            }
        }
    }

?>
