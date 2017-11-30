@extends('layouts.main')

@section('content')
<div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{!!route('tag.list')!!}">Tags</a></li>
        <li class="active">{!!$tag->name!!}</li>
    </ol>
</div>
<div>
    <h1>All post by tag "{{$tag->name}}"</h1>
</div>
<div>
    @each('post.list.block', $tag->posts()->get(), 'post', 'post.list.empty')
</div>
@endsection
