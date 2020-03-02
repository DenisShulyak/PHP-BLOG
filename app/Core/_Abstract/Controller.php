<?php
namespace Core\_Abstract;
/**
 * Created by PhpStorm.
 * User: ШулякД
 * Date: 18.02.2020
 * Time: 17:12
 */
use \Core\_Interfaces\IController;

abstract class Controller implements IController
{
    public function render($template, array $vars = [])
    {
        return view($template, $vars);
    }
}