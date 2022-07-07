<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Post;
use Validator;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = DB::table('posts')->get();
        return view('post', compact('post'));
    }

    public function addPost()
    {
        return view('add-post');
    }

    public function addPostSubmit(Request $req)
    {
        DB::table('posts')->insert([
            'title' => $req->title,
            'description' => $req->body,
        ]);

        return back()->with('post_created', 'Post has created successfully!');
    }

    public function singlePost($id = NULL)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        return view('singlepage', compact('post'));
    }

    //:::::::::::::::::::::::::::::::::::::: Post Api ::::::::::::::::::::::::::::::::::::::::::::
    public function showAllData()
    {
        $post = Post::all();
        return $post;
    }

    public function addData(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->description = $req->description;
        $result = $post->save();
        if($result)
        {
            Return ["Result" => "Data has been saved"];
        }
        else
        {
            Return ["Result" => "Something went wrong"];
        }

    }

    public function updateData(Request $req)
    {
        $post = Post::find($req->id);
        $post->title = $req->title;
        $post->description = $req->description;
        $result = $post->update();
        if($result)
        {
            return ["result" => "Data has been updated"];
        }
        else
        {
            return ["result" => "Something went wrong"];
        }
    }

    public function deleteData($id)
    {
        $post = Post::find($id);
        $result = $post->delete();
        if($result)
        {
            return ["result" => "Data titled ".$post->title." has been deleted"];
        }
        else
        {
            return ["result" => "Something went wrong"];
        }
    }

    public function searchData($title)
    {
        $post = Post::where("title", "like", "%".$title."%")->get();
        return $post;
    }

    public function addDataWithValidation(Request $req)
    {
        $rules = array(
            "title" => "required|max:10|min:3"
        );
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            //return $validator->errors(); //by this we get the success status 200
            return response()->json($validator->errors(), 401);
        }
        else
        {
            $post = new Post();
            $post->title = $req->title;
            $post->description = $req->description;
            $result = $post->save();
            if($result)
            {
                return ["result"=>"Data has been saved"];
            }
            else
            {
                return ["result"=>"Something went wrong"];
            }
        }
    }
}
