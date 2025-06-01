<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $casts = [
        'is_passed' => 'boolean',
    ];

    protected $fillable = [
        'student_id', 'final_score', 'rank', 'class', 'is_passed'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}