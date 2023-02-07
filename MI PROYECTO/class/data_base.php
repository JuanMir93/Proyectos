<?php

/*Juan Miranda */


class  base_datos{ 
    private $gbd;   
    
    function __construct($driver, $base_datos, $host, $user, $pass) {
            $conection = $driver.":dbname=".$base_datos.";host=$host";
            $this->gbd = new PDO($conection, $user, $pass);
            
            if (!$this->gbd){
                    throw new Exception("No se ha podido realizar la conexión");
            }
    }        
    
 
    function select($tabla, $filtros = null, $arr_porepare = null, $orden = null, $limit = null){
            $sql = "SELECT * FROM ".$tabla;
            if ($filtros != null){
                $sql .= " WHERE ".$filtros;
        }
        if ($orden != null){
                $sql .= " ORDER BY ".$orden;
        }
        if ($limit != null){
                $sql .= " LIMIT ".$limit;
        }
        
        $resourse = $this->gbd->prepare($sql);
        $resourse->execute($arr_porepare);
        if ($resourse){
                return $resourse->fetchAll(PDO::FETCH_ASSOC);
        } else {
                throw new Exception ("No se pudo realizar la consulta de selección");
        }
    }    
    public function delete($tabla, $filtros = null, $arr_prepare = null){
            // implementacion de nuestra función
            $sql = "DELTE FROM".$tabla;
            if ($filtros != null){
                $sql .= " WHERE ".$filtros;
            }
            $resourse = $this->gbd->prepare($sql);
            $resourse->execute($arr_porepare);
            if ($resourse){
                    return $resourse->fetchAll(PDO::FETCH_ASSOC);
            } else {
                    throw new Exception ("No se pudo realizar la consulta de selección");
            }
    }   
    
    function insert($tabla, $campos, $valores, $arr_prepare = null){
            // implementacion de nuestra función
            $sql = "INSERT INTO ".$tabla . "(".$campos.") VALUE .(".$valores.")";
            
            $resourse = $this->gbd->prepare($sql);
            $resourse->execute($arr_porepare);
            if ($resourse){
                    return $resourse->fetchAll(PDO::FETCH_ASSOC);
            } else {
                    throw new Exception ("No se pudo realizar la consulta de selección");
            }
            
            
    }    
    
    
    function update($tabla, $campos, $valores, $filtros, $arr_prepare = null){
            // implementacion de nuestra función
        
        
            $sql = "UPDATE " . $tabla . " SET " . $campos = $valores . " WHERE ".$filtros;
        
            $resourse = $this->gbd->prepare($sql);
            $resourse->execute($arr_porepare);
            if ($resourse){
                    return $resourse->fetchAll(PDO::FETCH_ASSOC);
            } else {
                    throw new Exception ("No se pudo realizar la consulta de selección");
            }
    }   
}
