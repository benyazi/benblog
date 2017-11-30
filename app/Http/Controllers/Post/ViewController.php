<?php

namespace App\Http\Controllers\Post;

use App\Components\Posts\PostFactory;
use App\Http\Controllers\Controller;
use App\Models\Post\Item;
use App\Posts;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add Controller
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

    public function index($slug) {
        $post = Item::where('slug', $slug)->first();

        return view('post.view', array(
            "post" => $post
        ));
    }
}
