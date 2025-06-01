<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - PPDB SMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .decorative-left, .decorative-right {
            position: fixed;
            width: 100px;
            height: 100vh;
            z-index: 0;
        }
        .decorative-left {
            left: 0;
        }
        .decorative-right {
            right: 0;
            transform: scaleX(-1);
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .form-container {
            max-height: 50vh;
            overflow-y: auto;
            padding-right: 8px;
        }
        .form-container::-webkit-scrollbar {
            width: 8px;
        }
        .form-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        .form-container::-webkit-scrollbar-thumb {
            background: #4682B4;
            border-radius: 4px;
        }
        .form-container::-webkit-scrollbar-thumb:hover {
            background: #4169E1;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="decorative-left">
        <svg width="100" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
            <circle cx="75" cy="150" r="20" fill="#87CEEB" transform="translate(0, 40)" />
            <path d="M0 200 L50 250 L0 300" fill="#B0E0E6" transform="translate(10, 60)" />
            <path d="M50 250 L100 300 L50 350" fill="#4682B4" transform="translate(10, 80)" />
            <rect x="30" y="350" width="40" height="40" fill="white" transform="rotate(45 50 370) translate(0, 100)" />
            <path d="M0 400 L100 400 L50 450" fill="#87CEEB" transform="translate(-10, 120)" />
            <circle cx="25" cy="500" r="15" fill="#4682B4" transform="translate(10, 140)" />
            <path d="M50 550 L100 600 L0 600" fill="#B0E0E6" transform="translate(0, 160)" />
        </svg>
    </div>
    <div class="decorative-right">
        <svg width="100" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
            <circle cx="75" cy="150" r="20" fill="#87CEEB" transform="translate(0, 40)" />
            <path d="M0 200 L50 250 L0 300" fill="#B0E0E6" transform="translate(10, 60)" />
            <path d="M50 250 L100 300 L50 350" fill="#4682B4" transform="translate(10, 80)" />
            <rect x="30" y="350" width="40" height="40" fill="white" transform="rotate(45 50 370) translate(0, 100)" />
            <path d="M0 400 L100 400 L50 450" fill="#87CEEB" transform="translate(-10, 120)" />
            <circle cx="25" cy="500" r="15" fill="#4682B4" transform="translate(10, 140)" />
            <path d="M50 550 L100 600 L0 600" fill="#B0E0E6" transform="translate(0, 160)" />
        </svg>
    </div>

    <div class="relative z-10 max-w-md w-full bg-white shadow-lg rounded-lg p-4">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="PPDB Logo" class="h-16 w-16">
        </div>
        <h2 class="text-2xl font-semibold text-blue-900 text-center mb-4">Registrasi - PPDB SMA</h2>

        <div class="form-container">
            <form action="{{ route('register.submit') }}" method="POST" id="register-form">
                @csrf
                <div class="mb-2">
                    <label for="name" class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-blue-500"></i>
                        </span>
                        <input type="text" name="name" id="name" class="w-full pl-10 pr-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user-circle text-blue-500"></i>
                        </span>
                        <input type="text" name="username" id="username" class="w-full pl-10 pr-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" value="{{ old('username') }}" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-blue-500"></i>
                        </span>
                        <input type="email" name="email" id="email" class="w-full pl-10 pr-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-blue-500"></i>
                        </span>
                        <input type="password" name="password" id="password" class="w-full pl-10 pr-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-blue-500"></i>
                        </span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full pl-10 pr-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
                    </div>
                </div>
            </form>
        </div>

        <button type="submit" form="register-form" class="w-full bg-gradient-to-r from-blue-800 to-blue-500 text-white font-medium py-2 rounded-lg hover:from-blue-900 hover:to-blue-600 transition-all duration-300 mt-4">Daftar</button>

        <p class="text-center text-gray-600 mt-2">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login di sini</a>
        </p>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                color: '#ffffff',
                background: '#4682B4',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Gagal',
                html: `<ul class="list-disc list-inside text-left">${@foreach ($errors->all() as $error) '<li>{{ $error }}</li>' @endforeach}</ul>`,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                color: '#ffffff',
                background: '#FF4444',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        @endif
    </script>
</body>
</html>