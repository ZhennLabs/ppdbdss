<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Criterion;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = Score::with(['student', 'criterion'])->get();
        return view('admin.master-data', compact('scores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'criterion_id' => 'required|exists:criteria,id',
            'value' => 'required|numeric|min:0|max:100',
        ]);

        Score::updateOrCreate(
            [
                'student_id' => $validated['student_id'],
                'criterion_id' => $validated['criterion_id'],
            ],
            [
                'value' => $validated['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Nilai berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        $students = Student::all();
        $criteria = Criterion::all();
        return view('admin.master-data', compact('score', 'students', 'criteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'criterion_id' => 'required|exists:criteria,id',
            'value' => 'required|numeric|min:0|max:100',
        ]);

        $score->update($validated);

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        $score->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus');
    }
}
