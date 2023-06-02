<?php 

require_once("../Config/config.php");

class User extends Conexion{
    private $id;
    private $empleadoId;
    private $email;
    private $username;
    private $password;
    private $tipoUsuario;
    
    public function __construct($id=0,$empleadoId="",$email="",$username="",$password="",$tipoUsuario="",$dbCnx=""){
        parent :: __construct($dbCnx);
        $this->id=$id;
        $this->empleadoId=$empleadoId;
        $this->email=$email;
        $this->username=$username;
        $this->password=$password;
        $this->tipoUsuario=$tipoUsuario;
    }

    public function checkUser($email){
        try {
            $stm= $this->dbCnx->prepare("SELECT * FROM users WHERE email ='$email'");
            $stm->execute();
            if ($stm->fetchColumn()) {
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
            $stm= $this->dbCnx->prepare("INSERT INTO users(empleadoId,email,username,password,tipoUsuario) VALUES(?,?,?,?,?)");
            $stm->execute([$this->empleadoId,$this->email,$this->username,md5($this->password),$this->tipoUsuario]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchAll(){
        try {
            $stm= $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function login(){
        try {
            $stm =$this->dbCnx->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stm->execute([$this->email,md5($this->password)]);
            $user= $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['id']=$user[0]['id'];
                $_SESSION['email']=$user[0]['email'];
                $_SESSION['password']=$user[0]['password'];
                return true;
            }else {
                false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of tipoUsuario
     */ 
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * Set the value of tipoUsuario
     *
     * @return  self
     */ 
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }
}
