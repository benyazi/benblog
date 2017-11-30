<?php

namespace App\Http\Middleware;

use App\Models\Post\Item;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->route()->getName()=='post.view') {
            $post = Item::where('slug',$request->slug)->first();
            if(empty($post) || !$this->checkPostIsPublishedOrUserAuth($post)) {
                return redirect('/');
            }
        }
        return $next($request);
    }

    public function checkPostIsPublishedOrUserAuth($post) {
        if (Auth::guest() && $post->status != Item::STATUS_PUBLISHED) {
            return false;
        }
        return true;
    }
}
