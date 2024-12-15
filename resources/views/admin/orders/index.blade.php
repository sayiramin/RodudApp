@extends('layouts.app')

@section('content')
    <div class="container">
        <i class="fas fa-shopping-cart me-2"></i>
        <h1>Orders</h1>

        <!-- Filter form for status -->
        <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </div>
        </form>

        <!-- Orders table -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Pickup</th>
                <th>Delivery</th>
                <th>Pickup Time</th>
                <th>Delivery Time</th>
                <th>Weight</th>
                <th>Size</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->pickup_address }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>{{ $order->pickup_time }}</td>
                    <td>{{ $order->delivery_time }}</td>
                    <td>{{ $order->weight }}</td>
                    <td>{{ $order->size }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status=='pending' ? 'selected':'' }}>Pending</option>
                                <option value="delivered" {{ $order->status=='delivered' ? 'selected':'' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status=='cancelled' ? 'selected':'' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $orders->links() }}
    </div>
@endsection
