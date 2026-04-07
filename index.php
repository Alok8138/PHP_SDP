<?php
require_once 'app/Boot.php';
class Mage
{

    public static function init()
    {
        Boot::init();
    }

    public static function getBlock($blockName)
    {
        // $blockName = 'product/list'


        $classNameRaw = str_replace('/', '_', $blockName);
        $parts = explode('_', $classNameRaw);
        $parts = array_map('ucfirst', $parts);


        $blockClass = 'Block_' . implode('_', $parts);


        $blockFile = 'app/blocks/' . implode('/', $parts) . '.php';

        if (!file_exists($blockFile)) {
            die("Block file not found: " . $blockFile);
        }

        require_once $blockFile;

        if (!class_exists($blockClass)) {
            die("Block class not found: " . $blockClass);
        }

        return new $blockClass();
    }

    //get model
    public static function getModel($modelName)
    {
        // $modelName = 'product'

        $classNameRaw = str_replace('/', '_', $modelName);
        $parts = explode('_', $classNameRaw);
        $parts = array_map('ucfirst', $parts);

        $modelClass = 'Model_' . implode('_', $parts);

        $modelFile = 'app/models/' . implode('/', $parts) . '.php';

        if (!file_exists($modelFile)) {
            die("Model file not found: " . $modelFile);
        }

        require_once $modelFile;

        if (!class_exists($modelClass)) {
            die("Model class not found: " . $modelClass);
        }

        return new $modelClass();
    }

    public static function getController($controllerName)
    {
        // $controllerName = 'product'

        $classNameRaw = str_replace('/', '_', $controllerName);
        $parts = explode('_', $classNameRaw);
        $parts = array_map('ucfirst', $parts);

        $controllerClass = 'Controller_' . implode('_', $parts);

        $controllerFile = 'app/controllers/' . implode('/', $parts) . '.php';

        if (!file_exists($controllerFile)) {
            die("Controller file not found: " . $controllerFile);
        }

        require_once $controllerFile;

        if (!class_exists($controllerClass)) {
            die("Controller class not found: " . $controllerClass);
        }

        return new $controllerClass();
    }
}

Mage::init();
