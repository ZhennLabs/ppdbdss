@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Calon Siswa</p>
                <h3 class="text-2xl font-bold">{{ number_format($totalStudents, 0, ',', '.') }}</h3>
            </div>
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Tes IQ Terakhir</p>
                <h3 class="text-2xl font-bold">{{ number_format($avgIqScore, 0, ',', '.') }}</h3>
                <p class="text-sm text-gray-500">Rata-rata</p>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Penghasilan Orang Tua</p>
                <h3 class="text-2xl font-bold">Rp {{ number_format($avgParentIncome, 0, ',', '.') }}</h3>
                <p class="text-sm text-gray-500">Rata-rata</p>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Prestasi Anak</p>
                <h3 class="text-2xl font-bold">{{ number_format($achievementPercentage, 0, ',', '.') }}%</h3>
                <p class="text-sm text-gray-500">Memiliki prestasi</p>
            </div>
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">Hasil Perankingan</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Akhir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($students as $index => $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->result->rank ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($student->result->final_score ?? 0, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->result->class ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if(isset($student->result->is_passed))
                                @if($student->result->is_passed)
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Lulus</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs">Tidak Lulus</span>
                                @endif
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data perankingan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Table: Siswa Lulus --}}
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">Siswa Lulus</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Akhir</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $passedStudents = $students->filter(fn($s) => isset($s->result->is_passed) && $s->result->is_passed);
                @endphp
                @forelse ($passedStudents as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->result->rank ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($student->result->final_score ?? 0, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">Tidak ada siswa yang lulus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Table: Siswa Tidak Lulus --}}
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">Siswa Tidak Lulus</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Akhir</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $notPassedStudents = $students->filter(fn($s) => isset($s->result->is_passed) && !$s->result->is_passed);
                @endphp
                @forelse ($notPassedStudents as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->result->rank ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($student->result->final_score ?? 0, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">Tidak ada siswa yang tidak lulus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection