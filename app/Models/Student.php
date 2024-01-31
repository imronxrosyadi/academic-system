<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subjectGrades()
    {
        return $this->belongsTo(SubjectGrade::class, 'id');
    }

    public function classes()
    {
        return $this->belongsTo(Clazz::class, 'class_id', 'id');
    }
}
