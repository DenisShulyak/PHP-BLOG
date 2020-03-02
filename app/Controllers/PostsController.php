<?php
/**
 * Created by PhpStorm.
 * User: ШулякД
 * Date: 20.02.2020
 * Time: 16:08
 */

namespace Controllers;


use Core\_Abstract\Controller;
use Core\_Interfaces\IController;
use Klein\Request;
use Klein\Response;
use Models\Posts;

class PostsController extends Controller implements IController
{
    public function Index()
    {

        return $this->render('index', [
            'posts' => Posts::select('*'),
            'Title' => "Главная"
        ]);
    }

    public function View($request, $response)
    {

        $post = Posts::get("*", [
            "Id" => $request->param('id')
        ]);
        if ($post == null) {
            return $response->code(404);
        }
        $this->render('post', [
            'post' => $post
        ]);

    }

    public function Insert(Request $request, Response $response)
    {
        $title = $request->param('Title');
        $content = $request->param('Content');


        $res = Posts::insert([
            'Title' => $title,
            'Content' => $content
        ]);

        if ($res === false) {
            throw new \Exception('Post error');
        }
        return $response->redirect('/');
    }

    public function Create()
    {
        $this->render('form', [
            'title' => 'Создание новой записи'
        ]);
    }

    public function Update(Request $request, Response $response)
    {
        $id = $request->param('Id');
        $post =Posts::get('*',[
            'Id' => $id
        ]);
        if(!$post){
            return $response->code(404);
        }
        $this->render('form',[
            'title'=>'Change data',
            'post'=> $post
        ]);
    }

    public function Edit(Request $request, Response $response)
    {

        $id = $request->param('Id');

        $res = Posts::update([
            'Title'=> $request->param('Title'),
            'Content'=>$request->param('Content')
        ],[
            'Id'=>$request->param('Id')
        ]);

        if(!$res){
            throw new \Exception("AAAAAAAAAA");
        }

        $response->redirect("/post?id=$id");
    }

    public function Delete(Request $request, Response $response)
    {
        $id = $request->param('Id');
        $res = Posts::delete([
            'Id'=> $id
        ]);

        if(!$res){
            throw new \Exception("Not DELETE");
        }

        $response->redirect("/");
    }
}