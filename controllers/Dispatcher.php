<?php

class Dispatcher {

    private $pageName;

    public function __construct($fileName = null) {
        $this->pageName = $fileName;
    }

    public function displayFile() {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/themes/templates/pages/' . $this->pageName . '.php';

        if (file_exists($filePath)) {
            include_once $filePath;
        }
    }

    public function getFullControllerPath($controllerName) {
         $controllerPath = $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $controllerName . '.php';

         if (file_exists($controllerPath)) {
            return $controllerPath;
         }

        return null;
    }


    public function getRelativeControllerPath($controllerName) {
        $controllerFileLocation = $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $controllerName. '.php';

        if (file_exists($controllerFileLocation)) {
            return '/controllers/' . $controllerName . '.php';
        }

        return null;
    }
}

?>
