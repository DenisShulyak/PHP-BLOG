<?php

use Klein\Klein;
use \Klein\Request;
use \Klein\Response;
/**
 * @var Klein $router
 */

$router->get("/", function($request, $response){
   echo cnt('PostsController@index',$request, $response);
});
$router->get("/post",function ($request,$response){
   return cnt('PostsController@view', $request, $response);
});

$router->with('/create', function() use($router){
   $router->get('',function($request){
   return cnt('PostsController@create',$request);
   });
   $router->post('',function($request, $resp){
   return cnt('PostsController@insert',$request,$resp);
   });
});
$router->with('/update', function() use($router){
   $router->get('',function($request,$resp){
      return cnt('PostsController@update',$request,$resp);
   });
   $router->post('',function($request, $resp){
      return cnt('PostsController@edit',$request,$resp);
   });
});

$router->get('/delele', function($request, $resp){
   return cnt('PostsController@delete',$request,$resp);
});
