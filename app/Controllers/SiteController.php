<?php
/**
 * Created by PhpStorm.
 * User: ØóëÿêÄ
 * Date: 18.02.2020
 * Time: 17:37
 */

namespace Controllers;


use Core\_Abstract\Controller;
use Models\Books;

class SiteController extends Controller
{

    function index(){
        /*Books::insert(['name'=>'Test book']);*/
       return $this->render('index');
    }

}