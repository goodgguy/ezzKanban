<?php
require('./app/smarty/libs/Smarty.class.php');
class Template extends Smarty
{

    function __construct()
    {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('./app/views');
        $this->setCompileDir('./app/smarty/templates_c/');
        $this->setConfigDir('./app/smarty/configs/');
        $this->setCacheDir('./app/smarty/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }
}
