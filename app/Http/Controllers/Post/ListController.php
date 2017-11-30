<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Item;

class ListController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List Controller
    |--------------------------------------------------------------------------
    */
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index() {
        $posts = Item::where('status','=', 'published')->orderBy('published_at', 'DESC')->paginate();
        return view('post.list', array(
            "posts" => $posts
        ));
    }
}
