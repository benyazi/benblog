@extends('layouts.main')

@section('content')
<div>
    <style>
        .red {
            background-color: red;
        }
    </style>
    <div class="storyList">
        @forelse ($stories as $story)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{$story->getLink()}}">{{$story->Name}}</a>
                    </div>
                    <div class="col-xs-3">
                        <a href="{{$story->getLink('edit')}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>                
            </div>
        </div>
        @empty
        <div class="panel panel-default">
            <div class="panel-body">
                Empty list
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
