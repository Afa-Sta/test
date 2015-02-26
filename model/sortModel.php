<?php

Class sortModel {
    
    private $data;
    private $sort;
    
    function __construct($value, $type) {
        $this->sort = $type;
        uasort($value, array($this, 'compare'));
        $this->data = $value;
           
    }

    private function compare($a, $b){
            return strnatcmp($a[$this->sort], $b[$this->sort]);
        }
        
    public function getData(){
        return $this->data;
    }

            
}

