<?php

class Dispatcher {

    private $pageName;

    public function __construct($fileName) {
        $this->pageName = $fileName;
    }

    public function displayFile() {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/themes/templates/pages/' . $this->pageName . '.php';

        if (file_exists($filePath)) {
            include_once $filePath;
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/themes/templates/pages/' . '404.php';;
        }
    }
}

?>
