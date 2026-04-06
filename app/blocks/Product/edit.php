<?php

class Block_Product_Edit
{

    protected $_template = null;

    protected function renderTemplate($template)
    {
        $basePath = __DIR__ . '/../../templates/';
        require_once $basePath . $template;
    }

    public function getTemplate()
    {
        if ($this->_template == null) {
            $this->_template = 'product/edit.phtml';
        }
        return $this->_template;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
        return $this;
    }

    public function toHtml()
    {
        $this->renderTemplate($this->getTemplate());
    }

}
