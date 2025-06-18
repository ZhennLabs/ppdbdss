<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Criterion;
use App\Models\Score;
use App\Models\Result;

class SmartCalculationService
{
    public function calculateScores()
    {
        // 1. Menentukan Alternatif (calon siswa)
        $students = Student::all();

        // 2. Menentukan Kriteria
        $criteria = Criterion::all();

        // 3. Menentukan Bobot Tiap Kriteria (dan normalisasi bobot)
        $totalWeight = $criteria->sum('weight');

        foreach ($students as $student) {
            try {
                $finalScore = 0;

                // 4. Memberikan Nilai pada Setiap Alternatif untuk Setiap Kriteria
                foreach ($criteria as $criterion) {
                    $scoreValue = $this->mapRawDataToScore($student, $criterion);

                    Score::updateOrCreate(
                        [
                            'student_id' => $student->id,
                            'criterion_id' => $criterion->id,
                        ],
                        [
                            'value' => $scoreValue,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );

                    // 5. Normalisasi (jika perlu) & 6. Hitung Nilai Akhir Alternatif
                    $normalizedWeight = $totalWeight > 0 ? $criterion->weight / $totalWeight : 0;
                    $finalScore += $scoreValue * $normalizedWeight;
                }

                // Simpan atau perbarui ke tabel hasil
                $class = $this->determineClass($finalScore);
                $isPassed = in_array($class, ['A', 'B', 'C']); // Only A/B/C is Lulus

                \Log::info("Student: {$student->name}, Score: {$finalScore}, Class: {$class}, is_passed: {$isPassed}");

                Result::updateOrCreate(
                    ['student_id' => $student->id],
                    [
                        'final_score' => $finalScore,
                        'rank' => 0,
                        'class' => $class,
                        'is_passed' => $isPassed ? 1 : 0,
                    ]
                );
            } catch (\Throwable $e) {
                \Log::error("Error calculating for student {$student->name}: " . $e->getMessage());
            }
        }

        // 7. Menentukan Alternatif Terbaik (Ranking)
        $this->assignRanks();
    }

    private function mapRawDataToScore($student, $criterion)
    {
        switch ($criterion->name) {
            case 'Rata-rata Tes IQ':
                if ($student->iq_score >= 140) return 100;
                if ($student->iq_score >= 130) return 80;
                if ($student->iq_score >= 120) return 60;
                if ($student->iq_score >= 110) return 40;
                return 20;

            case 'Penghasilan Orang Tua':
                if ($student->parent_income >= 4000000) return 100;
                if ($student->parent_income >= 3000000) return 80;
                if ($student->parent_income >= 2000) return 60;
                return 40;

            case 'Relasi Keluarga':
                return match ($student->family_relation) {
                    'yes' => 100,
                    'no' => 50,
                    default => 50,
                };

            case 'Prestasi Anak':
                return match ($student->achievement_level) {
                    'national' => 100,
                    'district' => 80,
                    'city', 'province', 'school', 'none' => 60,
                    default => 60,
                };

            default:
                return 0;
        }
    }

    private function determineClass($score)
    {
        if ($score >= 90) return 'A';
        if ($score >= 80) return 'B';
        if ($score >= 70) return 'C';
        return '-';
    }

    private function assignRanks()
    {
        $results = Result::with('student')
            ->orderBy('final_score', 'desc')
            ->get();

        $rank = 1;
        foreach ($results as $index => $result) {
            $previousResult = $index > 0 ? $results[$index - 1] : null;
            if ($previousResult && $previousResult->final_score == $result->final_score) {
                $result->rank = $previousResult->rank;
            } else {
                $result->rank = $rank;
            }
            $result->save();
            $rank++;
        }
    }
}