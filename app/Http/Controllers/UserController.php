<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Author;
use App\Post;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $author = Author::with(['posts', 'comments'])->get();
        $data = [
            "messages" => "success", 
            "results" => $author
        ];

        Log::channel("single")->info("Get data from author");
        return response($content = $data, $status = 200)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }

    public function create(Request $request){
        $new_data = [
            "username" => $request->input('username'),
            "password" => $request->input('password'),
            "salt" =>$request->input('salt'),
            "email" => $request->input('email'),
            "profile" => $request->input('profile')
        ];
        Author::create($new_data);
        $data = Author::all();
        Log::info('Store author to table author');
    
        return response($content = [ "status" => "success", "results" => $data ], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function find(Request $request, $id){
        $getData = Author::with('posts')->where('id', $id)->get();
        Log::info("Get Author $id");
        return response($content = $getData, $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function delete($id){
        $data_author = Author::find($id);
        $data_author->delete();
        Log::info("Menghapus author id $id");
        return response()->json(["messages " => "success"]);   
    }


    public function update(Request $request, $id){
        $author = Author::find($id);
        
        $username = $request->input("username");
        $password = $request->input("password");
        $salt = $request->input("salt");
        $email = $request->input('email');
        $profile = $request->input("profile");


        $author->username = $username;
        $author->password = $password;
        $author->salt = $salt;
        $author->email = $email;
        $author->profile = $profile;
        $author->save();

        $data = [
            "messages" => "success",
            "new_data" => $author
        ];

        Log::info("Update Author dengan id $id");
        return response($content = $data, $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }

}
