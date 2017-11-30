@extends('layouts.main')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ ($game->id == null) ? 'Add new game' : 'Edit game' }}
        </div>

        @if ($game->id != null)
        {!!Form::model($game, ['route' => ['game.save', $game->id]])!!}
        @else
        {!!Form::model($game, ['route' => ['fcdb.game.save.new']])!!}
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Team Home</label>
                        {!!Form::select('team_home',$teams, null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Goal Home</label>
                        {!!Form::text('goal_home', null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Goal Away</label>
                        {!!Form::text('goal_away', null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Team Away</label>
                        {!!Form::select('team_away',$teams, null, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Тур</label>
                        {!!Form::text('tour', null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Game time</label>
                        {!!Form::text('game_time', null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-4">
                    <label>Place</label>
                    {!!Form::select('place_id',$places, null, ['class' => 'form-control'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Status</label>
                        {!!Form::select('status',[
                        'wait' => 'Wait',
                        'end' => 'End',
                        'cancel' => 'Cancel',
                        ], null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Turnir</label>
                        {!!Form::select('turnir_id',[
                        '1' => 'ПФЛ',
                        ], null, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Other</label>
                {!!Form::textarea('other_info', null, ['class' => 'form-control'])!!}
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Game date</label>
                        {!!Form::text('datetime', null, ['class' => 'form-control'])!!}
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
