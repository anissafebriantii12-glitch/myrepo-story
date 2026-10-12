<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Tamu - {{ $meeting->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden p-6 sm:p-8">

            <!-- Header Info Rapat -->
            <div class="text-center mb-6">
                <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded-full mb-2">Absensi Kehadiran</span>
                <h1 class="text-xl font-bold text-slate-900 leading-snug">{{ $meeting->title }}</h1>
                <p class="text-xs text-slate-500 mt-1">Silakan isi data diri Anda untuk konfirmasi kehadiran rapat.</p>
            </div>

            <!-- Notifikasi Error Validasi -->
            @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-lg">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form Absen -->
            <form action="{{ route('guest.attendance.store', $meeting->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Contoh: Budi Santoso"
                        class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white focus:outline-none transition">
                </div>

                <div>
                    <label for="agency" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Asal Instansi / Perusahaan</label>
                    <input type="text" name="agency" id="agency" required value="{{ old('agency') }}" placeholder="Contoh: Dinas Kominfo"
                        class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:bg-white focus:outline-none transition">
                </div>

                <div>
                    <label for="photo" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Bukti Foto Kehadiran</label>
                    <input type="file" name="photo" id="photo" accept="image/*" required
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-300 rounded-xl bg-slate-50">
                    <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, JPEG (Maks. 2MB)</p>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl text-sm shadow-lg shadow-emerald-600/30 transition duration-200">
                        Kirim Kehadiran
                    </button>
                </div>
            </form>

        </div>
        <div class="mt-6 text-center text-xs text-slate-400">
            &copy; SIMAR - Sistem Informasi Manajemen Agenda Rapat
        </div>
    </div>
</body>

</html>