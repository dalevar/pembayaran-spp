<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'major_id'
    ];

    public function scopeSearchMajor($query, $major_id = '')
    {
        return $query->when($major_id, function ($query, $id) {
            return $query->where('major_id', $id);
        });
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_student')
                    ->withPivot('academic_year_id')
                    ->withTimestamps();
    }
}
