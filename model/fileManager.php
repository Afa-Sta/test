<?php
require_once 'sortModel.php';

Class filemanager {
    
    private static $instance;
    private $dir;
    private $files;
    private $error;
    

    private function __construct() {}
    private function __clone() {}
    
    public static function getInsatnce(){
        if(empty(self::$instance)){
            self::$instance = new filemanager();
        }
        return self::$instance;
    }
    
    public function readAllFiles($dir){
        if(!$dir){
            $dir='.'.DIRECTORY_SEPARATOR;
        }else{
            $last_letter = substr($dir, -1);
            $dir = ($last_letter == '/' || $last_letter =='\\') ? $dir : $dir.DIRECTORY_SEPARATOR;
        }
        $this->dir = $dir;
        if((@$handle = opendir($dir))){
            while (false !==($file = readdir($handle))) {
                if($file != "." && $file != ".."){
                    if(filetype($dir.$file) == 'dir'){
                        $this->files[] = array(
                            'name' => $file,
                            'type' => filetype($dir.$file),
                            'size' => count(scandir($dir.$file)).' object',
                            
                        );    
                    }else{
                        $this->files[] = array(
                            'name' => $file,
                            'type' => pathinfo($dir.$file, PATHINFO_EXTENSION),
                            'size' => filesize($dir.$file).' byte',
                            
                        );
                        
                    }
                    
                }  
            }
            closedir($handle);
        }else{
            $this->error = 'Not directory';
        }
        
        
    } 
    /*
     * $type - string
     */
    public function retrieveData($type){
        if($type){
            $sort = new sortModel($this->files, $type);
            $result = $sort->getData();
            return $result;
        }else{
            return $this->files;
        }
        
        
    }
    public function getDir(){
        return $this->dir;
    }
    
    public function getError(){
        return $this->error;
    }

    
 
}

