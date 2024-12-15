<!-- resources/views/dashboard.blade.php -->
<?php
$statusClass = [
    'completed' => 'bg-success',
    'delivered' => 'bg-success',
    'pending' => 'bg-warning',
    'cancelled' => 'bg-danger',
    'in_progress' => 'bg-info',
];?>
@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">
                    <i class="fas fa-clipboard-list"></i>
                    Total Orders</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalOrders }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">
                    <i class="fas fa-truck"></i>
                    Delivered</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $completedOrders }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">
                    <i class="fas fa-hourglass-half"></i>
                    In Progress</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $inProgressOrders }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">
                    <i class="fas fa-clock"></i>
                    Pending</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pendingOrders }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Total Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsers }}</h5>
                </div>
            </div>
        </div>
    </div>


        <div class="row mt-4">
            <!-- Orders Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-shopping-cart me-2"></i>
                        <h6 class="mb-0">Recent Orders</h6>
                    </div>
                    <div class="card-body fs-6">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Weight</th>
                                <th>Destination</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td><small>{{$order->user->name }}</small></td>
                                    <td><small>{{ $order->weight }}</small></td>
                                    <td><small>{{ substr($order->delivery_address,0,30) .'..'}}</small></td>
                                    <td>
                                      <span class="text-sm fw-normal badge rounded-pill {{ $statusClass[$order->status] ?? 'bg-secondary' }}">
                                          <small class="fw-normal">{{ str_replace('_', ' ', $order->status) }}</small>
                                      </span>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <i class="fa-solid fa-user me-2"></i>
                        <h6 class="mb-0">Last Signups</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><small>{{ $user->name }}</small></td>
                                    <td><small>{{ $user->phone }}</small></td>
                                    <td><small>{{ $user->email }}</small></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



@endsection
