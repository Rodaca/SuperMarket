<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);

    require_once("../Config/config.php");

    class Producto extends Conexion{
        
        private $productoId;
        private $categoriaId;
        private $precioUnitario;
        private $stock;
        private $unidadesPedidas;
        private $proveedorId;
        private $nombreProducto;
        private $descontinuado;




        public function __construct($productoId=0,$categoriaId="",$precioUnitario="",$stock="",$unidadesPedidas="",$proveedorId="",$nombreProducto="",$descontinuado="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->productoId=$productoId;
            $this->categoriaId=$categoriaId;
            $this->precioUnitario=$precioUnitario;
            $this->stock=$stock;
            $this->unidadesPedidas=$unidadesPedidas;
            $this->proveedorId=$proveedorId;
            $this->nombreProducto=$nombreProducto;
            $this->descontinuado=$descontinuado;

        }

        

        


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO productos(categoriaId,precioUnitario,stock,unidadesPedidas,proveedorId,nombreProducto,descontinuado) VALUES(?,?,?,?,?,?,?)");
                $stm->execute([$this->categoriaId,$this->precioUnitario,$this->stock,$this->unidadesPedidas,$this->proveedorId,$this->nombreProducto,$this->descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM productos");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectAllId(){
            try {
                $stm= $this->dbCnx->prepare("SELECT p.productoId, c.nombre as categoriaNombre,p.precioUnitario,p.stock,p.unidadesPedidas,pr.nombre as proveedorNombre,p.nombreProducto,p.descontinuado FROM productos p JOIN categorias c ON p.categoriaId = c.categoriaId JOIN proveedores pr ON p.proveedorId = pr.proveedorId;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } 

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM productos WHERE productoId=?");
                $stm->execute([$this->productoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM productos WHERE productoId=?");
                $stm->execute([$this->productoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE productos SET categoriaId=?,precioUnitario=?,stock=?,unidadesPedidas=?,proveedorId=?,nombreProducto=?,descontinuado=? WHERE productoId = ?");
                $stm->execute([$this->categoriaId,$this->precioUnitario,$this->stock,$this->unidadesPedidas,$this->proveedorId,$this->nombreProducto,$this->descontinuado,$this->productoId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
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
         * Get the value of categoriaId
         */ 
        public function getCategoriaId()
        {
                return $this->categoriaId;
        }

        /**
         * Set the value of categoriaId
         *
         * @return  self
         */ 
        public function setCategoriaId($categoriaId)
        {
                $this->categoriaId = $categoriaId;

                return $this;
        }

        /**
         * Get the value of precioUnitario
         */ 
        public function getPrecioUnitario()
        {
                return $this->precioUnitario;
        }

        /**
         * Set the value of precioUnitario
         *
         * @return  self
         */ 
        public function setPrecioUnitario($precioUnitario)
        {
                $this->precioUnitario = $precioUnitario;

                return $this;
        }

        /**
         * Get the value of stock
         */ 
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */ 
        public function setStock($stock)
        {
                $this->stock = $stock;

                return $this;
        }

        /**
         * Get the value of unidadesPedidas
         */ 
        public function getUnidadesPedidas()
        {
                return $this->unidadesPedidas;
        }

        /**
         * Set the value of unidadesPedidas
         *
         * @return  self
         */ 
        public function setUnidadesPedidas($unidadesPedidas)
        {
                $this->unidadesPedidas = $unidadesPedidas;

                return $this;
        }

        /**
         * Get the value of proveedorId
         */ 
        public function getProveedorId()
        {
                return $this->proveedorId;
        }

        /**
         * Set the value of proveedorId
         *
         * @return  self
         */ 
        public function setProveedorId($proveedorId)
        {
                $this->proveedorId = $proveedorId;

                return $this;
        }

        /**
         * Get the value of nombreProducto
         */ 
        public function getNombreProducto()
        {
                return $this->nombreProducto;
        }

        /**
         * Set the value of nombreProducto
         *
         * @return  self
         */ 
        public function setNombreProducto($nombreProducto)
        {
                $this->nombreProducto = $nombreProducto;

                return $this;
        }

        /**
         * Get the value of descontinuado
         */ 
        public function getDescontinuado()
        {
                return $this->descontinuado;
        }

        /**
         * Set the value of descontinuado
         *
         * @return  self
         */ 
        public function setDescontinuado($descontinuado)
        {
                $this->descontinuado = $descontinuado;

                return $this;
        }
    }
    

?>