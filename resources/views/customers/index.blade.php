@extends('base.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('customers.create') }}"> {{__("New Customer")}}</a>
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
            <th>{{__("Name")}}</th>
            <th width="280px">{{__("Actions")}}</th>
        </tr>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>
                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">{{__("Show")}}</a>

                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">{{__("Edit")}}</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__("Delete")}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $customers->links() !!}

@endsection
