@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Notifications</h1>
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-success">Mark All as Read</button>
            </form>
        </div>

        @if($notifications->count())
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Message</th>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Weight</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                    @php
                        $data = $notification->data;
                    @endphp
                    <tr class="{{ is_null($notification->read_at) ? 'table-warning' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data['message'] }}</td>
                        <td>{{ $data['order_id'] }}</td>
                        <td>{{ $data['customer_name'] }} ({{ $data['customer_email'] }})</td>
                        <td>{{ $data['order_weight'] }} kg</td>
                        <td>{{ $data['pickup_address'] }} → {{ $data['delivery_address'] }}</td>
                        <td>{{ $notification->read_at ? 'Read' : 'Unread' }}</td>
                        <td>
                            @if(is_null($notification->read_at))
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Mark as Read</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $notifications->links() }}
            </div>
        @else
            <div class="alert alert-info">No notifications found.</div>
        @endif
    </div>
@endsection
