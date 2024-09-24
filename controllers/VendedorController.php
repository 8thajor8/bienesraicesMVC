<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;


class VendedorController{
    
    public static function crear(Router $router){

        $vendedor = new Vendedor();

        //Declaro Variable de errores de validacion de formulario
        $errores = Vendedor::getErrores();

        //Capturo los datos al hacer el submit
        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            $vendedor = new Vendedor($_POST['vendedor']);
                
            //Valido errores
            $errores = $vendedor->validar();

            //Si no hay errores, ejecuto el query
            if(empty($errores)){

                $vendedor->guardar();

            }

        }

        $router->render('vendedores/crear', ['vendedor' => $vendedor, 'errores' => $errores]);
    }   

    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

         //Consulta datos de propiedad
        $vendedor = Vendedor::find($id);
    
 
        //Declaro Variable de errores de validacion de formulario
        $errores = Vendedor::getErrores();

        //Capturo los datos al hacer el submit
        if($_SERVER['REQUEST_METHOD']==='POST'){
        
            $args = $_POST['vendedor'];
            
            $vendedor->sincronizar($args);
            
            //Valido errores
            $errores = $vendedor->validar();

            //Si no hay errores, ejecuto el query
            if(empty($errores)){

                $vendedor->guardar();

                

            }

        }
        $router->render('vendedores/actualizar', ['vendedor' => $vendedor, 'errores' => $errores]);
    }

    public static function eliminar(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    
                    $vendedor = Vendedor::find($id);
                    
                    //Eliminar 
                    $vendedor->eliminar();
                        
                }
                
    
                
            }
        }
    }
    
}
