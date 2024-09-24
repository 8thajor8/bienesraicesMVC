<?php

    function conectarDB() : mysqli {

        $db = new mysqli('localhost','root','Morsi223!','bienesraices_crud');

        if(!$db){
            echo 'No Se Conecto';
            exit;
        } 

        return $db;
    }