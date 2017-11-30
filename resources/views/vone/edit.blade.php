@extends('layouts.main')

@section('content')
<div>
    <div class="panel panel-default storyBlock">
        <div class="panel-heading">
            <h3>Edit story: {{$story->Number}}</h3>
        </div>
        {!!Form::open(['route' => ['vone.story.save', $story->Number]])!!}
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <strong>Origin link (in VersionOne):</strong> <a href="{{$story->getLink('vone')}}">{{$story->getLink('vone')}}</a>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Id</label>
                        {!!Form::text('Id', $story->_oid, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Name</label>
                        {!!Form::text('Name', $story->Name, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Description</label>
                        {!!Form::textarea('Description', $story->Description, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Description Markdown</label>
                        {!!Form::textarea('DescriptionMarkdown', $story->getMarkdown('Description'), ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>DeploymentInstructions</label>
                        {!!Form::textarea('Custom_DeploymentInstructions', $story->Custom_DeploymentInstructions, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer" style="overflow: auto;">
            <div class="col-xs-6">
                {!!Form::submit('Save', ['class'=>'btn btn-success'])!!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
