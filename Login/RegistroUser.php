<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
    require_once('../Config/db.php');
    require_once('../Config/conectar.php');
    require_once('LoginUser.php');

    class RegistroUser extends Conectar{
        private $id;
        private $IDEmpleado;
        private $email;
        private $username;
        private $password;

        public function __construct($id=0, $IDEmpleado=0, $email='', $username='',$password='',$dbCnx=''){
            $this -> id = $id;
            $this -> IDEmpleado = $IDEmpleado;
            $this -> email = $email;
            $this -> username = $username;
            $this -> password = $password;
            parent::__construct($dbCnx);
        }

        public function setID($id){
            $this->id = $id;
        }

        public function getID(){
            return $this->id;
        }

        public function setIDEmpleado($IDEmpleado){
            $this->IDEmpleado = $IDEmpleado;
        }

        public function getIDEmpleado(){
            return $this->IDEmpleado;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function checkUser($email){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = '$email'");
                $stm->execute();
                if($stm->fetchColumn()){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData(){
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO users ( IDEmpleado, email, username, password) values(?,?,?,?)");
                $stm -> execute([$this->IDEmpleado, $this->email, $this->username, md5($this->password)]);

                $login = new LoginUser();

                $login -> setEmail($_POST['email']);
                $login -> setPassword($_POST['password']);

                $success = $login -> login();

            } catch (Exception $e) {
                return $e->getMessage();
            
            }
        }
    }

?>