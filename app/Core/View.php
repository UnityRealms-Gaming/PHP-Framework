<?php

namespace App\Core;

use Smarty\Smarty;

class View
{
    protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../resources/views/');
        $this->smarty->setCompileDir(__DIR__ . '/../../storage/views_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../../storage/cache/');
    }

    public function render(string $template, array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        return $this->smarty->fetch($template . '.tpl');
    }
}
