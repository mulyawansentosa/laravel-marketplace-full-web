@extends('layouts.app')

@section('content')
<div class="container user-page">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3>My Personal Information</h3>
                <a href="#"><button class="btn btn-xs btn-primary">Edit</button></a>
            </div>
            <div class="col-md-4 user-img">
                <img class="img-responsive img-thumbnail" src="{{ asset('upload/'.$user->avatar) }}" alt="noImage">
            </div>
            <div class="col-md-8 ">

                <form class="form-horizontal">
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name') !!}
                        {{ $user->first_name }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name') !!}
                        {{ $user->last_name }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('date_of_birth', 'Date Of Birth') !!}
                        {{ $user->date_of_birth }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number') !!}
                        {{ $user->phone_number }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address') !!}
                        {{ $user->address }}
                    </div>
                    @if (!empty($user->country))
                    <div class="form-group">
                        {!! Form::label('country', 'Country') !!}
                        {{ $user->country->name }}
                    </div>
                    @endif
                    @if (!empty($user->city))
                    <div class="form-group">
                        {!! Form::label('city', 'City') !!}
                        {{ $user->city->name }}
                    </div>
                    @endif
                    @if (!empty($user->district))
                    <div class="form-group">
                        {!! Form::label('district', 'District') !!}
                        {{ $user->district->name }}
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
    <div>
        <h3>Orders list</h3>
        <table class="table table-striped">
                <tr>
                    <td>Order id</td>
                    <td>Date order</td>
                    <td>Item</td>
                    <td>Subtotal</td>
                    <td>Status</td>
                    <td>Detail</td>
                </tr>
            @foreach ($user->orders as $order)
                <tr>
                    <td>
                    {{ $order->id }}</td>
                    <td>{{ $order->create_at }}</td>
                    <td>{{ $order->items() }}</td>
                    <td>{{ $order->subtotal() }}</td>
                    <td>{{ $order->statusText() }}</td>
                    <td><a href="{{ route('orderInformation', ['order_id' => $order->id]) }}">Detail Information</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
