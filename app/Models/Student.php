<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'address',
        'gender',
        'parents',
        'major_id',
        'year'
    ];

    public function scopeFilterMajorAndClassroom($query, $majorId = "", $classId = "")
    {
        if ($classId) {
            $query->whereHas('classes', function ($query) use ($classId) {
                $query->where('classroom_id', $classId);
            });
        }

        if ($majorId) {
            $query->where('major_id', $majorId);
        }

        return $query;
    }

    public function scopeFilterMajorAndYear($query, $majorId = "", $year = "")
    {
        if ($majorId) {
            $query->where('major_id', $majorId);
        }

        if ($year) {
            $query->where('year', $year);
        }

        return $query;
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 'active');
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classroom::class, 'class_student')
                    ->withPivot('academic_year_id')
                    ->withTimestamps();
    }
}
