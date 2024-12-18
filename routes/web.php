<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;


// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Authenticated routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Orders
    Route::resource('orders', OrderController::class)->except(['create', 'store', 'show', 'edit']);

    // Users
    Route::resource('users', UserController::class)->except(['create', 'store', 'show', 'edit']);
    Route::post('/users/{id}/send-email', [UserController::class, 'sendEmail'])->name('users.sendEmail');
    Route::post('/users/{id}/send-sms', [UserController::class, 'sendSms'])->name('users.sendSms');


    //Notification
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
