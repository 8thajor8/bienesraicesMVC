<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController{
    public static function index(Router $router){

        $propiedades = Propiedad::all();

        $vendedores = Vendedor::All();
       //Mostrar mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', ['propiedades' => $propiedades, 'vendedores' => $vendedores, 'resultado' => $resultado]);
    }


    public static function crear(Router $router){

        $propiedad = new Propiedad();
        $vendedores = Vendedor::All();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD']==='POST'){
        
            $propiedad = new Propiedad($_POST['propiedad']);
            
            //Generar Nombre Unico
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg" ;
    
            //Realizar resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
    
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);  
               
                $propiedad->setImagen($nombreImagen);
            }
            
            //Valido errores
            $errores = $propiedad->validar();
    
            //Si no hay errores, ejecuto el query
            if(empty($errores)){
    
                //Crear carpeta
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                
                $propiedad->guardar();
    
                
    
            }
    
        }

        $router->render('propiedades/crear', ['propiedad' => $propiedad, 'vendedores' => $vendedores, 'errores' => $errores]);
    }
    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

        //Consulta datos de propiedad
        $propiedad = Propiedad::find($id);

        //Consulta de vendedores a la base
        $vendedores = Vendedor::All();

        //Declaro Variable de errores de validacion de formulario
        $errores = Propiedad::getErrores();

        //Capturo los datos al hacer el submit
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        //Asignar atributos
       
        $args = $_POST['propiedad'];
        

        $propiedad->sincronizar($args);
        
        //Hago la validacion de los campos, si estan vacios, se envia el mensaje al array de errores
        $errores = $propiedad->validar();
        
        //Generar Nombre Unico
        $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg" ;

        //Realizar resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){

            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);  
           
            $propiedad->setImagen($nombreImagen);
        }

        if(empty($errores)){

            // Guarda la imagen en el servidor
            if(isset($image)) {
                $image ->save(CARPETA_IMAGENES.$nombreImagen);
            }

            
            $propiedad->guardar();

            
        }

        
        
    }

        $router->render('propiedades/actualizar', ['propiedad' => $propiedad, 'vendedores' => $vendedores, 'errores' => $errores]);
    }

    public static function eliminar(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    
                    $propiedad = Propiedad::find($id);
                    
                    //Eliminar 
                    $propiedad->eliminar();
                        
                }
                
    
                
            }
        }
    }
}