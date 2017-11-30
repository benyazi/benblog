<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Item;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;
use MediaUploader;

class AddController extends Controller
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
        $this->middleware('auth');
    }

    public function index() {
        $post = new Item();
        return view('post.add', array(
            "post" => $post
        ));
    }

    public function edit($id) {
        $post = Item::find($id);
        return view('post.add', array(
            "post" => $post
        ));
    }

    public function save(Request $request, $id=null) {
        $input = $request->except(["_token","thumb"]);
        if(is_numeric($id)) {
            $post = Item::find($id);
        } else {
            $post = new Item();
        }
        $post->setRawAttributes($input);

        if($post->save()) {
            if(!is_numeric($id)) {
                $id = $post->getAttribute('id');
            }
            $this->processShortCodes($id);
/*
            $media = MediaUploader::fromSource($request->thumb)
                ->toDestination('media', 'posts/thumbnails')
                ->upload();
            $post->attachMedia($media, ['thumbnail']);
*/
            return redirect()->route('post.edit', ['id' => $id]);
        }

        return view('post.view', array(
            "post" => $post,
            "input" => $input,
        ));
    }

    private function processShortCodes($id) {
        /**
         * @var Item $post
         * @var Tag $tagObject
         */
        $post = Item::find($id);
        $content = $post->content;
        preg_match_all('/\/([a-z]+)([\sa-zA-Z0-9]+)\n/',$content,$matches,PREG_SET_ORDER);
        foreach ($matches as $match) {
            $isClear = false;
            switch (trim($match[1])) {
                case 'tag':
                    $tags = explode(" ",trim($match[2]));
                    $i = 1;
                    foreach ($tags as $tag) {
                        $tagObject = Tag::query()->where('name',$tag)->first();
                        if(empty($tagObject)) {
                            $tagObject = new Tag([
                                'name' => $tag,
                                'used_count' => 1
                            ]);
                            $tagObject->save();
                        }
                        if(empty($post->tags()->where('tag_id',$tagObject->id)->first())) {
                            $post->tags()->save($tagObject);
                        }
                        $i++;
                    }
                    $isClear = true;
                    break;
            }
            if($isClear) $content = str_replace($match[0],"",$content);
        }
        $post->content = $content;
        $post->save();
    }
}
