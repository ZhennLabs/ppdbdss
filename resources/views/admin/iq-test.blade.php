@extends('layouts.admin')

@section('title', 'IQ Test Data')

@section('content')

    <div class="flex flex-row gap-6">
        {{-- Form Input --}}
        <div class="bg-white rounded-lg shadow p-6 w-[40%]">
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
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel Data --}}
        <div class="bg-white rounded-lg shadow p-6 w-[60%]">
            <h2 class="text-xl font-semibold mb-4">Average IQ Data</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">#</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Rata-Rata IQ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nilai</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Contoh data statis --}}
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900">1</td>
                            <td class="px-4 py-2 text-sm text-gray-900">110</td>
                            <td class="px-4 py-2 text-sm text-gray-900">75</td>
                            <td class="px-4 py-2 text-sm">
                                <form method="POST" action="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        {{-- Tambah data dinamis di sini --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
