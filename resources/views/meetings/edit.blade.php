<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agenda Rapat - SIMAR Diskominfo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans p-8">

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-pen-to-square text-sky-500"></i> Edit Agenda Rapat
        </h2>

        <form action="{{ route('meetings.update', $meeting->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Ruangan</label>
                <input type="text" name="room_id" value="{{ $meeting->room_id }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jenis Rapat</label>
                <select name="meeting_type" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm">
                    <option value="Internal" {{ $meeting->meeting_type == 'Internal' ? 'selected' : '' }}>Internal</option>
                    <option value="Eksternal" {{ $meeting->meeting_type == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Rapat</label>
                <input type="date" name="meeting_date" value="{{ $meeting->meeting_date }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Agenda Rapat (Judul)</label>
                <input type="text" name="title" value="{{ $meeting->title }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                    <input type="time" name="start_time" value="{{ $meeting->start_time }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                    <input type="time" name="end_time" value="{{ $meeting->end_time }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Moderator / Pimpinan</label>
                <input type="text" name="organizer" value="{{ $meeting->organizer }}" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm">
                    <option value="Berlangsung" {{ $meeting->status == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                    <option value="Selesai" {{ $meeting->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Dijadwalkan" {{ $meeting->status == 'Dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Keterangan / Deskripsi</label>
                <textarea name="description" rows="3" class="w-full rounded-lg border-slate-300 border p-2.5 text-sm">{{ $meeting->description }}</textarea>
            </div>

            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-400 transition">Batal</a>
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-semibold hover:bg-emerald-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>

</html>