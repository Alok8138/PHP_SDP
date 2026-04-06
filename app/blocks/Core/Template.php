<?php

class Block_Core_Template
{
    protected $template;
    protected $data = [];

    public function __construct() {}

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function toHtml()
    {
        return require_once __DIR__ . '/../../templates/' . $this->template;
    }
}
