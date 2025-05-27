<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'place_of_birth', 'date_of_birth', 'gender', 'address', 'nik',
        'father_name', 'mother_name', 'parent_phone', 'parent_address',
        'previous_school_name', 'graduation_year', 'student_phone', 'special_notes',
        'iq_score', 'parent_income', 'family_relation', 'achievement_level',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}