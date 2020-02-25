@extends('base.layout')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <td>{{__("Month")}}</td>
                <td>{{__("Received Amount")}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($monthCost as $month)
            <tr>
                <td>{{$month->month}}</td>
                <td>{{$month->cost}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
