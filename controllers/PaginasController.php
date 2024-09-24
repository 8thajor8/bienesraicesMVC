<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaginasController{

    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [ 'propiedades' => $propiedades, 'inicio' => $inicio]);

    }

    public static function nosotros(Router $router){

        $router->render('paginas/nosotros', [] );

    }

    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [ 'propiedades' => $propiedades] );

    }

    public static function propiedad(Router $router){

        $id = validarORedireccionar('/admin');

        //Consulta datos de propiedad
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad', [ 'propiedad' => $propiedad] );

    }

    public static function blog(Router $router){
        
        $router->render('paginas/blog', [ ] );

    }

    public static function entrada(Router $router){

        $router->render('paginas/entrada', [ ] );

    }

    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD']==='POST'){

            $respuestas = $_POST['contacto'];
            
            //Crear una instancia de mailer
            $mail = new PHPMailer();
            

            //Confirgurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '82dd4947d438f4';
            $mail->Password = 'a723bb984f406b';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar Contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] .' </p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] .' </p>';
            $contenido .= '<p>Buscando: ' . $respuestas['opciones'] .' </p>';
            $contenido .= '<p>Presupuesto: $' . $respuestas['presupuesto'] .' </p>';

            if($respuestas['contacto'] === 'telefono'){

                $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] .' </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] .' </p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] .' </p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] .' </p>';


            } else{
                $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] .' </p>';
                $contenido .= '<p>E-mail: ' . $respuestas['email'] .' </p>';

            }
            
            
            
           
            $contenido .= '</html>';



            $mail->Body = $contenido;
            $mail->AltBody = "Texto alternativo sin html";

            if($mail->send()){
               $mensaje = "Mensaje enviado correctamente";
            } else{
                $mensaje =  "Mensaje no enviado";
            }


        }
        $router->render('paginas/contacto', ['mensaje' => $mensaje ] );

    }

}