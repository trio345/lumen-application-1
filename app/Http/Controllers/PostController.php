<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as Log;
use App\Post;

class PostController extends Controller
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
        $data = Post::with('comments')->get();
        Log::info("Get Post all data");
        return response($content = $data, $status = 200)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }

    public function create(Request $request){
        $data = [
            "title" => $request->input('title'),
            "content" => $request->input('content'),
            "tags" => $request->input('tags'),
            "status" => $request->input('status'),
            "author_id" => $request->input('author_id')
        ];

        if (Post::create($data)){
            $res = "Data Berhasil ditambah";
        } else{
            $res = "Gagagl ditambah";
        }
        Log::info('Store post to table post');
        return response($content = [ "status" => "success", "results" => $res ], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function find(Request $request, $id){
        $data = Post::with(['authors', 'comments'])->where('id', $id)->get();
        return response($content = $data, $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }


    public function delete($id){
        $data = Post::find($id);
        $data->delete();

        Log::info("Hapus data Post id $id");
        return "Berhasil dihapus $id";   
    }


    public function update(Request $request, $id){
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tags = $request->input('tags');
        $post->author_id = $request->input('author_id');

        if ( $post->save() ){
            $status = "Update berhasil";
        } else{ 
            $status = "Gagal update!";
        }


        return response($content = ["status" => "success", "messages" => $status, "results" => $post], $status = 201)
                        ->header('content-type', 'application/json')
                        ->header('author', 'trio');
    }



}
