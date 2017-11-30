@extends('layouts.main')

@section('content')
<div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Projects</li>
    </ol>
</div>
<div>
    <h1>All allowed projects</h1>
</div>
<div>
    @each('worker.project.list.preview_simple', $projects, 'project', 'worker.project.list.empty')
</div>
@endsection
