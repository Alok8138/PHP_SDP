<?php
class Block_Core_Layout
{
    protected $template = 'app/templates/layout.phtml';
    protected $children = [];
    protected $layout;

    public function __construct() {}

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {  
        return $this->template;
    }
    public function getChild($name)
    {
        return $this->children[$name] ?? null;
    }
    public function addChild($name, $child)
    {
        $this->children[$name] = $child;
    }
    public function removeChild($name)
    {
        unset($this->children[$name]);
    }
    public function toHtml()
    {
        
        include $this->getTemplate();
    }
}
