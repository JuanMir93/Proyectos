<?php

/* 
Juan Miranda
 */


class Productos{
    
    protected $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria;
    private $exist = false;
    
    function __construct($id){
        
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        $resp = $db->select("productos", "id=?", array($id));
        if(count($resp) == 1){
            
            $this->exist = true;
            $this->id = $resp[0]['id'];
            $this->nombre = $resp[0]['nombre_producto'];
            $this->descripcion = $resp[0]['descripcion'];
            $this->precio = $resp[0]['precio'];
            $this->categoria = $resp[0]['categoria_id'];
            
        }
        
    }
    
    public function mostrar(){
        echo "<pre>";
        print_r($this);
        echo "</pre>";
        


    }
    
    public function guardar(){
        if($this->exist){
            return $this->actualizar();
        }
        else{
            return $this->insertar();
        }
        
    }
    
    public function eliminar() {
        $db = new base_datos("mysql", "db_prueba", "127.0.0.1", "root", "teclab");
        return $db->delete("productos", "id = ".$this->id);
        
    }
    
    private function insertar() {
        $db = new base_datos("mysql", "db_prueba", "127.0.0.1", "root", "teclab");
        return $db->insert("productos", "nombre_producto=?, imagen=?, descripcion=?, precio=?, categoria_id=?", null,
                array(array(0=> $this->nombre, 1=> $this->imagen, 2=> $this->descripcion, 3=> $this->precio, 
                    4=> $this->categoria)));
    }
    
    private function actualizar() {
        $db = new base_datos("mysql", "db_prueba", "127.0.0.1", "root", "teclab");
        return $db->update("productos", "nombre_producto=?, imagen=?, descripcion=?, precio=?, categoria_id=?",null,
                 array("id = ".$this->id), array(0=> $this->nombre, 1=> $this->imagen, 2=> $this->descripcion, 3=> $this->precio, 
                    4=> $this->categoria));
        
    }
    
        
}

