@extends('layouts.admin')

@section('title', 'Master Data')

@section('content')
<div x-data="{ show: null, editId: null }" class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-8">Master Data</h1>
    <div class="grid grid-cols-3 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-3xl mb-2">📋</div>
            <h3 class="text-lg font-bold mb-1">Kelola Kriteria & Bobot</h3>
            <p class="text-gray-600 text-center mb-4">Tambah, edit, atau hapus kriteria dan atur bobotnya sesuai kebutuhan PPDB.</p>
            <button @click="show = 'kriteria'; editId = null" class="mt-auto bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kelola</button>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-3xl mb-2">📝</div>
            <h3 class="text-lg font-bold mb-1">Kelola Nilai</h3>
            <p class="text-gray-600 text-center mb-4">Input dan ubah nilai siswa untuk setiap kriteria yang tersedia.</p>
            <button @click="show = 'nilai'; editId = null" class="mt-auto bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kelola</button>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-3xl mb-2">🎓</div>
            <h3 class="text-lg font-bold mb-1">Kelola Kelulusan</h3>
            <p class="text-gray-600 text-center mb-4">Ubah status kelulusan siswa.</p>
            <button @click="show = 'kelulusan'; editId = null" class="mt-auto bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kelola</button>
        </div>
    </div>

    <div x-show="show === 'kriteria'" class="mb-8" style="display: none;">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kelola Kriteria & Bobot</h2>
            <button @click="show = null; editId = null" class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400">Tutup</button>
        </div>
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Tambah Kriteria</h2>
            <form action="{{ route('criteria.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center mb-4">
                @csrf
                <input type="text" name="name" placeholder="Nama Kriteria" class="border rounded px-3 py-2 w-full md:w-1/2" required>
                <input type="number" name="weight" placeholder="Bobot" class="border rounded px-3 py-2 w-full md:w-1/4" step="0.01" min="0" required>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
            </form>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Tabel Kriteria & Bobot</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kriteria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bobot</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($criteria as $c)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $c->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $c->weight }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                <button @click="editId = 'kriteria-{{ $c->id }}'" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</button>
                                <form action="{{ route('criteria.destroy', $c) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr x-show="editId === 'kriteria-{{ $c->id }}'" style="display: none;">
                            <td colspan="3" class="bg-gray-50 px-6 py-4">
                                <form action="{{ route('criteria.update', $c) }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $c->name }}" class="border rounded px-3 py-2" required>
                                    <input type="number" name="weight" value="{{ $c->weight }}" class="border rounded px-3 py-2" step="0.01" min="0" required>
                                    <div class="flex gap-2">
                                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
                                        <button type="button" @click="editId = null" class="px-4 py-2 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">Batal</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">Belum ada kriteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div x-show="show === 'nilai'" class="mb-8" style="display: none;">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kelola Nilai</h2>
            <button @click="show = null; editId = null" class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400">Tutup</button>
        </div>
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Tambah Nilai</h2>
            <form action="{{ route('scores.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center mb-4">
                @csrf
                <select name="student_id" class="border rounded px-3 py-2 w-full md:w-1/3" required>
                    <option value="">Pilih Siswa</option>
                    @foreach($students as $student)
    <option value="{{ $student->id }}">{{ $student->name }}</option>
@endforeach
                </select>
                <select name="criterion_id" class="border rounded px-3 py-2 w-full md:w-1/3" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach($criteria as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
                <input type="number" name="value" placeholder="Nilai" class="border rounded px-3 py-2 w-full md:w-1/6" min="0" max="100" required>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
            </form>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Tabel Nilai</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kriteria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($scores as $s)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s->student->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s->criterion->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s->value }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                <button @click="editId = 'nilai-{{ $s->id }}'" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</button>
                                <form action="{{ route('scores.destroy', $s) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr x-show="editId === 'nilai-{{ $s->id }}'" style="display: none;">
                            <td colspan="4" class="bg-gray-50 px-6 py-4">
                                <form action="{{ route('scores.update', $s) }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
                                    @csrf
                                    @method('PUT')
                                    <select name="student_id" class="border rounded px-3 py-2" required>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}" @if($student->id == $s->student_id) selected @endif>{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="criterion_id" class="border rounded px-3 py-2" required>
                                        @foreach($criteria as $c)
                                            <option value="{{ $c->id }}" @if($c->id == $s->criterion_id) selected @endif>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="value" value="{{ $s->value }}" class="border rounded px-3 py-2" min="0" max="100" required>
                                    <div class="flex gap-2">
                                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
                                        <button type="button" @click="editId = null" class="px-4 py-2 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">Batal</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">Belum ada nilai.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div x-show="show === 'kelulusan'" class="mb-8" style="display: none;">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kelola Kelulusan</h2>
            <button @click="show = null; editId = null" class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400">Tutup</button>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Tabel Kelulusan</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kriteria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Kelulusan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if(!empty($students))
                            @foreach($students as $student)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach($student->criteria as $criterion)
                                        <div>{{ $criterion->name }}</div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach($student->scores as $score)
                                        <div>{{ $score->value }}</div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($student->result)

                                    <form action="{{ route('admin.result.updateStatus', $student->result->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="is_passed" class="border rounded px-2 py-1">
                                                <option value="1" {{ $student->result->is_passed ? 'selected' : '' }}>Lulus</option>
                                                <option value="0" {{ !$student->result->is_passed ? 'selected' : '' }}>Tidak Lulus</option>
                                            </select>
                                            <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded">Simpan</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400">Belum ada hasil</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                    <form action="{{ route('scores.destroy', $s) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <tr x-show="editId === 'kelulusan-{{ $student->id }}'" style="display: none;">
                                <td colspan="5" class="bg-gray-50 px-6 py-4">
                                    <form action="{{ route('scores.update', $s) }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
                                        @csrf
                                        @method('PUT')
                                        <select name="student_id" class="border rounded px-3 py-2" required>
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" @if($student->id == $s->student_id) selected @endif>{{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                        <select name="criterion_id" class="border rounded px-3 py-2" required>
                                            @foreach($criteria as $c)
                                                <option value="{{ $c->id }}" @if($c->id == $s->criterion_id) selected @endif>{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="value" value="{{ $s->value }}" class="border rounded px-3 py-2" min="0" max="100" required>
                                        <div class="flex gap-2">
                                            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
                                            <button type="button" @click="editId = null" class="px-4 py-2 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">Batal</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4">Tidak ada data siswa.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
@endsection