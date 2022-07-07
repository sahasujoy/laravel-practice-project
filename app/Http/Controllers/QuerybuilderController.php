<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuerybuilderController extends Controller
{
    // returning methods are: get(), first(), find(), count(),
    public function index()
    {
        // $posts = DB::select("select * from posts where id = 7");
        // $posts = DB::select("select * from posts where id = ?", [7]);
        // $posts = DB::select("select * from posts where id = :id", [7]);
        // $posts = DB::table('posts')->select('description')->get();
        // $posts = DB::table('posts')->where('created_at', '<', now()->subDay())->where('title', 'Life')->get(); //both where() are working... here < is used as less than
        // $posts = DB::table('posts')->where('created_at', '<', now()->subDay())->orWhere('title', 'Life')->get(); //if any one is true then u will get the output
        // $posts = DB::table('posts')->whereBetween('id', [7, 9])->get();
        // $posts = DB::table('posts')->whereNotNull('created_at')->get();
        // $posts = DB::table('posts')->orderBy('title', 'asc')->get();
        // $posts = DB::table('posts')->latest()->get(); //last post will be shown first
        // $posts = DB::table('posts')->oldest()->get();
        // $posts = DB::table('posts')->inRandomOrder()->get();
        // $posts = DB::table('posts')->min('id');
        // $posts = DB::table('posts')->max('id');
        // $posts = DB::table('posts')->sum('id');
        // $posts = DB::table('posts')->avg('id');

        // $posts = DB::table('posts')->insert([
        //     'title' => "QB",
        //     'description' => "Query Builder"
        // ]);

        // $posts = DB::table('posts')->where('id', '=', 10)->update([
        //     'title' => "Query Building ",
        //     'description' => "Query Builder is going on..."
        // ]);

        // $posts = DB::table('posts')->whereBetween('id', [11, 13])->delete();
        $posts = DB::table('posts')->select("*")->get();
        dd($posts);
    }
}
