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

    class FacturaDetalles extends Conexion{
        
        private $facturaDetalleId;
        private $facturaId;
        private $productoId;
        private $cantidad;
        private $precioVenta;




        public function __construct($facturaDetalleId=0,$facturaId="",$productoId="",$cantidad="",$precioVenta="",$dbCnx=""){
            parent :: __construct($dbCnx);

            $this->facturaDetalleId=$facturaDetalleId;
            $this->facturaId=$facturaId;
            $this->productoId=$productoId;
            $this->cantidad=$cantidad;
            $this->precioVenta=$precioVenta;
        }

        

        


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO facturaDetalle(facturaId,productoId,cantidad,precioVenta) VALUES(?,?,?,?)");
                $stm->execute([$this->facturaId,$this->productoId,$this->cantidad,$this->precioVenta]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM facturaDetalle");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectAllId(){
            try {
                $stm= $this->dbCnx->prepare("SELECT fr.facturaDetalleId, f.facturaId,p.nombreProducto,fr.cantidad,fr.precioVenta FROM facturaDetalle fr JOIN facturas f ON fr.facturaId = f.facturaId JOIN productos p ON fr.productoId = p.productoId;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM facturaDetalle WHERE facturaDetalleId=?");
                $stm->execute([$this->facturaDetalleId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM facturaDetalle WHERE facturaDetalleId=?");
                $stm->execute([$this->facturaDetalleId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE facturaDetalle SET facturaId=?,productoId=?,cantidad=?,precioVenta=? WHERE facturaDetalleId = ?");
                $stm->execute([$this->facturaId,$this->productoId,$this->cantidad,$this->precioVenta,$this->facturaDetalleId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        /**
         * Get the value of facturaDetalleId
         */ 
        public function getFacturaDetalleId()
        {
                return $this->facturaDetalleId;
        }

        /**
         * Set the value of facturaDetalleId
         *
         * @return  self
         */ 
        public function setFacturaDetalleId($facturaDetalleId)
        {
                $this->facturaDetalleId = $facturaDetalleId;

                return $this;
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
         * Get the value of productoId
         */ 
        public function getProductoId()
        {
                return $this->productoId;
        }

        /**
         * Set the value of productoId
         *
         * @return  self
         */ 
        public function setProductoId($productoId)
        {
                $this->productoId = $productoId;

                return $this;
        }

        /**
         * Get the value of cantidad
         */ 
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /**
         * Set the value of cantidad
         *
         * @return  self
         */ 
        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

                return $this;
        }

        /**
         * Get the value of precioVenta
         */ 
        public function getPrecioVenta()
        {
                return $this->precioVenta;
        }

        /**
         * Set the value of precioVenta
         *
         * @return  self
         */ 
        public function setPrecioVenta($precioVenta)
        {
                $this->precioVenta = $precioVenta;

                return $this;
        }
    }

?>