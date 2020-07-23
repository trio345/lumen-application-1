<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as Log;
use App\Comment;

class CommentController extends Controller
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

        $data = Comment::all();
        
        Log::info("Get Comment Data");
        return response($content = [ "messages" => "success", "results" => $data], $status = 200)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }

    public function create(Request $request){
        
        $data = [
            "content" => $request->input('content'),
            "status" => $request->input('status'),
            "create_time" => $request->input('create_time'),
            "author_id" => $request->input('author_id'),
            "email" => $request->input('email'),
            "post_id" => $request->input('post_id'),
            "url" => $request->input('url')
        ];

        if ( Comment::create($data) ){
            $status = "Berhasil di tambah";
        } else {
            $status = "Gagal ditambah";
        }
        Log::info('Store comment to table comment');
        return response($content = [ "status" => "success", "messages" => $status, "results" => $data ], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function find($id){
        $data = Comment::find($id);
        Log::info("Get data Comment with id $id");
        return response($content = ["status" => "success", "results" => $data], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(["status" => "success", "messages" => "Berhasil dihapus"]);   
    }


    public function update(Request $request, $id){
        $comment = Comment::find($id);
        $comment->content =  $request->input('content');
        $comment->url =  $request->input('url');
        $comment->author_id =  $request->input('author_id');
        $comment->email =  $request->input('email');
        $comment->post_id =  $request->input('post_id');
        if ($comment->save()) {
            $status = "Berhasil diupdate";
        } else {
            $status = "Gagal diupdate";
        }

        Log::info("Update Comment with id $id");
        return response($content = ["status" => "success", "messages" => $status], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }

}
