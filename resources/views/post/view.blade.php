@extends('layouts.main')

@section('content')
<div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">{!!$post->title!!}</li>
    </ol>
</div>
<div>
    <h1 style="border-bottom: 2px solid #ddd;padding-bottom: 5px;">{!!$post->title!!}</h1>
</div>
<div>
    {!!$post->preview()!!}
</div>
<div>
    {!!$post->render()!!}
</div>
@if (!empty($post->getMedia('thumbnail')->first()))
<div>
    <img src="{!!$post->getMedia('thumbnail')->first()->getUrl()!!}" style="width: 100%">
</div>
@endif
@if (!Auth::guest())
<div>
    <a href="{!!$post->getLink('edit')!!}" class="btn btn-primary">Edit this post</a>
</div>
@endif
@endsection
