@extends('layouts.app')

@section('content2')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-bold mb-4">Pendaftaran Berhasil!</h2>
            <p class="mb-2">Nomor Pendaftaran Anda:</p>
            <div class="text-3xl font-mono font-bold text-indigo-600 mb-4">{{ $registrationNumber }}</div>
            <p class="mb-4">Simpan nomor pendaftaran ini untuk keperluan verifikasi dan informasi selanjutnya.</p>
            <a href="{{ route('home') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 mb-6">Kembali ke Beranda</a>
            <div class="mt-8 border-t pt-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Butuh Bantuan?</h3>
                <p class="text-gray-600 mb-1">Silakan hubungi kontak panitia PPDB:</p>
                <div class="flex flex-col items-center space-y-1">
                    <span class="text-blue-700 font-medium"><i class="fas fa-phone-alt mr-2"></i>0812-3456-7890</span>
                    <span class="text-blue-700 font-medium"><i class="fas fa-envelope mr-2"></i>ppdb@example.com</span>
                </div>
            </div>
        </div>
    </div>
@endsection