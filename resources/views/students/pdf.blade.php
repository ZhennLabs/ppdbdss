<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f6fa;
            color: #22223b;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(34,34,59,0.08);
            padding: 32px 36px 36px 36px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            width: 70px;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0 0 8px 0;
            color: #2a4365;
            font-size: 1.6em;
            letter-spacing: 1px;
        }
        .reg-number {
            background: #e0e7ff;
            color: #3730a3;
            display: inline-block;
            font-size: 1.3em;
            font-weight: bold;
            padding: 8px 18px;
            border-radius: 8px;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            margin-bottom: 24px;
        }
        .info-table td {
            padding: 8px 6px;
            font-size: 1em;
            vertical-align: top;
        }
        .info-table tr:nth-child(even) {
            background: #f1f5f9;
        }
        .label {
            color: #4b5563;
            font-weight: 600;
            width: 180px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #64748b;
            font-size: 1em;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
            color: #22223b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/images/dinasPendLogo.png') }}" alt="Logo" style="width:70px; margin-bottom:10px;">
            <h2>Bukti Pendaftaran PPDB SMA</h2>
            <div class="reg-number">
                {{ $student->registration_number }}
            </div>
            <div style="font-size: 1em; color: #64748b; margin-top: 4px;">
                Tanggal Daftar: {{ \Carbon\Carbon::parse($student->created_at)->format('d-m-Y H:i') }}
            </div>
        </div>
        <table class="info-table">
            <tr>
                <td class="label">Nama</td>
                <td>: {{ $student->name }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td>: {{ $student->nik }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tanggal Lahir</td>
                <td>: {{ $student->place_of_birth }}, {{ $student->date_of_birth }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td>: {{ $student->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td>: {{ $student->address }}</td>
            </tr>
            <tr>
                <td class="label">No. Telepon Siswa</td>
                <td>: {{ $student->student_phone }}</td>
            </tr>
            <tr>
                <td class="label">Asal Sekolah</td>
                <td>: {{ $student->previous_school_name }}</td>
            </tr>
            <tr>
                <td class="label">Tahun Lulus</td>
                <td>: {{ $student->graduation_year }}</td>
            </tr>
            <tr>
                <td class="label">Nama Ayah</td>
                <td>: {{ $student->father_name }}</td>
            </tr>
            <tr>
                <td class="label">Nama Ibu</td>
                <td>: {{ $student->mother_name }}</td>
            </tr>
            <tr>
                <td class="label">No. Telepon Orang Tua</td>
                <td>: {{ $student->parent_phone }}</td>
            </tr>
            <tr>
                <td class="label">Catatan Khusus</td>
                <td>: {{ $student->special_notes }}</td>
            </tr>
        </table>
        <div class="footer">
            Simpan bukti ini untuk keperluan verifikasi dan informasi selanjutnya.<br>
            <span style="font-size:0.95em;">PPDB SMA {{ date('Y') }}</span>
        </div>
        <div class="signature">
            <div>{{ config('app.name', 'PPDB Online') }}</div>
            <div style="margin-top: 40px;">&nbsp;</div>
        </div>
    </div>
</body>
</html>