<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Agenda Rapat - SIMAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Agenda Rapat Baru</h1>

        <form action="{{ route('meetings.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Pilih Ruangan</label>
                <select name="room_id" class="w-full border border-slate-300 p-2 rounded-lg" required>
                    <option value="">-- Pilih Ruang Rapat --</option>
                    <option value="R01">R01</option>
                    <option value="R02">R02</option>
                    <option value="R03">R03</option>
                    <option value="R04">R04</option>
                    <option value="R05">R05</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Jenis Rapat</label>
                <select name="meeting_type" class="w-full border border-slate-300 p-2 rounded-lg">
                    <option value="Internal">Internal</option>
                    <option value="Eksternal">Eksternal</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Tanggal</label>
                <input type="date" name="meeting_date" class="w-full border border-slate-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Agenda Rapat</label>
                <input type="text" name="title" class="w-full border border-slate-300 p-2 rounded-lg" required>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-slate-700 font-semibold mb-2">Jam Mulai</label>
                    <input type="time" name="start_time" class="w-full border border-slate-300 p-2 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-slate-700 font-semibold mb-2">Jam Selesai</label>
                    <input type="time" name="end_time" class="w-full border border-slate-300 p-2 rounded-lg" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Moderator / Pemimpin Rapat</label>
                <input type="text" name="organizer" class="w-full border border-slate-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block font-medium text-sm text-slate-700">Status</label>
                <select name="status" id="status" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                    <option value="Dijadwalkan">Dijadwalkan</option>
                    <option value="Berlangsung">Berlangsung</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Keterangan</label>
                <textarea name="description" class="w-full border border-slate-300 p-2 rounded-lg" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('meetings.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>