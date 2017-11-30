@extends('layouts.main')

@section('content')
<div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">ScrumBoard</li>
    </ol>
</div>
<div class="row">
    <div class="col-xs-3">
        <div class="scrumList">
            <div class="scrumList_title">Backlog</div>
            <div class="scrumList_stories">
                @each('worker.project.scrumboard.storyItem', $project->stories()->backlogSprint($project->actualSprint->id)->get(), 'story', 'worker.project.scrumboard.emptyList')
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="scrumList">
            <div class="scrumList_title">In progress</div>
            <div class="scrumList_stories">
                @each('worker.project.scrumboard.storyItem', $project->stories()->inProgress($project->actualSprint->id)->get(), 'story', 'worker.project.scrumboard.emptyList')
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        
    </div>
    <div class="col-xs-3"></div>
</div>
@endsection
