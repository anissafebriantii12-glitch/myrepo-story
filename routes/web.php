<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestAttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute Absensi Tamu via QR Code (Publik / Tanpa Login)
Route::get('/meeting/{meetingId}/attend', [GuestAttendanceController::class, 'create'])->name('guest.attendance.create');
Route::post('/meeting/{meetingId}/attend', [GuestAttendanceController::class, 'store'])->name('guest.attendance.store');
Route::get('/meeting/attendance/success', [GuestAttendanceController::class, 'success'])->name('guest.attendance.success');

Route::get('/dashboard', [MeetingController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes (Khusus Admin/Pegawai yang login)
    Route::resource('rooms', RoomController::class);
    Route::resource('meetings', MeetingController::class);
});

require __DIR__ . '/auth.php';
