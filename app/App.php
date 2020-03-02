<?php

use Klein\Klein;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class App
{

    public function __construct(){
        $this->initErrorHendler();

        $this->initRouter();
    }

    private function initRouter(){
        $router = new Klein();
        //include_once "../rout/web.php";
        $routesBase = config("app.routes.base");
        $dir = path($routesBase);
        if(!file_exists($dir)){
            mkdir($dir);
        }

        $list = scandir($dir);

        $list = array_diff($list, ['.','..']);
        foreach ($list as $file ) {
            $path = path($routesBase,$file);
            $info = pathinfo($path);
            if($info["extension"] == "php"){
                include_once $path;
            }
        }

        $router->dispatch();
    }
    private  function initErrorHendler(){
        $debug = config('app.debug') === true;

        ini_set("display_errors",$debug);
        error_reporting((E_ALL ^ E_NOTICE)*$debug);// Все кроме


        if($debug){
            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        }
    }
}