<?php
require_once 'app/models/Product.php';
require_once 'app/blocks/Core/Layout.php';
class Controller_Core_Base
{
    protected $request = null;
    protected $layout = null;

    public function getRequest()
    {
        if ($this->request) {
            return $this->request;
        }
        $request = new Model_Request();
        $this->setRequest($request);
        return $this->request;
    }

    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    public function dispatch()
    {
        $action = $this->getRequest()->get('a', 'index');
        $action .= 'Action';
        $this->$action();
    }

    public function redirect($a = null, $c = null)
    {
        if (!$a) {
            $a = $this->getRequest()->get('a');
        }

        if (!$c) {
            $c = $this->getRequest()->get('c');
        }

        header("Location: index.php?a=$a&c=$c");
    }

    public function renderTemplate($template, $data = [])
    {
        // echo "<pre>";
        // print_r($data);

        extract($data);

        $templatePath = 'app/templates/' . $template;

        if (!file_exists($templatePath)) {
            die("Template not found: " . $templatePath);
        }

        include $templatePath;
    }

    public function getLayout()
    {
        return Mage::getBlock('core/layout');
    }
    public function setLayout($layout)
    {
        Mage::getBlock('core/layout', $layout);
    }

   
}
