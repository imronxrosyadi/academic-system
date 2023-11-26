<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
