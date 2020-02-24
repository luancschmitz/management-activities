@extends('base.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{__("Activity")}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('activities.index') }}"> {{__("Back")}}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Activity Name")}}</strong>
                {{ $activity->activity_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Delivery Estimated")}}</strong>
                {{ $activity->activity_delivery_estimated }}
            </div>
        </div>
        @if($activity->activity_finish)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__("Activity Finish")}}</strong>
                    {{ $activity->activity_finish }}
                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Cost")}}</strong>
                {{ $activity->activity_cost }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__("Customer")}}</strong>
                {{ $activity->customer->name }}
            </div>
        </div>
    </div>
@endsection
