@extends('layouts.main')

@section('content')
<div>
    <style>
        table.table {
            font-size: 13px;
        }
        .red {
            background-color: red;
        }
    </style>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>DealerId</th>
            <th>Domain</th>
            <th>Code</th>
            <th>ViewId</th>
            <th>Type</th>
            <th>IsPrimary</th>
            <th>AdwordClientId</th>
            <th>VendorId</th>
        </tr>
        </thead>
        <tbody>
        <?php $nowDealer = 0; ?>
        @forelse ($rows as $row)
            @if ($nowDealer != $row->DealerId)
                <tr>
                    <td colspan="7" style="text-align: center">
                        {{$row->DealerName}}, DealerCode={{$row->VendorId}}, DealerId={{$row->DealerId}}
                    </td>
                </tr>
            @endif
            <?php $nowDealer = $row->DealerId; ?>
            <tr>
                <td><a href="https://ignite2.dealerfire.com/dealer/default/update/{{$row->DealerId}}">{{$row->DealerId}}</a></td>
                <td><a href="https://ignite2.dealerfire.com/website/default/update/{{$row->id}}">{{$row->domain}} ({{$row->id}})</a></td>
                <td>{{$row->Code}}</td>
                <td>{{$row->ViewId}}</td>
                <td>{{$row->Type}}</td>
                <td>{{$row->IsPrimary}}</td>
                <td>{{$row->AdwordClientId}}</td>
                <td>
                    {{$row->VendorId}}
                    <strong style="color:red">{{ ($row->PrimaryDealer == $row->DealerId) ? '*' : '' }}</strong>
                    <strong style="color:yellow">{{ ($mainWebsite[$row->DealerId] == $row->id) ? '*' : '' }}</strong>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="7">Empty list</td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
