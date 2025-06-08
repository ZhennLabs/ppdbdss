<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
        $this->middleware('role:user')->only(['create', 'store']);
    }

    public function create()
    {
        $alreadyRegistered = Student::where('user_id', Auth::id())->exists();
        return view('students.create', compact('alreadyRegistered'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string',
            'nik' => 'nullable|string|size:16',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:15',
            'parent_address' => 'nullable|string',
            'previous_school_name' => 'nullable|string|max:255',
            'graduation_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'student_phone' => 'nullable|string|max:15',
            'special_notes' => 'nullable|string',
            'iq_score' => 'nullable|integer|min:0',
            'parent_income' => 'nullable|integer|min:0',
            'family_relation' => 'nullable|in:yes,no',
            'achievement_level' => 'nullable|in:none,school,district,city,province,national',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'family_card' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'photo' => 'nullable|file|mimes:jpg,png|max:2048',
        ]);

        $student = Student::create(array_merge(
            $validated,
            [
                'user_id' => Auth::id(),
                'registration_number' => Student::generateRegistrationNumber(),
            ]
        ));

        $documents = [
            'birth_certificate' => 'birth_certificate',
            'family_card' => 'family_card',
            'photo' => 'photo',
        ];

        foreach ($documents as $field => $type) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('documents', 'public');
                Document::create([
                    'student_id' => $student->id,
                    'document_type' => $type,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('students.create')
            ->with('registration_number', $student->registration_number);
    }

    public function registrationSuccess()
    {
        $registrationNumber = session('registration_number');
        if (!$registrationNumber) {
            return redirect()->route('home');
        }
        return view('students.registration-success', compact('registrationNumber'));
    }

    public function downloadPdf(\App\Models\Student $student)
    {
        // Optional: Only allow the owner to download their PDF
        if ($student->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $pdf = Pdf::loadView('students.pdf', compact('student'));
        return $pdf->download('bukti-pendaftaran-'.$student->registration_number.'.pdf');
    }
}