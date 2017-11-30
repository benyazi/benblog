@extends('layouts.main')

@section('content')
<div>
    @each('post.list.block', $posts, 'post', 'post.list.empty')
</div>
@endsection
