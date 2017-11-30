<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'post_items';
    const TYPE_BLOCK = 'Blocks';

    /**
     * Get the user that owns the phone.
     */
    public function blocks()
    {
        return $this->hasMany('App\Models\Post\Block', 'post_id');
    }
}
