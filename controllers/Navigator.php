<?php

class Navigator {
    public function __construct() {}

    public function navigate($file) {
        if (!empty($file)) {
            header("Location: $file");
            exit();
        } else {
            echo "Error: File path is empty.";
        }
    }
}

?>
