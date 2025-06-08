<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Score;
use App\Models\Result;
use App\Models\Document;
use App\Models\User;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'name', 'place_of_birth', 'date_of_birth', 'gender', 'address', 'nik',
        'father_name', 'mother_name', 'parent_phone', 'parent_address',
        'previous_school_name', 'graduation_year', 'student_phone', 'special_notes',
        'iq_score', 'parent_income', 'family_relation', 'achievement_level',
        'registration_number',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateRegistrationNumber()
    {
        do {
            $number = '';
            for ($i = 0; $i < 3; $i++) {
                $number .= str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                if ($i < 2) $number .= '-';
            }
        } while (self::where('registration_number', $number)->exists());
        return $number;
    }
}