<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Kelulusan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html { height: 100%; margin: 0; padding: 0; }
        .bg-gradient-ppdb {
            background: linear-gradient(90deg, #003366 0%, #0077c8 100%);
        }
        .bg-gradient-ppdb-red {
            background: linear-gradient(90deg, #b91c1c 0%, #ef4444 100%);
        }
        .card-shadow {
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .rounded-card {
            border-radius: 24px;
        }
        .font-sans-custom {
            font-family: 'Segoe UI', 'Arial', 'sans-serif';
        }
    </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center font-sans-custom">
    <div class="w-full flex justify-center items-center py-8">
        <div class="w-full max-w-3xl rounded-card card-shadow overflow-hidden">
            <!-- Header -->
            @if(optional($student->result)->is_passed == 0)
            <div class="bg-gradient-ppdb-red px-8 py-5 flex items-center justify-between">
                <div>
                    <h1 class="text-white font-bold text-2xl sm:text-2xl leading-tight tracking-wide mb-1">
                        ANDA DINYATAKAN TIDAK LULUS SELEKSI PPDB SMP {{ date('Y') }}
                    </h1>
                    <div class="text-white text-sm mt-1">
                        Ini bukan akhir dari segalanya, berjuanglah terus menggapai masa depan.
                    </div>
                </div>
                <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="PPDB" class="h-12 sm:h-14">
            </div>
            @else
            <div class="bg-gradient-ppdb px-8 py-5 flex items-center justify-between">
                <h1 class="text-white font-bold text-2xl sm:text-3xl leading-tight tracking-wide">
                    SELAMAT! ANDA DINYATAKAN LULUS SELEKSI PPDB SMP {{ date('Y') }}
                </h1>
                <img src="{{ asset('assets/images/dinasPendLogo.png') }}" alt="PPDB" class="h-12 sm:h-16">
            </div>
            @endif
            <!-- Main Content -->
            <div class="bg-black px-8 py-8 flex flex-row gap-8">
                <!-- Left Info -->
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <div class="text-gray-300 text-xs mb-2 tracking-wider">
                            NOREG {{ $student->registration_number ?? '-' }}
                        </div>
                        <div class="text-3xl sm:text-3xl font-bold mb-1 uppercase tracking-wide leading-tight text-white">
                            {{ strtoupper($student->name ?? 'NAMA SISWA') }}
                        </div>
                        @if(optional($student->result)->is_passed == 1)
                        <div class="text-lg font-semibold mb-1 uppercase tracking-wide text-white"> Rank :
                            {{ strtoupper(optional($student->result)->rank ?? 'RANK') }}
                        </div>
                        <div class="text-lg mb-6 uppercase tracking-wide text-white">
                            SMP Perintis Depok
                        </div>
                        @endif
                        <div class="grid grid-cols-2 gap-x-8 gap-y-2 text-sm mt-6">
                            <div>
                                <div class="text-gray-400 font-semibold">Tanggal Lahir</div>
                                <div class="font-semibold text-white">{{ $student->date_of_birth ?? '-' }}</div>
                            </div>
                            @if(optional($student->result)->is_passed == 1)
                            <div>
                                <div class="text-gray-400 font-semibold">Kelas</div>
                                <div class="font-semibold text-white">{{ $student->result->class ?? '-' }}</div>
                            </div>
                            @endif
                            <div>
                                <div class="text-gray-400 font-semibold">Asal Sekolah</div>
                                <div class="font-semibold text-white">{{ $student->previous_school_name ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="text-gray-400 font-semibold">Skor</div>
                                <div class="font-semibold text-white">{{ optional($student->result)->final_score ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(optional($student->result)->is_passed == 1)
                <!-- Right Info (Lulus only) -->
                <div class="flex flex-col items-center justify-start w-80 pt-2">
                    <div class="bg-white rounded-lg p-2 mb-6">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ $student->registration_number ?? '-' }}" alt="QR Code" class="h-28 w-28 object-contain">
                    </div>
                    <div class="bg-white text-black rounded-lg p-4 w-full text-left text-sm shadow">
                        <div class="font-semibold mb-1">Silakan lakukan daftar ulang.</div>
                        <div class="mb-1 text-xs text-gray-700">Informasi daftar ulang dapat dilihat pada link berikut:</div>
                        <div class="font-bold text-blue-700 break-all text-xs">
                            {{ $student->re_registration_link ?? 'LINK DAFTAR ULANG' }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>