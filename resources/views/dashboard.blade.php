<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIMAR Diskominfo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <!-- SIDEBAR KIRI -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between">
        <div>
            <!-- Logo / Brand -->
            <div class="px-6 py-5 bg-slate-950 flex items-center gap-3">
                <div class="bg-emerald-600 text-white p-2 rounded-lg font-bold text-lg"><i class="fa-solid fa-building-shield"></i></div>
                <span class="text-white font-bold text-xl tracking-wider">SIMAR</span>
            </div>

            <!-- User Info -->
            <div class="px-6 py-4 border-b border-slate-800 flex items-center gap-3">
                <div class="bg-emerald-600 text-white rounded-full h-10 w-10 flex items-center justify-center font-bold">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <p class="text-xs text-slate-400">Welcome,</p>
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->name ?? 'Admin' }}</p>
                </div>
            </div>

            <!-- Menu Navigation -->
            <div class="px-4 py-4">
                <p class="text-xs font-semibold text-slate-500 uppercase px-3 mb-2">Keterangan</p>

                <!-- Menu Home dengan Dropdown -->
                <div class="mb-1">
                    <button onclick="toggleDropdown('homeSubmenu')" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg bg-slate-800 text-white text-sm font-medium transition">
                        <span class="flex items-center gap-3"><i class="fa-solid fa-house"></i> Home</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <!-- Submenu Dashboard -->
                    <div id="homeSubmenu" class="pl-8 py-1 space-y-1">
                        <a href="{{ route('meetings.index') }}" class="block px-3 py-2 rounded-lg text-sm text-emerald-400 font-medium bg-slate-800/50">Dashboard</a>
                    </div>
                </div>

                <!-- Menu Rapat dengan Dropdown -->
                <div class="mt-2">
                    <button onclick="toggleDropdown('meetingSubmenu')" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg hover:bg-slate-800 text-slate-300 text-sm font-medium transition">
                        <span class="flex items-center gap-3"><i class="fa-solid fa-calendar-days"></i> Rapat</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <!-- Submenu Internal & Eksternal -->
                    <div id="meetingSubmenu" class="pl-8 py-1 space-y-1">
                        <a href="{{ route('meetings.index', ['type' => 'Internal']) }}" class="block px-3 py-2 rounded-lg text-sm text-slate-400 hover:text-white hover:bg-slate-800/50 transition">Internal</a>
                        <a href="{{ route('meetings.index', ['type' => 'Eksternal']) }}" class="block px-3 py-2 rounded-lg text-sm text-slate-400 hover:text-white hover:bg-slate-800/50 transition">Eksternal</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout di bawah sidebar -->
        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-600/20 text-red-400 text-sm font-medium transition">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA KANAN -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto">

        <!-- Top Navbar -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center border-b border-slate-200">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-bars text-slate-600 cursor-pointer text-lg"></i>
                <h1 class="text-xl font-bold text-slate-800">Dashboard</h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="bg-emerald-600 text-white text-xs px-2.5 py-1 rounded-full font-semibold">Admin <i class="fa-solid fa-user ml-1"></i></span>
            </div>
        </header>

        <!-- Main Area -->
        <main class="p-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">

                <!-- Action Bar di atas tabel -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-slate-800">Jadwal Rapat</h2>
                    <div class="flex gap-2">
                        <a href="{{ route('meetings.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2 transition">
                            <i class="fa-solid fa-plus"></i> Tambah Rapat
                        </a>
                    </div>
                </div>

                <!-- Tabel Data Rapat -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-200 text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-slate-700 text-left">
                                <th class="border border-slate-200 p-3">Ruangan</th>
                                <th class="border border-slate-200 p-3">Jenis Rapat</th>
                                <th class="border border-slate-200 p-3">Tanggal</th>
                                <th class="border border-slate-200 p-3">Agenda Rapat</th>
                                <th class="border border-slate-200 p-3">Jam</th>
                                <th class="border border-slate-200 p-3">Moderator/Pimpinan</th>
                                <th class="border border-slate-200 p-3">Status</th>
                                <th class="border border-slate-200 p-3">Keterangan</th>
                                <th class="border border-slate-200 p-3 text-center">QR Code</th>
                                <th class="border border-slate-200 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($meetings as $meeting)
                            <tr class="hover:bg-slate-50">
                                <td class="border border-slate-200 p-3 font-semibold text-slate-800">{{ $meeting->room_id }}</td>
                                <td class="border border-slate-200 p-3 text-slate-600">{{ $meeting->meeting_type }}</td>
                                <td class="border border-slate-200 p-3 text-slate-600">{{ $meeting->meeting_date }}</td>
                                <td class="border border-slate-200 p-3 text-slate-800 font-medium">{{ $meeting->title }}</td>
                                <td class="border border-slate-200 p-3 text-slate-600">{{ $meeting->start_time }} - {{ $meeting->end_time }}</td>
                                <td class="border border-slate-200 p-3 text-slate-600">{{ $meeting->organizer }}</td>
                                <td class="border border-slate-200 p-3">
                                    <span class="px-2.5 py-1 rounded text-xs font-semibold {{ $meeting->status == 'Berlangsung' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $meeting->status }}
                                    </span>
                                </td>
                                <td class="border border-slate-200 p-3 text-slate-600">{{ $meeting->description }}</td>

                                <!-- Tombol QR Code Tamu -->
                                <td class="border border-slate-200 p-3 text-center">
                                    <button
                                        type="button"
                                        data-title="{{ $meeting->title }}"
                                        data-url="{{ route('guest.attendance.create', $meeting->id) }}"
                                        onclick="openQrModalFromButton(this)"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-emerald-100 text-emerald-700 font-medium rounded-lg text-xs hover:bg-emerald-200 transition" title="Tampilkan QR Code">
                                        <i class="fa-solid fa-qrcode mr-1"></i> QR Code
                                    </button>
                                </td>

                                <td class="border border-slate-200 p-3 flex items-center justify-center gap-2">
                                    <a href="{{ route('meetings.edit', $meeting->id) }}" class="p-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus agenda ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="border border-slate-200 p-6 text-center text-slate-500">Belum ada agenda rapat yang ditambahkan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <!-- Modal (Pop-up) QR Code -->
    <div id="qrModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full items-center justify-center bg-gray-900/60 transition-opacity duration-300 opacity-0">
        <div class="relative w-full max-w-sm max-h-full">
            <div class="relative bg-white rounded-2xl shadow-xl">
                <!-- Header Modal -->
                <div class="flex items-center justify-between p-5 border-b rounded-t">
                    <h3 id="modalMeetingTitle" class="text-lg font-semibold text-gray-900 truncate pr-4">
                        Judul Rapat
                    </h3>
                    <button type="button" onclick="closeQrModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Isi Modal (QR Code) -->
                <div class="p-8 text-center">
                    <div class="inline-block p-3 border-4 border-slate-100 rounded-3xl bg-white shadow-inner mb-4">
                        <img id="qrImageUrl" src="" alt="QR Code Absensi" class="w-48 h-48 mx-auto">
                    </div>
                    <p class="text-xs text-slate-500 max-w-xs mx-auto">Tamu dapat men-*scan* kode ini menggunakan kamera HP untuk mengisi daftar hadir rapat.</p>
                </div>

                <!-- Footer Modal -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b justify-center bg-slate-50">
                    <button onclick="closeQrModal()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const element = document.getElementById(id);
            element.classList.toggle('hidden');
        }

        const modal = document.getElementById('qrModal');
        const modalTitle = document.getElementById('modalMeetingTitle');
        const qrImage = document.getElementById('qrImageUrl');

        // Fungsi baru yang membaca data dari tombol
        function openQrModalFromButton(button) {
            const meetingTitle = button.getAttribute('data-title');
            const attendanceUrl = button.getAttribute('data-url');

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.add('opacity-100');
            }, 10);

            modalTitle.textContent = meetingTitle;

            const encodedUrl = encodeURIComponent(attendanceUrl);
            qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodedUrl}&ecc=M`;
        }

        function closeQrModal() {
            modal.classList.remove('opacity-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                qrImage.src = '';
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeQrModal();
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape" && !modal.classList.contains('hidden')) {
                closeQrModal();
            }
        });
    </script>
</body>

</html>