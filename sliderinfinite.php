<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class SliderInfinite extends Module
{
    public function __construct()
    {
        $this->name = 'sliderinfinite';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Florian';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
        $this->displayName = $this->l('Slider Module Mirroir');
        $this->description = $this->l('Slider boucle fermé infini');
        $this->confirmUninstall = $this->l('Êtes vous sur de vouloir désinstaller ?');

        parent::__construct();
    }

    public function install()
    {
        return parent::install()  &&
            $this->registerHook('header') &&
            $this->registerHook('displayVideoLink');
    }

    public function uninstall()
    {
        $this->unregisterHook('displayVideoLink');

        return parent::uninstall();
    }

    public function hookDisplayHeader()
    {
        if (true) { //select controller page
            $this->context->controller->addCSS($this->_path . 'views/css/sliderinfinite.css', 'all');
        }
    }

    public function hookDisplayVideoLink()
    {
        $imagesPath = _PS_MODULE_DIR_ . 'sliderinfinite/img/';
        $images = $this->getImagesFromDir($imagesPath);
        $this->context->smarty->assign("images", $images);

        return $this->display(__FILE__, 'sliderinfinite.tpl');
    }

    public function getImagesFromDir($path)
    {
        $images = [];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                $fileInfo = pathinfo($file);
                if (isset($fileInfo['extension']) && in_array(strtolower($fileInfo['extension']), $allowedExtensions)) {
                    $images[] = $this->_path . 'img/' . $file;
                }
            }
        }

        return $images;
    }
}
