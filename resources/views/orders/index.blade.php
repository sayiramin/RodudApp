<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Orders</h1>

    <div class="mb-3">
        <form method="GET" action="{{ route('orders.index') }}" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Filter</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Pickup Address</th>
            <th>Delivery Address</th>
            <th>Pickup Time</th>
            <th>Delivery Time</th>
            <th>Weight</th>
            <th>Size</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->pickup_address }}</td>
                <td>{{ $order->delivery_address }}</td>
                <td>{{ $order->pickup_time }}</td>
                <td>{{ $order->delivery_time }}</td>
                <td>{{ $order->weight }} kg</td>
                <td>{{ $order->size }}</td>
                <td>
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>
                </td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>{{ $order->updated_at->format('Y-m-d') }}</td>
                <td>
                    <!-- Future actions like view or delete can be added here -->
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">No orders found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
@endsection
