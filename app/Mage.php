<?php
class Mage {
    public static function init() {
        require_once "app/boot.php";
        Boot::init();
    }

    public static function getBlock($name) {
        $path = "app/Block/" . $name . ".php";
        if (file_exists($path)) {
            require_once $path;
            $className = "Block_" . str_replace("/", "_", $name);
            if (class_exists($className)) {
                return new $className();
            }
        }
        return false;
    }

    public static function getController($name) {
        $path = "app/Controllers/" . $name . ".php";
        if (file_exists($path)) {
            require_once $path;
            $className = "Controllers_" . str_replace("/", "_", $name);
            if (class_exists($className)) {
                return new $className();
            }
        }
        return false;
    }

    public static function getModel($name) {
        $path = "app/Models/" . $name . ".php";
        if (file_exists($path)) {
            require_once $path;
            $className = "Models_" . str_replace("/", "_", $name);
            if (class_exists($className)) {
                return new $className();
            }
        }
        return false;
    }
}
?>
