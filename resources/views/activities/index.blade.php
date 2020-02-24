@extends('base.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('activities.create') }}">{{__("New Activity")}}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ __($message) }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>{{__("Activity Name")}}</th>
            <th>{{__("Activity Delivery Estimated")}}</th>
            <th>{{__("Activity Finish")}}</th>
            <th>{{__("Activity Cost")}}</th>
            <th>{{__("Customer")}}</th>
            <th width="280px">{{__("Actions")}}</th>
        </tr>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->activity_name }}</td>
                <td>{{ $activity->activity_delivery_estimated }}</td>
                <td>{{ $activity->activity_finish ?? "Não Concluído"}}</td>
                <td>{{ $activity->activity_cost }}</td>
                <td>{{ $activity->customer->name }}</td>
                <td>
                    <form action="{{ route('activities.destroy',$activity->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('activities.show',$activity->id) }}">{{__("Show")}}</a>

                        <a class="btn btn-primary" href="{{ route('activities.edit',$activity->id) }}">{{__("Edit")}}</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">{{__("Delete")}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $activities->links() !!}

@endsection
