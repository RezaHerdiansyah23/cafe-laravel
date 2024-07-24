@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Approved Orders</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->menu->description }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="pending" class="btn btn-warning btn-sm" {{ $order->status == 'pending' ? 'disabled' : '' }}>Pending</button>
                            <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm" {{ $order->status == 'rejected' ? 'disabled' : '' }}>Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
