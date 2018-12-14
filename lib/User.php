<?php
    include_once 'Session.php';
    include 'Database.php';

    class User {
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function userRegistration($data){
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $username = $data['username'];
            $email = $data['email'];
            $pswd = md5($data['pswd']);
            $role = $data['role'];
            $chk_email = $this->checkEmail($email);

            if ($firstname == "" OR $lastname == "" OR $username =="" OR $email == "" OR $pswd == "" OR $role == "") {
                $msg = "<div class='alert alert-danger'>Error! Field Must Not Be Empty</div>";
                return $msg;
            }
            if (strlen($username) < 3) {
                $msg = "<div class='alert alert-danger'>Error! username should be longer than 3 character</div>";
                return $msg;
            }elseif (preg_match('/[^a-z0-9_-]+/i', $username )) {
                $msg = "<div class='alert alert-danger'>Error! username must only contain alphanumerical, dashes, underscores</div>";
                return $msg;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = "<div class='alert alert-danger'>Error! the enail address is not valid</div>";
                return $msg;
            }
            if ($chk_email == true) {
                $msg = "<div class='alert alert-danger'>Error! the email address is already exist</div>";
                return $msg;
            }
            $sql = "INSERT INTO boot_oop(firstname, lastname, username, email, password, role) VALUES(:firstname, :lastname, :username, :email, :password, :role)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':firstname', $firstname);
            $query->bindValue(':lastname', $lastname);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $pswd);
            $query->bindValue(':role', $role);
            $result = $query->execute();
            if ($result) {
                $msg = "<div class='alert alert-success'>Succes! User registered successfully</div>";
                return $msg;
            }else {
                $msg = "<div class='alert alert-danger'>Alert! User could not registered registered at this moment, please try again later</div>";
                return $msg;
            }

        }
        public function checkEmail($email){
            $sql = "SELECT email FROM boot_oop WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            }else{
                return false;
            }
        }
        public function getLoginUser($email,$pswd){
            $sql = "SELECT * FROM boot_oop WHERE email = :email AND password = :password LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $pswd);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }
        public function userLogin($data){
            $email = $data['email'];
            $pswd = md5($data['pswd']);
            $chk_email = $this->checkEmail($email);
            if ($email == "" OR $pswd == "") {
                $msg = "<div class='alert alert-danger'>Error! Field Must Not Be Empty</div>";
                return $msg;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = "<div class='alert alert-danger'>Error! the enail address is not valid</div>";
                return $msg;
            }
            if ($chk_email == false) {
                $msg = "<div class='alert alert-danger'>Error! the email address not exist</div>";
                return $msg;
            }
            $result = $this->getLoginUser($email,$pswd);
            if ($result) {
                Session::init();
                Session::set("login", true);
                Session::set("id", $result->id);
                Session::set("firstname", $result->firstname);
                Session::set("lastname", $result->lastname);
                Session::set("username", $result->username);
                Session::set("email", $result->email);
                Session::set("role", $result->role);
                Session::set("loginmsg", "<div class='alert alert-success'>Success! You are looged in</div>");
                header("Location: index.php");
            }else {
                $msg = "<div class='alert alert-danger'>Error! Data not found</div>";
                return $msg;
            }
        }

        public function getUserById($userid){
            $sql = "SELECT * FROM boot_oop WHERE id = :id LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $userid);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function updateUserData($userid, $data){
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $username = $data['username'];
            $email = $data['email'];
            $sql = "UPDATE boot_oop SET firstname = :firstname, lastname = :lastname, username = :username, email = :email WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':firstname', $firstname);
            $query->bindValue(':lastname', $lastname);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':id', $userid);
            $result = $query->execute();
            if ($result) {
                $msg = "<div class='alert alert-success'>Succes! User data updated successfully</div>";
                return $msg;
            }else {
                $msg = "<div class='alert alert-danger'>Alert! User could not update data at this moment, please try again later</div>";
                return $msg;
            }
        }


    }



?>
