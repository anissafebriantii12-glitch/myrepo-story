<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruang Rapat - SIMAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-slate-800 mb-4">Tambah Ruang Rapat Baru</h1>

        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Nama Ruangan</label>
                <input type="text" name="name" class="w-full border border-slate-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Kapasitas (Orang)</label>
                <input type="number" name="capacity" class="w-full border border-slate-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Status</label>
                <select name="status" class="w-full border border-slate-300 p-2 rounded-lg">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Perbaikan">Perbaikan</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-slate-700 font-semibold mb-2">Keterangan / Fasilitas</label>
                <textarea name="description" class="w-full border border-slate-300 p-2 rounded-lg" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('rooms.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>