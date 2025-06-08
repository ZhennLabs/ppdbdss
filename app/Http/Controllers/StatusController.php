<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StatusController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'registration_number' => ['required', 'regex:/^\d{4}-\d{4}-\d{4}$/'],
            'born_of_date' => ['required', 'regex:/^\d{4}-\d{2}-\d{2}$/'],
        ]);

        $student = Student::where('registration_number', $request->registration_number)
            ->where('date_of_birth', $request->born_of_date)
            ->first();

        if (!$student) {
            return back()->with('error', 'Data tidak ditemukan. Pastikan nomor pendaftaran dan tanggal lahir benar.');
        }

        return view('students.status-result', compact('student'));
    }
}