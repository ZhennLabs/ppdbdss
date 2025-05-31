@extends('layouts.admin')

@section('title', 'Parents Income')

@section('content')

    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Form -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-xl shadow">
            <form action="" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="parents_income" class="block font-medium text-gray-700 mb-1">Range Income</label>
                    <input type="text" name="parents_income" id="parents_income" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="cth: < 1.000.000">
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

        <!-- Tabel -->
        <div class="w-full lg:w-full bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Student's Parents Income</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Income</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nilai</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- @foreach ($penghasilanData as $item) --}}
                    <tr>
                        <td class="px-4 py-2">{{-- $loop->iteration --}}1</td>
                        <td class="px-4 py-2">{{-- $item->parents_income --}}1-3jt</td>
                        <td class="px-4 py-2">{{-- $item->nilai --}}100</td>
                        <td class="px-4 py-2">
                            <form action="" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                {{-- @csrf
                                @method('DELETE') --}}
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    {{-- @endforeach --}}

                    {{-- @if ($penghasilanData->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">Belum ada data.</td>
                    </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
