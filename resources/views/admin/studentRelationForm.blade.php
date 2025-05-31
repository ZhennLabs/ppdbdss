@extends('layouts.admin')

@section('title', 'Students Relation')

@section('content')

    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Form Input -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-xl shadow">
            <form action="" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="relation_status" class="block font-medium text-gray-700 mb-1">Relation Status</label>
                    <select name="relation_status" id="relation_status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="yes">Ada</option>
                        <option value="none">Tidak Ada</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="bobot" class="block font-medium text-gray-700 mb-1">Bobot</label>
                    <input type="number" name="bobot" id="bobot" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="nilai" class="block font-medium text-gray-700 mb-1">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Dummy Tabel -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Data Relasi</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Relation Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nilai</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Ada</td>
                        <td class="px-4 py-2">100</td>
                        <td class="px-4 py-2">
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Tidak Ada</td>
                        <td class="px-4 py-2">0</td>
                        <td class="px-4 py-2">
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
