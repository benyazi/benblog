@extends('layouts.main')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ ($post->id == null) ? 'Add new post' : 'Edit post' }}
        </div>

        @if ($post->id != null)
        {!!Form::model($post, ['route' => ['post.save', $post->id], 'files' => true])!!}
        @else
        {!!Form::model($post, ['route' => ['post.save.new'],'files' => true])!!}
        @endif
        <div class="panel-body">
            <div class="form-group">
                <label>Title</label>
                {!!Form::text('title', null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label>Slug</label>
                {!!Form::text('slug', null, ['class' => 'form-control'])!!}
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Status</label>
                        {!!Form::select('status',[
                        'created' => 'Created',
                        'published' => 'Published',
                        ], null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Type</label>
                        {!!Form::select('type',[
                        'simply' => 'Simply',
                        'markdown' => 'Markdown',
                        ], null, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Intro</label>
                {!!Form::textarea('intro', null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label>Content</label>
                {!!Form::textarea('content', null, ['class' => 'form-control'])!!}
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Published date</label>
                        {!!Form::text('published_at', null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        {!!Form::file('thumb')!!}
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="overflow: auto;">
            <div class="col-xs-6">
                {!!Form::submit('Save', ['class'=>'btn btn-success'])!!}
                @if ($post->id != null)
                <a href="{!!$post->getLink('view')!!}" class="btn btn-primary">View this post</a>
                @endif
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
