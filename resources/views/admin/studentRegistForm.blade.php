@extends('layouts.admin')

@section('title', 'Formulir Calon Siswa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Formulir Pendaftaran Calon Siswa</h2>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror" required>
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('nik') border-red-500 @enderror" required>
                @error('nik')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="place_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                <input type="text" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('place_of_birth') border-red-500 @enderror" required>
                @error('place_of_birth')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('date_of_birth') border-red-500 @enderror" required>
                @error('date_of_birth')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select id="gender" name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('gender') border-red-500 @enderror" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea id="address" name="address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('address') border-red-500 @enderror" required>{{ old('address') }}</textarea>
                @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="student_phone" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon Siswa</label>
                <input type="text" id="student_phone" name="student_phone" value="{{ old('student_phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('student_phone') border-red-500 @enderror" required>
                @error('student_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="parent_income" class="block text-sm font-medium text-gray-700 mb-1">Penghasilan Orang Tua</label>
                <input type="number" id="parent_income" name="parent_income" value="{{ old('parent_income') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('parent_income') border-red-500 @enderror" required>
                @error('parent_income')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="family_relation" class="block text-sm font-medium text-gray-700 mb-1">Relasi Keluarga</label>
                <select id="family_relation" name="family_relation" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('family_relation') border-red-500 @enderror" required>
                    <option value="">Pilih Relasi</option>
                    <option value="yes" {{ old('family_relation') == 'yes' ? 'selected' : '' }}>Ya</option>
                    <option value="no" {{ old('family_relation') == 'no' ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('family_relation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="achievement_level" class="block text-sm font-medium text-gray-700 mb-1">Prestasi Anak</label>
                <select id="achievement_level" name="achievement_level" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('achievement_level') border-red-500 @enderror" required>
                    <option value="">Pilih Prestasi</option>
                    <option value="none" {{ old('achievement_level') == 'none' ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="school" {{ old('achievement_level') == 'school' ? 'selected' : '' }}>Sekolah</option>
                    <option value="district" {{ old('achievement_level') == 'district' ? 'selected' : '' }}>Kecamatan</option>
                    <option value="city" {{ old('achievement_level') == 'city' ? 'selected' : '' }}>Kota</option>
                    <option value="province" {{ old('achievement_level') == 'province' ? 'selected' : '' }}>Provinsi</option>
                    <option value="national" {{ old('achievement_level') == 'national' ? 'selected' : '' }}>Nasional</option>
                </select>
                @error('achievement_level')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="iq_score" class="block text-sm font-medium text-gray-700 mb-1">Skor IQ</label>
                <input type="number" id="iq_score" name="iq_score" value="{{ old('iq_score') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('iq_score') border-red-500 @enderror">
                @error('iq_score')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection