@extends('layouts.admin')

@section('title', 'Formulir Calon Siswa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Formulir Pendaftaran Calon Siswa</h2>
    
    <form>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="col-span-2">
                <label for="iq" class="block text-sm font-medium text-gray-700 mb-1">Rata-Rata IQ</label>
                <input type="text" id="iq" name="iq" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="col-span-2">
                <label for="parents_income" class="block text-sm font-medium text-gray-700 mb-1">Penghasilan Orang Tua</label>
                <input type="text" id="parents_income" name="parents_income" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="col-span-2">
                <label for="relation" class="block text-sm font-medium text-gray-700 mb-1">Relasi Keluarga</label>
                <input type="text" id="relation" name="relation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="col-span-2">
                <label for="achievement" class="block text-sm font-medium text-gray-700 mb-1">Prestasi Anak</label>
                <input type="text" id="achievement" name="achievement" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Batal
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection