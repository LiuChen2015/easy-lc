<?php
namespace app;

require_once "./vendor/autoload.php";

use EasyPHP\Tools\Tools;

class Demo
{
    public static function action()
    {
        Tools::hello();
    }
}

Demo::action();
