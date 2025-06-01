<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        // Siswa 1: John Doe (Skor Tinggi)
        $studentId1 = DB::table('students')->insertGetId([
            'name' => 'John Doe',
            'place_of_birth' => 'Surabaya',
            'date_of_birth' => '2015-05-10',
            'gender' => 'male',
            'address' => 'Jl. Example No. 123, Surabaya',
            'nik' => '1234567890123456',
            'father_name' => 'James Doe',
            'mother_name' => 'Jane Doe',
            'parent_phone' => '081234567890',
            'parent_address' => 'Jl. Example No. 123, Surabaya',
            'previous_school_name' => 'TK Budi Mulia',
            'graduation_year' => 2020,
            'student_phone' => null,
            'special_notes' => 'Has asthma, requires inhaler',
            'iq_score' => 135,
            'parent_income' => 4500000,
            'family_relation' => 'yes',
            'achievement_level' => 'district',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Siswa 2: Jane Smith (Skor Menengah)
        $studentId2 = DB::table('students')->insertGetId([
            'name' => 'Jane Smith',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '2015-08-15',
            'gender' => 'female',
            'address' => 'Jl. Contoh No. 456, Jakarta',
            'nik' => '9876543210987654',
            'father_name' => 'Robert Smith',
            'mother_name' => 'Mary Smith',
            'parent_phone' => '082345678901',
            'parent_address' => 'Jl. Contoh No. 456, Jakarta',
            'previous_school_name' => 'TK Nusantara',
            'graduation_year' => 2020,
            'student_phone' => null,
            'special_notes' => null,
            'iq_score' => 115,
            'parent_income' => 2500000,
            'family_relation' => 'no',
            'achievement_level' => 'school',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Siswa 3: Alex Tan (Skor Rendah)
        $studentId3 = DB::table('students')->insertGetId([
            'name' => 'Alex Tan',
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '2015-03-22',
            'gender' => 'male',
            'address' => 'Jl. Sample No. 789, Bandung',
            'nik' => '4567891234567890',
            'father_name' => 'David Tan',
            'mother_name' => 'Linda Tan',
            'parent_phone' => '083456789012',
            'parent_address' => 'Jl. Sample No. 789, Bandung',
            'previous_school_name' => 'TK Harapan',
            'graduation_year' => 2020,
            'student_phone' => null,
            'special_notes' => 'Allergic to peanuts',
            'iq_score' => 105,
            'parent_income' => 1500000,
            'family_relation' => 'no',
            'achievement_level' => 'none',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Dokumen untuk masing-masing siswa
        $students = [$studentId1, $studentId2, $studentId3];
        foreach ($students as $studentId) {
            DB::table('documents')->insert([
                [
                    'student_id' => $studentId,
                    'document_type' => 'birth_certificate',
                    'file_path' => 'uploads/students/' . $studentId . '/birth_certificate.pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'student_id' => $studentId,
                    'document_type' => 'family_card',
                    'file_path' => 'uploads/students/' . $studentId . '/family_card.pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'student_id' => $studentId,
                    'document_type' => 'photo',
                    'file_path' => 'uploads/students/' . $studentId . '/photo.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}