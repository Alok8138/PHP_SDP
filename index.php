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
}

Mage::init();
