<div class="panel panel-default">
    <div class="panel-body">
        <h4>{{$post->title}}</h4>
        {!!$post->preview()!!}
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-6">
                    <span class="badge badge-default">
                        {!!$post->getPublishDate()!!}
                    </span>
                @forelse ($post->tags()->get() as $tag)
                <a href="{!!$tag->getLink()!!}">
                    <span class="badge badge-info">#{{$tag->name}}</span>
                </a>
                @empty
                Tag list empty
                @endforelse
            </div>
            <div class="col-xs-6">
                <a class="btn btn-default btn-sm pull-right" href="{!!$post->getLInk()!!}">More...</a>
            </div>
        </div>
    </div>
</div>