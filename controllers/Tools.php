<?php

class Tools {

    public function __construct() {}

    public function Redirect($location) {
        echo "<script> window.location.href='" . $location . "'; </script>";
    }

}

?>
