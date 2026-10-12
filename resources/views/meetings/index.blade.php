<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Agenda Rapat - SIMAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 mb-1">Daftar Agenda Rapat SIMAR</h1>
                <p class="text-slate-600">Kelola jadwal dan agenda rapat Diskominfo di sini.</p>
            </div>
            <a href="{{ route('meetings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">+ Tambah Agenda</a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="w-full border-collapse border border-slate-200 text-sm">
            <thead>
                <tr class="bg-slate-50 text-left">
                    <th class="border border-slate-200 p-3">Ruangan</th>
                    <th class="border border-slate-200 p-3">Jenis Rapat</th>
                    <th class="border border-slate-200 p-3">Tanggal</th>
                    <th class="border border-slate-200 p-3">Agenda Rapat</th>
                    <th class="border border-slate-200 p-3">Jam</th>
                    <th class="border border-slate-200 p-3">Moderator</th>
                    <th class="border border-slate-200 p-3">Status</th>
                    <th class="border border-slate-200 p-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($meetings as $meeting)
                <tr>
                    <td class="border border-slate-200 p-3 font-semibold">{{ $meeting->room_id }}</td>
                    <td class="border border-slate-200 p-3">{{ $meeting->meeting_type }}</td>
                    <td class="border border-slate-200 p-3">{{ $meeting->meeting_date }}</td>
                    <td class="border border-slate-200 p-3">{{ $meeting->title }}</td>
                    <td class="border border-slate-200 p-3">{{ $meeting->start_time }} - {{ $meeting->end_time }}</td>
                    <td class="border border-slate-200 p-3">{{ $meeting->organizer }}</td>
                    <td class="border border-slate-200 p-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $meeting->status == 'Berlangsung' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ $meeting->status }}
                        </span>
                    </td>
                    <td class="border border-slate-200 p-3">{{ $meeting->description }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="border border-slate-200 p-4 text-center text-slate-500">Belum ada agenda rapat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>