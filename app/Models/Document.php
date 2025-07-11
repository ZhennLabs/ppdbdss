<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'document_type', 'file_path'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}