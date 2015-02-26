<?php
error_reporting(-1);
require_once  'model/fileManager.php';


Class indexController {
    
    function __construct() {
        $this->indexAction();
        
    }
    public function indexAction(){
        $dir = filter_input(INPUT_GET, 'name_file');
        $files = filemanager::getInsatnce();
        $files->readAllFiles($dir);
        $sort = filter_input(INPUT_POST, 'sort');
        $result = $files->retrieveData($sort);
        $folder_open = $files->getDir();

        include_once 'view.php';

    }

}
new indexController();
