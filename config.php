<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("db.php");

    class ConexionPDO{
        protected $dbCnx;
        public function __construct(){
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }
    }

    class ConfigCategorias extends ConexionPDO{
        private $id;
        private $nombre;
        private $descripcion;
        private $imagen;

        public function __construct($id = 0, $nombre = "", $descripcion="", $imagen=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> descripcion = $descripcion;
            $this -> imagen = $imagen;
            parent::__construct();
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
                $stm = $this->dbCnx ->prepare("UPDATE categorias SET nombre = ?, descripcion = ?, imagen = ? WHERE id =?");
                $stm -> execute([$this->nombre,$this->descripcion, $this->imagen,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class ConfigEmpleados extends ConexionPDO{
        private $id;
        private $nombre;
        private $celular;
        private $direccion;
        private $imagen;

        public function __construct($id = 0, $nombre = "", $celular=0,$direccion="", $imagen=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> celular = $celular;
            $this -> direccion = $direccion;
            $this -> imagen = $imagen;
            parent::__construct();
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

    class ConfigClientes extends ConexionPDO{
        private $id;
        private $nombre;
        private $celular;
        private $compañia;
        

        public function __construct($id = 0, $nombre ='', $celular=0,$compañia=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> celular = $celular;
            $this -> compañia = $compañia;
            parent::__construct();
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

        public function setCompañia($compañia){
            $this->compañia = $compañia;
        }

        public function getCompañia(){
            return $this->compañia;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO clientes (nombre, celular, compañia) values(?,?,?)");
                $stm -> execute([$this->nombre, $this->celular, $this->compañia]);
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
                $stm = $this->dbCnx ->prepare("UPDATE clientes SET nombre = ?, celular = ?, compañia = ? WHERE id =?");
                $stm -> execute([$this->nombre, $this->celular, $this->compañia,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    class ConfigProveedores extends ConexionPDO{
        private $id;
        private $nombre;
        private $telefono;
        private $ciudad;
        

        public function __construct($id = 0, $nombre=0,$telefono=0,$ciudad=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> telefono = $telefono;
            $this -> ciudad = $ciudad;
            parent::__construct();
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

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function setCiudad($ciudad){
            $this->ciudad = $ciudad;
        }

        public function getCiudad(){
            return $this->ciudad;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO proveedores (nombre, telefono,ciudad) values(?,?,?)");
                $stm -> execute([$this->nombre, $this->telefono, $this->ciudad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM proveedores");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM proveedores WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminadooo');document.location='provedores.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM proveedores WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE proveedores SET nombre = ?, telefono = ?, ciudad = ? WHERE id =?");
                $stm -> execute([$this->nombre, $this->telefono, $this->ciudad, $this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    class ConfigFacturas extends ConexionPDO{
        private $facturaId;
        private $empleadoId;
        private $clienteId;
        private $fecha;

    public function __construct($facturaId=0,$empleadoId= 0, $clienteId= 0, $fecha=0){
        $this->facturaId = $facturaId;
        $this->empleadoId = $empleadoId;
        $this->clienteId = $clienteId;
        $this->fecha = $fecha;
        parent::__construct();
    }
    
    //Getters
    public function getFacturaId(){
        return $this->facturaId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getClienteId(){
        return $this->clienteId;
    }

    public function getFecha(){
        return $this->fecha;
    }

    //Setters
    public function setFacturaId($facturaId){
        $this->facturaId =$facturaId;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setClienteId($clienteId){
        $this->clienteId =$clienteId;
    }

    public function setFecha($fecha){
        $this->fecha =$fecha;
    }


    public function obtenerEmpleadoId(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT id,nombre FROM empleado");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function EmpleadoId(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT id,nombre FROM empleado WHERE id=:empleadoId");
            $stm->bindParam(":empleadoId",$this->empleadoId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function ClienteId(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT id,nombre FROM clientes WHERE id=:clienteId");
            $stm->bindParam(":clienteId",$this->clienteId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function obtenerClienteId(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT id,nombre FROM clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO facturas(empleadoId,clienteId,fecha) 
            VALUES (:empleadoId,:clienteId,:fecha)");
            $stm->bindParam(":empleadoId",$this->empleadoId);
            $stm->bindParam(":clienteId",$this->clienteId);
            $stm->bindParam(":fecha",$this->fecha);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function getAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturas");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM facturas WHERE facturaId = :id");
            $stm->bindParam(":id",$this->facturaId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturas WHERE facturaId = :id");
            $stm->bindParam(":id",$this->facturaId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE facturas SET empleadoId=:empleadoId , clienteId=:clienteId , fecha=:fecha
            WHERE facturaId = :id");
            $stm->bindParam(":id",$this->facturaId);
            $stm->bindParam(":empleadoId",$this->empleadoId);
            $stm->bindParam(":clienteId",$this->clienteId);
            $stm->bindParam(":fecha",$this->fecha);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
}
?>