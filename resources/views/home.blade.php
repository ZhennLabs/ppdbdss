@extends('layouts.app')

@section('title', 'Beranda')

@section('carousel')
    <div class="relative z-10 flex flex-col items-center text-center mt-4">
        <div class="glide max-w-[1000px] w-full relative">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <img src="{{ asset('assets/images/bg03.png') }}" alt="Illustration 1" class="w-full h-[360px] object-cover">
                    </li>
                    <li class="glide__slide">
                        <img src="{{ asset('assets/images/bg01.png') }}" alt="Illustration 2" class="w-full h-[360px] object-cover">
                    </li>
                    <li class="glide__slide">
                        <img src="{{ asset('assets/images/bg02.jpg') }}" alt="Illustration 3" class="w-full h-[360px] object-cover">
                    </li>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left w-12 h-12 flex items-center justify-center" data-glide-dir="<">
                    <i class="fas fa-chevron-left text-black"></i>
                </button>
                <button class="glide__arrow glide__arrow--right w-12 h-12 flex items-center justify-center" data-glide-dir=">">
                    <i class="fas fa-chevron-right text-black"></i>
                </button>
            </div>
            <div class="glide__bullets flex justify-center gap-2 mt-4" data-glide-el="controls[nav]">
                <button class="glide__bullet w-3 h-3 bg-gray-300 rounded-full data-[active]:bg-gray-600" data-glide-dir="0"></button>
                <button class="glide__bullet w-3 h-3 bg-gray-300 rounded-full data-[active]:bg-gray-600" data-glide-dir="1"></button>
                <button class="glide__bullet w-3 h-3 bg-gray-300 rounded-full data-[active]:bg-gray-600" data-glide-dir="2"></button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Selamat Datang di PPDB SMP Perintis Depok</h2>
    <p class="text-gray-700 mb-6">Penerimaan Peserta Didik Baru (PPDB) adalah platform resmi untuk pendaftaran siswa baru SMP Perintis Depok. Pastikan Anda mengikuti langkah-langkah berikut untuk mendaftar:</p>
    <ul class="list-disc list-inside mb-6 text-gray-700">
        <li>Siapkan dokumen yang diperlukan seperti akta kelahiran, kartu keluarga, dan raport.</li>
        <li>Isi formulir pendaftaran melalui menu di sisi kiri.</li>
        <li>Lakukan verifikasi dokumen di sekolah tujuan.</li>
        <li>Ikuti seleksi sesuai jalur pendaftaran (zonasi, prestasi, atau afirmasi).</li>
    </ul>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-blue-900">Jadwal PPDB SMP</h3>
            <p class="text-gray-700 mt-2">Tanggal: 15-30 Juni 2025</p>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-blue-900">Kontak Bantuan</h3>
            <p class="text-gray-700 mt-2">Email: helpdesk@ppdb.go.id</p>
        </div>
    </div>
@endsection