<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("db.php");

    class Config{
        private $id;
        private $imagen;
        private $nombres;
        private $direccion;
        private $logros;
        private $ser;
        private $ingles;
        private $review;
        private $skllis;
        private $especialidad;
        protected $dbCnx;

        public function __construct($id = 0,$imagen="", $nombres = "", $direccion = "", $logros = "", $ser = "", $ingles = "", $review = "", $skllis="", $especialidad=""){
            $this -> id = $id;
            $this -> imagen = $imagen;
            $this -> nombres = $nombres;
            $this -> direccion = $direccion;
            $this -> logros = $logros;
            $this -> ser = $ser;
            $this -> ingles = $ingles;
            $this -> review = $review;
            $this -> skllis = $skllis;
            $this -> especialidad = $especialidad;
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setNombres($nombres){
            $this->nombres = $nombres;
        }

        public function getNombres(){
            return $this->nombres;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setLogros($logros){
            $this->logros = $logros;
        }

        public function getLogros(){
            return $this->logros;
        }

        public function setSer($ser){
            $this->ser = $ser;
        }

        public function getSer(){
            return $this->ser;
        }
        public function setIngles($ingles){
            $this->ingles = $ingles;
        }

        public function getIngles(){
            return $this->ingles;
        }
        public function setReview($review){
            $this->review = $review;
        }

        public function getReview(){
            return $this->review;
        }
        public function setSkllis($skllis){
            $this->skllis = $skllis;
        }

        public function getSkllis(){
            return $this->skllis;
        }
        public function setEspecialidad($especialidad){
            $this->especialidad = $especialidad;
        }

        public function getEspecialidad(){
            return $this-$especialidad;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO campers (imagen, nombre, direccion, logros, ser, ingles, review, skllis,especialidad) values(?,?,?,?,?,?,?,?,?)");
                $stm -> execute([$this->imagen, $this->nombres,$this->direccion,$this->logros,$this->ser,$this->ingles,$this->review,$this->skllis,$this->especialidad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM campers");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM campers WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM campers WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE campers SET nombre = ?, direccion = ?,logros  = ? WHERE id =?");
                $stm -> execute([$this->nombres,$this->direccion,$this->logros,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class ConfigCategorias{
        private $id;
        private $nombre;
        private $descripcion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombre = "", $descripcion="", $imagen=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> descripcion = $descripcion;
            $this -> imagen = $imagen;
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO categorias (nombre, descripcion, imagen) values(?,?,?)");
                $stm -> execute([$this->nombre, $this->descripcion,$this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM categorias WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminadoo');document.location='categoria.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM categorias WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE categorias SET nombre = ?, descripcion = ? WHERE id =?");
                $stm -> execute([$this->nombre,$this->descripcion,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class ConfigEmpleados{
        private $id;
        private $nombre;
        private $celular;
        private $direccion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombre = "", $celular=0,$direccion="", $imagen=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> celular = $celular;
            $this -> direccion = $direccion;
            $this -> imagen = $imagen;
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO empleado (nombre, celular, direccion, imagen) values(?,?,?,?)");
                $stm -> execute([$this->nombre, $this->celular, $this->direccion,$this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM empleado");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM empleado WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminadoo');document.location='empleados.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM empleado WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE empleado SET nombre = ?, celular = ?, direccion = ? WHERE id =?");
                $stm -> execute([$this->nombre,$this->celular, $this->direccion,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class ConfigClientes{
        private $id;
        private $celular;
        private $compañia;
        protected $dbCnx;

        public function __construct($id = 0, $celular=0,$compañia=""){
            $this -> id = $id;
            $this -> celular = $celular;
            $this -> compañia = $compañia;
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCompañia($compañia){
            $this->compañia = $compañia;
        }

        public function getCompañia(){
            return $this->compañia;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO clientes (celular, compañia) values(?,?)");
                $stm -> execute([$this->celular, $this->compañia]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM clientes WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminadooo');document.location='clientes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM clientes WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE clientes SET celular = ?, compañia = ? WHERE id =?");
                $stm -> execute([$this->celular, $this->compañia,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>