<?php
namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $table = 'tags';

    protected $fillable = ['name','used_count'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post\Item','post_tag','tag_id','post_id');
    }

    public function getLink($scenario = 'view') {
        return route('tag.view', ['slug' => $this->name]);
    }
}