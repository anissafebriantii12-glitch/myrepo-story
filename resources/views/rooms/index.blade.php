<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Ruang Rapat - SIMAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Bagian ini yang diganti dengan tombol tambah -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 mb-1">Daftar Ruang Rapat SIMAR</h1>
                <p class="text-slate-600">Kelola ketersediaan ruang rapat Diskominfo di sini.</p>
            </div>
            <a href="{{ route('rooms.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">+ Tambah Ruangan</a>
        </div>

        <table class="w-full border-collapse border border-slate-200">
            <thead>
                <tr class="bg-slate-50 text-left">
                    <th class="border border-slate-200 p-3">Nama Ruangan</th>
                    <th class="border border-slate-200 p-3">Kapasitas</th>
                    <th class="border border-slate-200 p-3">Status</th>
                    <th class="border border-slate-200 p-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                <tr>
                    <td class="border border-slate-200 p-3">{{ $room->name }}</td>
                    <td class="border border-slate-200 p-3">{{ $room->capacity }} Orang</td>
                    <td class="border border-slate-200 p-3">{{ $room->status }}</td>
                    <td class="border border-slate-200 p-3">{{ $room->description }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border border-slate-200 p-3 text-center text-slate-500">Belum ada data ruangan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>