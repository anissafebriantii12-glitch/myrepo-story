<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMAR Diskominfo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-slate-100 to-slate-200 h-screen flex items-center justify-center font-sans">

    <div class="w-full max-w-sm p-6 text-center">
        <!-- Logo & Brand -->
        <div class="mb-6">
            <div class="inline-block bg-emerald-500 text-white p-4 rounded-2xl shadow-md mb-3">
                <i class="fa-solid fa-building-shield text-3xl"></i>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-wide">SIMAR</h1>
            <p class="text-xs font-medium text-slate-500 mt-1 uppercase tracking-wider">Sistem Informasi Manajemen Agenda Rapat</p>
            <p class="text-xs font-semibold text-slate-600">Diskominfo</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- NIP / Email Input -->
            <div>
                <input type="text" name="email" placeholder="NIP / Email" required autofocus
                    class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-sm">
            </div>

            <!-- Password Input -->
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-sm">
            </div>

            <!-- Tombol Login -->
            <div>
                <button type="submit"
                    class="w-full py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg text-sm transition shadow-sm">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>

</html>