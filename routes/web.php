<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\Http\Message\ServerRequestInterface;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('gettoken', 'AuthController@authenticate');

$router->group(['middleware' => 'jwtchecker'], function() use($router){
    // TUGAS 2 LUMEN
    // author route
    $router->post('/author', 'UserController@create');
    $router->get('/author','UserController@index');
    $router->get('/author/{id}', 'UserController@find');
    $router->patch('/author/{id}', 'UserController@update');
    $router->delete('/author/{id}', 'UserController@delete');

    // post route
    $router->post('/post', 'PostController@create');
    $router->get('/post', 'PostController@index');
    $router->get('/post/{id}', 'PostController@find');
    $router->patch('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@delete');

    // comment route
    $router->post('/comment', 'CommentController@create');
    $router->get('/comment', 'CommentController@index');
    $router->get('/comment/{id}', 'CommentController@find');
    $router->patch('/comment/{id}', 'CommentController@update');
    $router->delete('/comment/{id}', 'CommentController@delete');
});






// $router->post('/users', function () use ($router) {
//     return "hello post users";
// });

// $router->get('/users', function () use ($router) {
//     return $router->getRouting();
// });


// """TUGAS 1 LUMEN"""

// Route Group Author

// $router->group(['prefix'=>'api/v1'], function () use($router) {


//     $router->post('/author', function (ServerRequestInterface $req){
//         return response()->json([
//             "response"=> "success",
//             "status" => 200,
//             "data" => $req->getParsedBody()
//         ]);
//     });

//     $router->patch('/author/{id}', function (Request $req, Response $res, $id){
//         // if ( $req->has($id
//         if ( $req->has('id') ) {
//             $data = $req->all();
//             return response()->json($data);
//         }
        
//     });

//     $router->delete('/author/{id}', function (Request $req, Response $res, $id){

//         if ( $req->has('id') ){
//             $data = $req->all();
//             unset($data);
//             return "berhasil dihapus!";
//         }
        
//     });

//     $router->get('/author', function (ServerRequestInterface $request, Response $res){
//         return response()->json([
//             "response" => "Success",
//             "status" => 200,
//             "data" =>
//             [
//                 'id' => '1', 
//                 'username' => 'trios',
//                 'password' => 'saputra',
//                 'salt' => 'saltchees',
//                 'email' => 'trios@gmail.com',
//                 'profile' => 'trioss'
//                 ]
//         ]);
//     });

//     $router->get('/author/{id}', function (){
//         if ( $req->has('id') ){
//             return response()->json(
//                 [
//                     'id' => '1', 
//                     'username' => 'trios',
//                     'password' => 'saputra',
//                     'salt' => 'saltchees',
//                     'email' => 'trios@gmail.com',
//                     'profile' => 'trioss'
//                     ]);
//         }
//     });
// });


// // Route Group Post
// $router->group(['prefix'=>'api/v1'], function () use($router) {

//     $router->post('/post', function (ServerRequestInterface $req){
//         return $req->getParsedBody();
//     });

//     $router->patch('/post/{id}', function (Request $req, Response $res, $id){
//         // if ( $req->has($id
//         if ( $req->has('id') ) {
//             $data = $req->all();
//             return response()->json($data);
//         }
        
//     });

//     $router->delete('/post/{id}', function (Request $req, Response $res, $id){

//         if ( $req->has('id') ){
//             $data = $req->all();
//             unset($data);
//             return "berhasil dihapus!";
//         }
        
//     });

//     $router->get('/post', function (ServerRequestInterface $request){
//         return response()->json(
//             [
//                 'id' => '1', 
//                 'title' => 'trios',
//                 'content' => 'saputra',
//                 'tags' => 'saltchees',
//                 'status' => 'trios@gmail.com',
//                 'created_time' => 'trioss',
//                 'update_time' => '1234',
//                 'author_id' => '1221'
//                 ]);
//     });

//     $router->get('/post/{id}', function (){
//         if ( $req->has('id') ){
//             return response()->json(
//                 [
//                     'id' => '1', 
//                 'title' => 'trios',
//                 'content' => 'saputra',
//                 'tags' => 'saltchees',
//                 'status' => 'trios@gmail.com',
//                 'created_time' => 'trioss',
//                 'update_time' => '1234',
//                 'author_id' => '1221'
//                     ]);
//         }
//     });
// });


// // Route Group Comment

// $router->group(['prefix'=>'api/v1'], function () use($router) {

//     $router->post('/comment', function (ServerRequestInterface $req){
//         return $req->getParsedBody();
//     });

//     $router->patch('/comment/{id}', function (Request $req, Response $res, $id){
//         // if ( $req->has($id
//         if ( $req->has('id') ) {
//             $data = $req->all();
//             return response()->json($data);
//         }
        
//     });

//     $router->delete('/comment/{id}', function (Request $req, Response $res, $id){

//         if ( $req->has('id') ){
//             $data = $req->all();
//             unset($data);
//             return "berhasil dihapus!";
//         }
        
//     });

//     $router->get('/comment', function (ServerRequestInterface $request){
//         return response()->json(
//             [
//                 'id' => '1', 
//                 'content' => 'Ini adalah comment',
//                 'status' => 'Terkirim',
//                 'author_id' => 'trioss',
//                 'email' => 'trios@gmail.com',
//                 'url' => 'trioss',
//                 'post_id' => '1234'
//                 ]);
//     });

//     $router->get('/author/{id}', function (){
//         if ( $req->has('id') ){
//             return response()->json(
//                 [
//                     'id' => '1', 
//                 'content' => 'Ini adalah comment',
//                 'status' => 'Terkirim',
//                 'author_id' => 'trioss',
//                 'email' => 'trios@gmail.com',
//                 'url' => 'trioss',
//                 'post_id' => '1234'
//                     ]);
//         }
//     });
// });





