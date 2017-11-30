@extends('layouts.main')

@section('content')
<div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{!!route('worker.project.list')!!}">Projects</a></li>
        <li class="active">{!!$project->name!!}</li>
    </ol>
</div>
<div>
    <h1>All story by project "{{$project->name}}"</h1>
</div>
<div>
    @each('worker.story.preview', $project->stories()->get(), 'story', 'worker.project.list.empty')
</div>
@endsection
