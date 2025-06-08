<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status Kelulusan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.core.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-full w-20 bg-gradient-to-b from-blue-800 to-blue-500 transform -translate-x-full transition-all duration-500 ease-in-out z-50 sidebar overflow-hidden" id="sidebar">
        <div class="flex items-center justify-center p-4 border-b border-white/20">
            <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="PPDB Logo" class="h-10 w-10">
        </div>
        <button class="absolute top-4 right-4 text-white text-2xl close-btn" id="closeBtn">
            <i class="fas fa-times"></i>
        </button>
        <ul class="mt-4 px-4 flex flex-col h-full">
            @if (auth()->check() && auth()->user()->role === 'user')
                <li class="mb-3">
                    <a href="/register" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                        <i class="fas fa-user-plus mr-3"></i>
                        <span>Form Pendaftaran</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="mb-3">
                    <a href="{{ route('login') }}" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                        <i class="fas fa-sign-in-alt mr-3"></i>
                        <span>Login</span>
                    </a>
                </li>
            @endif
            <li class="mb-3">
                <a href="/home" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                    <i class="fas fa-home mr-3"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="mb-3">
                <a href="/about" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                    <i class="fas fa-info-circle mr-3"></i>
                    <span>Tentang PPDB</span>
                </a>
            </li>
            <li class="mb-3">
                <a href="/contact" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                    <i class="fas fa-envelope mr-3"></i>
                    <span>Kontak</span>
                </a>
            </li>
            <li class="mb-3">
                <a href="{{ route('cek.status') }}" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
                    <i class="fas fa-search mr-3"></i>
                    <span>Cek Status Kelulusan</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Content Wrapper -->
    <div class="transition-transform duration-300 ease-in-out content-wrapper" id="contentWrapper">
        <!-- Tombol Hamburger -->
        <button class="hamburger fixed top-4 left-4 text-blue-900 text-3xl p-8 z-60" id="hamburgerBtn">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Centered Form -->
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">Cek Status Kelulusan</h2>
                @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('cek.status.submit') }}" method="POST" class="space-y-4 text-center">
                    @csrf
                    <div>
                        <label for="registration_number" class="block text-base font-medium text-gray-700 mb-2 text-center">Nomor Pendaftaran</label>
                        <input type="text" name="registration_number" id="registration_number" required
                            maxlength="14"
                            pattern="\d{4}-\d{4}-\d{4}"
                            class="w-full text-center px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('registration_number') border-red-500 @enderror"
                            placeholder="1234-5678-9012"
                            oninput="formatRegistrationNumber(this)"
                        >
                        @error('registration_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="born_of_date" class="block text-base font-medium text-gray-700 mb-2 text-center">Tanggal Lahir (YYYY-MM-DD)</label>
                        <input type="text" name="born_of_date" id="born_of_date" required
                            pattern="\d{4}-\d{2}-\d{2}"
                            maxlength="10"
                            class="w-full text-center px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('born_of_date') border-red-500 @enderror"
                            placeholder="YYYY-MM-DD"
                        >
                        @error('born_of_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-700 text-white rounded hover:bg-blue-800 transition">
                        Cek Status
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar JS -->
    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('closeBtn');
        const contentWrapper = document.getElementById('contentWrapper');

        if (hamburgerBtn && sidebar && closeBtn && contentWrapper) {
            hamburgerBtn.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-72');
                contentWrapper.classList.add('translate-x-32');
                hamburgerBtn.classList.add('hidden');
            });

            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('w-72');
                sidebar.classList.add('w-20');
                contentWrapper.classList.remove('translate-x-32');
                hamburgerBtn.classList.remove('hidden');
            });
        }

        function formatRegistrationNumber(input) {
            let value = input.value.replace(/\D/g, '').slice(0, 12);
            let formatted = value.match(/.{1,4}/g);
            input.value = formatted ? formatted.join('-') : '';
        }
    </script>
</body>
</html>