@extends('layouts.main')

@section('content')
<div>
    <style>
        .red {
            background-color: red;
        }
    </style>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>TeamHome</th>
            <th>Score</th>
            <th>TeamHome</th>
            <th>Place</th>
            <th>Date</th>
            <th>Turnir</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($games as $game)
            <tr>
                <td>#</td>
                <td>{{$game->teamHome->title}}</td>
                <td>
                    {{$game->goal_home}}:{{$game->goal_away}}
                </td>
                <td>{{$game->teamAway->title}}</td>
                <td>{{$game->place->title}}</td>
                <td>{{$game->datetime}}</td>
                <td>{{$game->turnir_id}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8">Empty list</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
