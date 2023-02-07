<?php

/* 
 Juan Miranda
 */

class Autocarga {
    
    static public function cargar_clase($clase) {
        $arrayClase = array();
        
        $arrayClase['base_datos'] = 'class/data_base.php';
        $arrayClase['Categorias'] = 'class/categorias.php';
        $arrayClase['Productos'] = 'class/productos.php';
        
        if(isset($arrayClase[$clase])){
            if(file_exists($arrayClase[$clase])){
                include $arrayClase[$clase];
            }
            else{
                throw new Exception("Archivo de clase no encontrada [{$arrayClase[$clase]}]");
            }
        }
    }
}

spl_autoload_register('Autocarga::cargar_clase');