<?php
namespace App\Models\Post;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Item extends Model {
    use Mediable;
    protected $table = 'post_items';
    const TYPE_MARKDOWN = 'markdown';
    const STATUS_PUBLISHED = 'published';

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag\Tag','post_tag','post_id','tag_id');
    }

    public function preview() {
        if(!empty($this->intro)) {
            if($this->type == static::TYPE_MARKDOWN) {
                return $this->renderMarkdown('intro');
            }
            return $this->intro;
        }
        return $this->content;
    }

    public function render() {
        if($this->type == static::TYPE_MARKDOWN) {
            return $this->renderMarkdown();
        }
        return $this->content;
    }

    private function renderMarkdown($attribute = 'content') {
        return Markdown::convertToHtml($this->getAttribute($attribute));
    }

    public function getLink($scenario = 'view')
    {
        switch ($scenario) {
            case 'edit':
                return route('post.edit', ['id' => $this->id]);
                break;
            default:
                return route('post.view', ['slug' => $this->slug]);
        }
    }

    public function getPublishDate() {
        return date("m/d/Y H:i", strtotime($this->published_at));
    }
}