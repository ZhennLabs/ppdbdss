<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMP Perintis - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.core.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .marquee {
            animation: marquee 10s linear infinite;
            white-space: nowrap;
        }
        .glide__arrows {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 1rem;
        }
        .glide__arrow {
            color: black;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }
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
    </style>
</head>
<body class="font-sans">
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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="flex items-center text-white text-lg p-3 rounded-lg hover:bg-white/10 hover:translate-x-1 transition-all duration-200" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </a>
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

    <div class="transition-transform duration-300 ease-in-out content-wrapper" id="contentWrapper">
        <header>
            <button class="hamburger fixed top-4 left-4 text-blue-900 text-3xl p-8 z-60" id="hamburgerBtn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="max-w-[1000px] mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="PPDB Logo" class="h-20 w-20">
                </div>
                <div class="flex flex-row">
                    <img src="{{ asset('assets/images/dinasPendLogo2.png') }}" alt="PPDB Logo" class="h-32 w-40">
                </div>
            </div>
            <div class="max-w-[1000px] mx-auto">
                <div class="mx-auto bg-blue-900 text-white w-[1000px] h-12 text-center text-xl flex items-center overflow-hidden">
                    <div class="marquee">
                        Laporkan segala bentuk kecurangan pada Panitia PPDB melalui email atau helpdesk
                    </div>
                </div>
                @yield('carousel')
            </div>
        </header>

        <main class="max-w-[1000px] mx-auto mt-8">
            @yield('content')
        </main>

        <div class="w-full">
            @yield('content2')
        </div>

        <footer class="bg-blue-900 text-white mt-8 py-6">
            <div class="max-w-5xl mx-auto px-4 text-center">
                <p>© 2025 PPDB SMP Perintis Depok - Penerimaan Peserta Didik Baru. All rights reserved.</p>
                <div class="mt-4 flex justify-center gap-4">
                    <a href="#" class="text-white hover:text-sky-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white hover:text-sky-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white hover:text-sky-300"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/@glidejs/glide@3.6.0/dist/glide.min.js"></script>
    <script>
        new Glide('.glide', {
            type: 'carousel',
            perView: 1,
            autoplay: 5000,
            hoverpause: false,
            animationDuration: 800
        }).mount();

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
        } else {
            if (!sidebar) console.error('Sidebar element not found');
            if (!hamburgerBtn) console.error('Hamburger button not found');
            if (!closeBtn) console.error('Close button not found');
            if (!contentWrapper) console.error('Content wrapper not found');
        }

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

        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
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
    @yield('scripts')
</body>
</html>