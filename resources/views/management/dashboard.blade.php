@extends('base.layout')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <td>{{__("Month")}}</td>
                <td>{{__("Value")}}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Janeiro</td>
                <td>{{$activityCost}}</td>
            </tr>
        </tbody>
    </table>
@endsection
