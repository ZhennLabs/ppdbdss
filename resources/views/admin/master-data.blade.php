@extends('layouts.admin')

@section('title', 'Master Data')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Master Data</h2>
        <div class="flex space-x-3">
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Rata-Rata Tes IQ Card -->
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-3">
                <div class="p-2 bg-blue-100 rounded-full mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium">Rata-Rata Tes IQ</h3>
            </div>
            <p class="text-gray-600 mb-4">Kelola data nilai rata-rata tes IQ calon siswa</p>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Kelola Data →</a>
        </div>

        <!-- Penghasilan Orang Tua Card -->
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-3">
                <div class="p-2 bg-green-100 rounded-full mr-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium">Penghasilan Orang Tua</h3>
            </div>
            <p class="text-gray-600 mb-4">Kelola data penghasilan orang tua calon siswa</p>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Kelola Data →</a>
        </div>

        <!-- Relasi Keluarga Card -->
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-3">
                <div class="p-2 bg-purple-100 rounded-full mr-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium">Relasi Keluarga</h3>
            </div>
            <p class="text-gray-600 mb-4">Kelola data hubungan keluarga calon siswa</p>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Kelola Data →</a>
        </div>

        <!-- Prestasi Anak Card -->
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-3">
                <div class="p-2 bg-yellow-100 rounded-full mr-3">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium">Prestasi Anak</h3>
            </div>
            <p class="text-gray-600 mb-4">Kelola data prestasi yang diraih calon siswa</p>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Kelola Data →</a>
        </div>

        <!-- Kelas Card -->
        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center mb-3">
                <div class="p-2 bg-red-100 rounded-full mr-3">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium">Kelas</h3>
            </div>
            <p class="text-gray-600 mb-4">Kelola data kelas untuk penempatan siswa</p>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Kelola Data →</a>
        </div>
    </div>
</div>
@endsection