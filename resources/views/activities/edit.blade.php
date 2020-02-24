@extends('base.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__("Activity") . " #" . $activity->id}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('activities.index') }}"> {{__("Back")}}</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>{{__("There were some problems with your input")}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.update',$activity->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__("Activity Name")}}:</strong>
                    <input type="text" name="activity_name" value="{{$activity->activity_name}}" class="form-control" placeholder="{{__("Name")}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__("Delivery Estimated")}}</strong>
                    <input class="form-control" name="activity_delivery_estimated" value="{{$activity->activity_delivery_estimated}}" placeholder="{{__("Delivery Estimated")}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__("Cost")}}:</strong>
                    <input class="form-control" name="activity_cost" value="{{$activity->activity_cost}}" placeholder="{{__("Cost")}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__("Customer")}}:</strong>
                    <select class="form-control" name="customer_id">
                        @foreach($customers as $customer)
                            @if($customer->id == $activity->customer->id)
                                <option selected value="{{$customer->id}}">{{$customer->name}}</option>
                            @else
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
            </div>
        </div>

    </form>
@endsection
