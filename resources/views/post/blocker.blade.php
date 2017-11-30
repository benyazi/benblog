<div style="background-color: #2a88bd;color:#fff;padding: 10px;text-align: center;">
    @forelse ($post->getBlocks() as $block)
    <div>
        {!!$block->render()!!}
    </div>
    @empty
    <div>
        Empty blocks
    </div>
    @endforelse
</div>
