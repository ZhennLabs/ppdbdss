<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran PPDB SMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
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

        <!-- Header dengan Logo, Judul, dan Subjudul -->
        <header class="max-w-4xl mx-auto px-4 py-6 flex flex-col items-center">
            <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="Dinas Pendidikan Logo" class="h-16 w-16 mb-4">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-blue-900">Form Pendaftaran PPDB SMA</h1>
                <p class="text-gray-600 mt-2">Isi data dengan lengkap untuk proses pendaftaran siswa baru</p>
            </div>
        </header>

        <div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($alreadyRegistered)
                @php
                    $student = \App\Models\Student::where('user_id', auth()->id())->first();
                @endphp
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-6 text-center">
                    <div>
                        <span class="font-semibold block mb-2">Anda sudah melakukan pendaftaran. Anda tidak dapat mengisi form lagi.</span>
                        @if($student && $student->registration_number)
                            <div class="mt-4">
                                <span class="font-semibold">Nomor Pendaftaran Anda:</span>
                                <span class="text-xl font-mono text-blue-700">{{ $student->registration_number }}</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-700">
                                Simpan nomor pendaftaran ini untuk keperluan verifikasi dan informasi selanjutnya.
                            </div>
                        @else
                            <div class="mt-2 text-sm text-red-700">
                                Nomor pendaftaran belum tersedia. Silakan hubungi admin.
                            </div>
                        @endif
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('students.pdf', $student->id) }}" target="_blank"
                           class="inline-block px-6 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                            Download Bukti Pendaftaran (PDF)
                        </a>
                    </div>
                    <div class="mt-8 border-t pt-4">
                        <h3 class="text-lg font-semibold mb-2 text-gray-700">Butuh Bantuan?</h3>
                        <p class="text-gray-600 mb-1">Silakan hubungi kontak panitia PPDB:</p>
                        <div class="flex flex-col items-center space-y-1">
                            <span class="text-blue-700 font-medium"><i class="fas fa-phone-alt mr-2"></i>0812-3456-7890</span>
                            <span class="text-blue-700 font-medium"><i class="fas fa-envelope mr-2"></i>ppdb@example.com</span>
                        </div>
                    </div>
                </div>
            @else
                <!-- Progress Bar -->
                <div class="mb-6">
                    <div class="flex items-center justify-between relative">
                        <div class="flex flex-col items-center">
                            <div id="circle1" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-900 font-semibold text-lg border-2 border-blue-900 active-circle">1</div>
                            <span class="text-sm mt-2 text-blue-900">Data Individu</span>
                        </div>
                        <div class="flex-1 h-2 bg-gray-200 mx-2 relative top-[-20px]">
                            <div id="progressBar1" class="h-2 bg-blue-600" style="width: 0%"></div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="circle2" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-500 font-semibold text-lg border-2 border-gray-500">2</div>
                            <span class="text-sm mt-2 text-gray-500">Data Orang Tua</span>
                        </div>
                        <div class="flex-1 h-2 bg-gray-200 mx-2 relative top-[-20px]">
                            <div id="progressBar2" class="h-2 bg-blue-600" style="width: 0%"></div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="circle3" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-500 font-semibold text-lg border-2 border-gray-500">3</div>
                            <span class="text-sm mt-2 text-gray-500">Data Sekolah</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2 text-center">Progres Form : <span id="progressPercentage">0</span>%</p>
                </div>

                <form id="ppdbForm" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="registrationForm">
                    @csrf

                    <!-- Section Content -->
                    <div class="section-content">
                        <!-- Section 1: Data Individu -->
                        <div id="section1" class="section-pane">
                            <h2 class="text-xl font-semibold text-blue-900 mb-4">Data Individu</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-base font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('name') border-red-500 @enderror" required>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="nik" class="block text-base font-medium text-gray-700">NIK <span class="text-red-500">*</span></label>
                                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('nik') border-red-500 @enderror" required>
                                    @error('nik')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="place_of_birth" class="block text-base font-medium text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                                    <input type="text" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('place_of_birth') border-red-500 @enderror" required>
                                    @error('place_of_birth')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="date_of_birth" class="block text-base font-medium text-gray-700">Tanggal Lahir <span class="text-red-500">*</span></label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('date_of_birth') border-red-500 @enderror" required>
                                    @error('date_of_birth')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="gender" class="block text-base font-medium text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                                    <select name="gender" id="gender" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('gender') border-red-500 @enderror" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="address" class="block text-base font-medium text-gray-700">Alamat <span class="text-red-500">*</span></label>
                                    <textarea name="address" id="address" rows="4" class="mt-1 block w-full text-base p-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('address') border-red-500 @enderror" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="student_phone" class="block text-base font-medium text-gray-700">Nomor Telepon Siswa <span class="text-red-500">*</span></label>
                                    <input type="text" name="student_phone" id="student_phone" value="{{ old('student_phone') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('student_phone') border-red-500 @enderror" required>
                                    @error('student_phone')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" onclick="resetSection('section1')">Reset</button>
                                <button type="button" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700" onclick="saveSection('section1')">Simpan</button>
                                <button type="button" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700" onclick="nextSection(2)">Lanjut</button>
                            </div>
                        </div>

                        <!-- Section 2: Data Orang Tua -->
                        <div id="section2" class="section-pane hidden">
                            <h2 class="text-xl font-semibold text-blue-900 mb-4">Data Orang Tua</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="father_name" class="block text-base font-medium text-gray-700">Nama Ayah <span class="text-red-500">*</span></label>
                                    <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('father_name') border-red-500 @enderror" required>
                                    @error('father_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="mother_name" class="block text-base font-medium text-gray-700">Nama Ibu <span class="text-red-500">*</span></label>
                                    <input type="text" name="mother_name" id="mother_name" value="{{ old('mother_name') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('mother_name') border-red-500 @enderror" required>
                                    @error('mother_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="parent_phone" class="block text-base font-medium text-gray-700">Nomor Telepon Orang Tua <span class="text-red-500">*</span></label>
                                    <input type="text" name="parent_phone" id="parent_phone" value="{{ old('parent_phone') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('parent_phone') border-red-500 @enderror" required>
                                    @error('parent_phone')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="parent_address" class="block text-base font-medium text-gray-700">Alamat Orang Tua <span class="text-red-500">*</span></label>
                                    <textarea name="parent_address" id="parent_address" rows="4" class="mt-1 block w-full text-base p-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('parent_address') border-red-500 @enderror" required>{{ old('parent_address') }}</textarea>
                                    @error('parent_address')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="parent_income" class="block text-base font-medium text-gray-700">Pendapatan Orang Tua (per bulan) <span class="text-red-500">*</span></label>
                                    <input type="number" name="parent_income" id="parent_income" value="{{ old('parent_income') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('parent_income') border-red-500 @enderror" required>
                                    @error('parent_income')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="family_relation" class="block text-base font-medium text-gray-700">Hubungan Keluarga dengan Siswa Lain <span class="text-red-500">*</span></label>
                                    <select name="family_relation" id="family_relation" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('family_relation') border-red-500 @enderror" required>
                                        <option value="">Pilih Hubungan</option>
                                        <option value="yes" {{ old('family_relation') == 'yes' ? 'selected' : '' }}>Ya</option>
                                        <option value="no" {{ old('family_relation') == 'no' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                    @error('family_relation')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" onclick="previousSection(1)">Kembali</button>
                                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" onclick="resetSection('section2')">Reset</button>
                                <button type="button" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700" onclick="saveSection('section2')">Simpan</button>
                                <button type="button" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700" onclick="nextSection(3)">Lanjut</button>
                            </div>
                        </div>

                        <!-- Section 3: Data Sekolah dan Upload Dokumen -->
                        <div id="section3" class="section-pane hidden">
                            <h2 class="text-xl font-semibold text-blue-900 mb-4">Data Sekolah</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="previous_school_name" class="block text-base font-medium text-gray-700">Nama Sekolah Sebelumnya <span class="text-red-500">*</span></label>
                                    <input type="text" name="previous_school_name" id="previous_school_name" value="{{ old('previous_school_name') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('previous_school_name') border-red-500 @enderror" required>
                                    @error('previous_school_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="graduation_year" class="block text-base font-medium text-gray-700">Tahun Lulus <span class="text-red-500">*</span></label>
                                    <input type="number" name="graduation_year" id="graduation_year" value="{{ old('graduation_year') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('graduation_year') border-red-500 @enderror" required>
                                    @error('graduation_year')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="achievement_level" class="block text-base font-medium text-gray-700">Tingkat Prestasi <span class="text-red-500">*</span></label>
                                    <select name="achievement_level" id="achievement_level" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('achievement_level') border-red-500 @enderror" required>
                                        <option value="">Pilih Tingkat Prestasi</option>
                                        <option value="none" {{ old('achievement_level') == 'none' ? 'selected' : '' }}>Tidak Ada</option>
                                        <option value="school" {{ old('achievement_level') == 'school' ? 'selected' : '' }}>Sekolah</option>
                                        <option value="district" {{ old('achievement_level') == 'district' ? 'selected' : '' }}>Kecamatan</option>
                                        <option value="city" {{ old('achievement_level') == 'city' ? 'selected' : '' }}>Kota</option>
                                        <option value="province" {{ old('achievement_level') == 'province' ? 'selected' : '' }}>Provinsi</option>
                                        <option value="national" {{ old('achievement_level') == 'national' ? 'selected' : '' }}>Nasional</option>
                                    </select>
                                    @error('achievement_level')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="iq_score" class="block text-base font-medium text-gray-700">Skor IQ (opsional)</label>
                                    <input type="number" name="iq_score" id="iq_score" value="{{ old('iq_score') }}" class="mt-1 block w-full h-12 text-base py-3 px-4 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('iq_score') border-red-500 @enderror">
                                    @error('iq_score')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="special_notes" class="block text-base font-medium text-gray-700">Catatan Khusus</label>
                                    <textarea name="special_notes" id="special_notes" rows="4" class="mt-1 block w-full text-base p-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-gray-400 @error('special_notes') border-red-500 @enderror">{{ old('special_notes') }}</textarea>
                                    @error('special_notes')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <h2 class="text-xl font-semibold text-blue-900 mt-6 mb-4">Upload Dokumen</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="birth_certificate" class="block text-base font-medium text-gray-700">Akta Kelahiran <span class="text-red-500">*</span></label>
                                    <input type="file" name="birth_certificate" id="birth_certificate" class="mt-1 block w-full text-base text-gray-500 file:mr-4 file:py-3 file:px-5 file:rounded-md file:border-0 file:text-base file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 outline-gray-400 @error('birth_certificate') border-red-500 @enderror" required>
                                    @error('birth_certificate')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="family_card" class="block text-base font-medium text-gray-700">Kartu Keluarga <span class="text-red-500">*</span></label>
                                    <input type="file" name="family_card" id="family_card" class="mt-1 block w-full text-base text-gray-500 file:mr-4 file:py-3 file:px-5 file:rounded-md file:border-0 file:text-base file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 outline-gray-400 @error('family_card') border-red-500 @enderror" required>
                                    @error('family_card')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="photo" class="block text-base font-medium text-gray-700">Foto <span class="text-red-500">*</span></label>
                                    <input type="file" name="photo" id="photo" class="mt-1 block w-full text-base text-gray-500 file:mr-4 file:py-3 file:px-5 file:rounded-md file:border-0 file:text-base file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 outline-gray-400 @error('photo') border-red-500 @enderror" required>
                                    @error('photo')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" onclick="previousSection(2)">Kembali</button>
                                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" onclick="resetSection('section3')">Reset</button>
                                <button type="button" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700" onclick="saveSection('section3')">Simpan</button>
                            </div>
                        </div>
                    </div>

                    <div id="submitButton" class="mt-6 hidden">
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Daftar
                        </button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Footer -->
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
        } else {
            if (!sidebar) console.error('Sidebar element not found');
            if (!hamburgerBtn) console.error('Hamburger button not found');
            if (!closeBtn) console.error('Close button not found');
            if (!contentWrapper) console.error('Content wrapper not found');
        }

        // Progress Bar Logic
        const form = document.getElementById('registrationForm');
        const progressBar1 = document.getElementById('progressBar1');
        const progressBar2 = document.getElementById('progressBar2');
        const progressPercentage = document.getElementById('progressPercentage');
        const submitButton = document.getElementById('submitButton');
        const sections = document.querySelectorAll('.section-pane');
        const circles = [document.getElementById('circle1'), document.getElementById('circle2'), document.getElementById('circle3')];
        const labels = document.querySelectorAll('.flex.items-center.justify-between .flex-col span');

        // Daftar field wajib per section
        const sectionFields = {
            section1: ['name', 'nik', 'place_of_birth', 'date_of_birth', 'gender', 'address', 'student_phone'],
            section2: ['father_name', 'mother_name', 'parent_phone', 'parent_address', 'parent_income', 'family_relation'],
            section3: ['previous_school_name', 'graduation_year', 'achievement_level', 'birth_certificate', 'family_card', 'photo']
        };

        const totalFieldsPerSection = {
            section1: sectionFields.section1.length,
            section2: sectionFields.section2.length,
            section3: sectionFields.section3.length
        };

        const allRequiredFields = [...sectionFields.section1, ...sectionFields.section2, ...sectionFields.section3];
        const totalRequiredFields = allRequiredFields.length;

        let currentSection = 1;

        function updateProgress() {
            const currentSectionId = `section${currentSection}`;
            const currentFields = sectionFields[currentSectionId];
            const totalFields = totalFieldsPerSection[currentSectionId];
            let filledFields = 0;

            currentFields.forEach(field => {
                const input = document.getElementById(field);
                if (input) {
                    if (input.type === 'file') {
                        if (input.files.length > 0) filledFields++;
                    } else if (input.value.trim() !== '') {
                        filledFields++;
                    }
                }
            });

            const percentage = Math.round((filledFields / totalFields) * 100);
            progressPercentage.textContent = percentage;

            // Update progress bar based on current section
            if (currentSection === 1) {
                progressBar1.style.width = `${percentage}%`;
                progressBar2.style.width = '0%';
            } else if (currentSection === 2) {
                progressBar1.style.width = '100%';
                progressBar2.style.width = `${percentage}%`;
            } else if (currentSection === 3) {
                progressBar1.style.width = '100%';
                progressBar2.style.width = `${percentage}%`;
            }

            // Update circle and label styles
            circles.forEach((circle, index) => {
                if (index + 1 === currentSection) {
                    circle.classList.add('w-12', 'h-12', 'text-xl', 'border-4');
                    circle.classList.remove('w-10', 'h-10', 'text-lg', 'border-2');
                    circle.classList.add('bg-blue-100', 'text-blue-900', 'border-blue-900');
                    circle.classList.remove('bg-gray-200', 'text-gray-500', 'border-gray-500');
                    labels[index].classList.add('text-blue-900');
                    labels[index].classList.remove('text-gray-500');
                } else if (index + 1 < currentSection) {
                    circle.classList.remove('w-12', 'h-12', 'text-xl', 'border-4');
                    circle.classList.add('w-10', 'h-10', 'text-lg', 'border-2');
                    circle.classList.add('bg-blue-100', 'text-blue-900', 'border-blue-900');
                    circle.classList.remove('bg-gray-200', 'text-gray-500', 'border-gray-500');
                    labels[index].classList.add('text-blue-900');
                    labels[index].classList.remove('text-gray-500');
                } else {
                    circle.classList.remove('w-12', 'h-12', 'text-xl', 'border-4');
                    circle.classList.add('w-10', 'h-10', 'text-lg', 'border-2');
                    circle.classList.remove('bg-blue-100', 'text-blue-900', 'border-blue-900');
                    circle.classList.add('bg-gray-200', 'text-gray-500', 'border-gray-500');
                    labels[index].classList.remove('text-blue-900');
                    labels[index].classList.add('text-gray-500');
                }
            });

            // Check if all required fields are filled for submit button
            let allFilled = true;
            allRequiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (input) {
                    if (input.type === 'file') {
                        if (input.files.length === 0) allFilled = false;
                    } else if (input.value.trim() === '') {
                        allFilled = false;
                    }
                }
            });

            if (allFilled) {
                submitButton.classList.remove('hidden');
            } else {
                submitButton.classList.add('hidden');
            }
        }

        // Update progress on input change
        form.querySelectorAll('input, select, textarea').forEach(input => {
            input.addEventListener('input', updateProgress);
            input.addEventListener('change', updateProgress);
        });

        // Section Navigation
        function nextSection(sectionNumber) {
            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(`section${sectionNumber}`).classList.remove('hidden');
            currentSection = sectionNumber;
            updateProgress();
        }

        function previousSection(sectionNumber) {
            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(`section${sectionNumber}`).classList.remove('hidden');
            currentSection = sectionNumber;
            updateProgress();
        }

        // Save Section Data to Local Storage
        function saveSection(sectionId) {
            const section = document.getElementById(sectionId);
            const inputs = section.querySelectorAll('input, select, textarea');
            const sectionData = {};

            inputs.forEach(input => {
                if (input.type === 'file') {
                    sectionData[input.id] = input.files.length > 0 ? input.files[0].name : '';
                } else {
                    sectionData[input.id] = input.value;
                }
            });

            const userId = "{{ auth()->id() }}";
            const sectionKey = (sectionId) => `${sectionId}_user_${userId}`;

            localStorage.setItem(sectionKey(sectionId), JSON.stringify(sectionData));
            alert('Data section disimpan!');
            updateProgress();
        }

        // Reset Section
        function resetSection(sectionId) {
            const section = document.getElementById(sectionId);
            const inputs = section.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                if (input.type === 'file') {
                    input.value = '';
                } else {
                    input.value = '';
                }
            });

            const userId = "{{ auth()->id() }}";
            const sectionKey = (sectionId) => `${sectionId}_user_${userId}`;

            localStorage.removeItem(sectionKey(sectionId));
            updateProgress();
        }

        // Load Saved Data on Page Load
        window.addEventListener('load', () => {
            sections.forEach(section => {
                const sectionId = section.id;
                const userId = "{{ auth()->id() }}";
                const sectionKey = (sectionId) => `${sectionId}_user_${userId}`;
                const savedData = localStorage.getItem(sectionKey);

                if (savedData) {
                    const sectionData = JSON.parse(savedData);
                    const inputs = section.querySelectorAll('input, select, textarea');

                    inputs.forEach(input => {
                        if (input.type !== 'file' && sectionData[input.id]) {
                            input.value = sectionData[input.id];
                        }
                    });
                }
            });
            updateProgress();
        });

        updateProgress();
    </script>

    <script>
        // Ambil user id dari backend
        const userId = "{{ auth()->id() }}";
        const sectionKey = (sectionId) => `ppdb_section_${sectionId}_user_${userId}`;

        // Fungsi untuk simpan data section ke localStorage
        function saveSection(sectionId) {
            const section = document.getElementById(sectionId);
            const inputs = section.querySelectorAll('input, select, textarea');
            const sectionData = {};

            inputs.forEach(input => {
                if (input.type === 'file') {
                    // File tidak bisa disimpan ke localStorage, hanya nama file saja
                    sectionData[input.id] = input.files.length > 0 ? input.files[0].name : '';
                } else {
                    sectionData[input.id] = input.value;
                }
            });

            localStorage.setItem(sectionKey(sectionId), JSON.stringify(sectionData));
            alert('Data section disimpan!');
        }

        // Fungsi untuk load data section dari localStorage saat halaman dibuka
        function loadSection(sectionId) {
            const section = document.getElementById(sectionId);
            const savedData = localStorage.getItem(sectionKey(sectionId));
            if (savedData) {
                const sectionData = JSON.parse(savedData);
                const inputs = section.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    if (input.type !== 'file' && sectionData[input.id] !== undefined) {
                        input.value = sectionData[input.id];
                    }
                });
            }
        }

        // Fungsi untuk reset section dan hapus dari localStorage
        function resetSection(sectionId) {
            const section = document.getElementById(sectionId);
            const inputs = section.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                if (input.type === 'file') {
                    input.value = '';
                } else {
                    input.value = '';
                }
            });
            localStorage.removeItem(sectionKey(sectionId));
        }

        // Saat halaman dibuka, load semua section
        window.addEventListener('DOMContentLoaded', function() {
            ['section1', 'section2', 'section3'].forEach(loadSection);
        });
    </script>
</body>
</html>