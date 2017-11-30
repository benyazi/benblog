<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index() {
        $tags = [];
        return view('tag.list', array(
            "tags" => $tags
        ));
    }
    
    public function view($slug) {
        $tag = Tag::where('name',$slug)->first();
        return view('tag.view', array(
            "tag" => $tag
        ));
    }
}
