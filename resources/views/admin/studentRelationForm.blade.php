@extends('layouts.admin')

@section('title', 'Formulir Relasi Siswa')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Formulir Relasi Siswa</h1>
    <form action="" method="POST" class="bg-white p-6 rounded-xl shadow">
        @csrf

        <div class="mb-4">
            <label for="relation_name" class="block font-medium text-gray-700 mb-1">Status Relasi</label>
            <select name="level" id="level" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" value="yes">Ada</option>
                <option class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" value="none">Tidak Ada</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="bobot" class="block font-medium text-gray-700 mb-1">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="">
        </div>

        <div class="mb-4">
            <label for="nilai" class="block font-medium text-gray-700 mb-1">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
