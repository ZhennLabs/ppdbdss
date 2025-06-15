<?php
namespace App\Http\Controllers;

use App\Models\Criterion;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function masterData()
    {
        $criteria = \App\Models\Criterion::all();
        $scores = \App\Models\Score::with(['student', 'criterion'])->get();
        $students = \App\Models\Student::all();
        return view('admin.master-data', compact('criteria', 'scores', 'students'));
    }
}