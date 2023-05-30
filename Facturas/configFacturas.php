<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


/* 
    require_once("../Config/config.php");
     extends Conexion
    ,$dbCnx=""
    parent :: __construct($dbCnx);
*/
    require_once("../Config/config.php");

    class Factura extends Conexion{
        
        private $facturaId;
        private $empleadoId;
        private $clienteId;
        private $fecha;




        public function __construct($facturaId=0,$empleadoId="",$clienteId="",$fecha="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->facturaId=$facturaId;
            $this->empleadoId=$empleadoId;
            $this->clienteId=$clienteId;
            $this->fecha=$fecha;
        }

        

        


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO facturas(facturaId,empleadoId,clienteId,fecha) VALUES(?,?,?,?)");
                $stm->execute([$this->facturaId,$this->empleadoId,$this->clienteId,$this->fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM facturas");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectAllId(){
            try {
                $stm= $this->dbCnx->prepare("SELECT f.facturaId, e.nombre , c.compañia, f.fecha FROM facturas f JOIN empleados e ON f.empleadoId = e.empleadoId JOIN clientes c ON f.clienteId = c.clienteId;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM facturas WHERE facturaId=?");
                $stm->execute([$this->facturaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM facturas WHERE facturaId=?");
                $stm->execute([$this->facturaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE facturas SET empleadoId=?,clienteId=?,fecha=? WHERE facturaId = ?");
                $stm->execute([$this->empleadoId,$this->clienteId,$this->fecha,$this->facturaId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        /**
         * Get the value of facturaId
         */ 
        public function getFacturaId()
        {
                return $this->facturaId;
        }

        /**
         * Set the value of facturaId
         *
         * @return  self
         */ 
        public function setFacturaId($facturaId)
        {
                $this->facturaId = $facturaId;

                return $this;
        }

        /**
         * Get the value of empleadoId
         */ 
        public function getEmpleadoId()
        {
                return $this->empleadoId;
        }

        /**
         * Set the value of empleadoId
         *
         * @return  self
         */ 
        public function setEmpleadoId($empleadoId)
        {
                $this->empleadoId = $empleadoId;

                return $this;
        }

        /**
         * Get the value of clienteId
         */ 
        public function getClienteId()
        {
                return $this->clienteId;
        }

        /**
         * Set the value of clienteId
         *
         * @return  self
         */ 
        public function setClienteId($clienteId)
        {
                $this->clienteId = $clienteId;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }
    }
    

?>