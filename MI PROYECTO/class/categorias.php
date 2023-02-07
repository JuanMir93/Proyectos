<?php
/*Juan Miranda */
class Categorias{
    
    
    protected $id;
    public $nombre;
    private $exist = false;
            
    function __construct($id){
        
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        $resp = $db->select("categorias", "id=?", array($id));
        
        if(count($resp) == 1){
            $this->exist = true;
            $this->id = $resp[0]['id'];
            $this->nombre = $resp[0]['nombre_categoria'];
     
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
        return $db->delete("categorias", "id = ".$this->id);
        
    }
    
    private function insertar() {
        $db = new base_datos("mysql", "db_prueba", "127.0.0.1", "root", "teclab");
        return $db->insert("categoria", "nombre_categoria=?", null,
                array(array(0=> $this->nombre)));
    }
    
    private function actualizar($param) {
        $db = new base_datos("mysql", "db_prueba", "127.0.0.1", "root", "teclab");
        return $db->update("categoria", "nombre_categoria=?",null,
                 array("id = ".$this->id), array(0=> $this->nombre));
        
    }
    
}


