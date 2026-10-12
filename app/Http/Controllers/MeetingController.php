<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');

        if ($type) {
            $meetings = Meeting::where('meeting_type', $type)->get();
        } else {
            $meetings = Meeting::all(); // Ini akan menampilkan seluruh data jika tidak ada filter type
        }

        return view('dashboard', compact('meetings'));
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'meeting_type' => 'required',
            'meeting_date' => 'required|date',
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'organizer' => 'required',
            'status' => 'required',
            'description' => 'nullable',
        ]);

        Meeting::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Agenda rapat berhasil ditambahkan!');
    }
    // Menampilkan form edit rapat
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('meetings.edit', compact('meeting'));
    }

    // Memperbarui data rapat
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required',
            'meeting_type' => 'required',
            'meeting_date' => 'required|date',
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'organizer' => 'required',
            'status' => 'required',
            'description' => 'nullable',
        ]);

        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Agenda rapat berhasil diperbarui!');
    }

    // Menghapus data rapat
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('dashboard')->with('success', 'Agenda rapat berhasil dihapus!');
    }
}
