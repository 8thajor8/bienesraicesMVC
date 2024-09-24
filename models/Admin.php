<?php

namespace Model;

class Admin extends ActiveRecord{

    protected static $tabla = 'usuarios';
    protected static $columnasBD = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []){

        $this->id = $args['id'] ?? null ;
        $this->email = $args['email'] ?? '' ;
        $this->password = $args['password'] ?? '' ;
        
    }

    public function validar(){

        if(!$this->email){
            self::$errores[] = "Ingresa el correo electronico correctamente";
            
        }
        
        if(!$this->password){
            self::$errores[] = "La password es obligatoria";
            
        }

        return self::$errores;
    }

    public function existeUsuario(){
        
        //Revisar si el usuario existe
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1" ;
        
        $resultado = self::$db->query($query);

        if(!$resultado -> num_rows){

            self::$errores[] = "El usuario no existe";
            return;

        }

        return $resultado;

    }

    public function comprobarPassword($resultado){

        $usuario = $resultado->fetch_object(); //capturo el resultado de la consulta
        
        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado){

            self::$errores[] = "La contraseña es incorrecta";

        }

        return $autenticado;

    }

    public function autenticar(){

        session_start();

        //Lleno arreglo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');

    }

    

}