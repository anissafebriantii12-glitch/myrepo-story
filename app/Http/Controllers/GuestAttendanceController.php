<?php

namespace App\Http\Controllers;

use App\Models\GuestAttendance;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestAttendanceController extends Controller
{
    // Menampilkan form absen khusus mobile berdasarkan QR Code rapat
    public function create($meetingId)
    {
        $meeting = Meeting::findOrFail($meetingId);
        return view('guest-attendances.create', compact('meeting'));
    }

    // Menyimpan data absen dan foto yang di-upload tamu
    public function store(Request $request, $meetingId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        // Simpan foto ke folder public/storage/guest-photos
        $photoPath = $request->file('photo')->store('guest-photos', 'public');

        // Simpan ke database
        GuestAttendance::create([
            'meeting_id' => $meetingId,
            'name' => $request->name,
            'agency' => $request->agency,
            'photo' => $photoPath,
        ]);

        return redirect()->route('guest.attendance.success')->with('success', 'Kehadiran berhasil direkam. Terima kasih!');
    }

    // Halaman sukses setelah isi absen
    public function success()
    {
        return view('guest-attendances.success');
    }
}
