<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Criterion;
use App\Services\SmartCalculationService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = Student::count();
        $avgIqScore = Student::whereNotNull('iq_score')->avg('iq_score') ?? 0;
        $avgParentIncome = Student::whereNotNull('parent_income')->avg('parent_income') ?? 0;
        $achievementPercentage = Student::whereNotNull('achievement_level')
            ->where('achievement_level', '!=', 'none')
            ->count() / max(1, Student::count()) * 100;

        $service = new SmartCalculationService();
        $service->calculateScores();

        $students = Student::with('result')
            ->whereHas('result')
            ->get()
            ->sortBy([
                fn($a, $b) => $b->result->final_score <=> $a->result->final_score ?: strcmp($a->name, $b->name)
            ])
            ->values();

        $rank = 1;
        foreach ($students as $student) {
            if ($student->result) {
                $student->result->rank = $rank++;
            }
        }

        return view('admin.dashboard', compact('totalStudents', 'avgIqScore', 'avgParentIncome', 'achievementPercentage', 'students'));
    }

    public function studentCreate()
    {
       
    }

    public function studentIndex()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function studentStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:32',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'student_phone' => 'required|string|max:20',
            'parent_income' => 'required|integer|min:0',
            'family_relation' => 'required|in:yes,no',
            'achievement_level' => 'required|in:none,school,district,city,province,national',
            'iq_score' => 'nullable|integer|min:0',
        ]);

        \App\Models\Student::create([
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'place_of_birth' => $validated['place_of_birth'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
            'student_phone' => $validated['student_phone'],
            'parent_income' => $validated['parent_income'],
            'family_relation' => $validated['family_relation'],
            'achievement_level' => $validated['achievement_level'],
            'iq_score' => $validated['iq_score'] ?? null,
            'user_id' => null,
        ]);

        return redirect()->route('students.index')->with('success', 'Calon siswa berhasil didaftarkan.');
    }

    public function studentEdit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.studentRegistForm', compact('student'));
    }

    public function studentUpdate(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'iq' => 'required|integer|min:0',
            'parents_income' => 'required|integer|min:0',
            'relation' => 'required|in:yes,no',
            'achievement' => 'required|in:none,school,district,city,province,national',
        ]);

        $student->update([
            'name' => $validated['name'],
            'iq_score' => $validated['iq'],
            'parent_income' => $validated['parents_income'],
            'family_relation' => $validated['relation'],
            'achievement_level' => $validated['achievement'],
        ]);

        return redirect()->route('students.index')->with('success', 'Calon siswa berhasil diperbarui.');
    }

    public function studentDestroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Calon siswa berhasil dihapus.');
    }

    public function calculateScores()
    {
        $service = new SmartCalculationService();
        $service->calculateScores();
        return redirect()->route('dashboard')->with('success', 'Scores calculated and saved to database.');
    }

    public function masterData()
    {
        $criteria = \App\Models\Criterion::all();
        $scores = \App\Models\Score::with(['student', 'criterion'])->get();
        $students = \App\Models\Student::with(['criteria', 'scores', 'result'])->get();
        return view('admin.master-data', compact('criteria', 'scores', 'students'));
    }

    public function updateResultStatus(Request $request, $id)
    {
        $result = \App\Models\Result::findOrFail($id);
        $result->is_passed = $request->is_passed;
        $result->save();

        return back()->with('success', 'Status kelulusan berhasil diubah.');
    }
}