@extends('layouts.admin')

@section('title', 'Formulir Tes IQ')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Form Input Rata-Rata IQ</h1>
<div class="bg-white rounded-lg shadow p-6">        
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <form>
                <div class="mb-6">
                    <label for="iq_score" class="block text-sm font-medium text-gray-700 mb-1">Rata-Rata IQ</label>
                    <input type="number" id="iq_score" name="iq_score" min="40" max="200" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                
                <div class="mb-6">
                    <label for="bobot" class="block text-sm font-medium text-gray-700 mb-1">Bobot</label>
                    <input type="number" id="bobot" name="bobot" min="40" max="200" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                
                <div class="mb-6">
                    <label for="nilai" class="block text-sm font-medium text-gray-700 mb-1">Nilai</label>
                    <input type="number" id="nilai" name="nilai" min="40" max="200" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Simpan Hasil Tes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection