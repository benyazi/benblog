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
            <th>Name</th>
            <th>Balanse</th>
            <th>Bonus</th>
            <th>Status</th>
            <th>Summ</th>
            <th>Unpaid</th>
            <th>UserId</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($balanses as $balans)
            <tr>
                <td>#</td>
                <td>{{$balans["name"]}}</td>
                <td class="{{ ($balans['balance'] < 10000) ? 'red' : 'simple' }}">
                    {{$balans["balance"]}}
                </td>
                <td>{{$balans["bonus"]}}</td>
                <td>{{$balans["status"]}}</td>
                <td>{{$balans["summ"]}}</td>
                <td>{{$balans["unpaid"]}}</td>
                <td>{{$balans["user_id"]}}</td>
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
