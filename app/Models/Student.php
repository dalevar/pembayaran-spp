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
        'major_id'
    ];

    public function scopeSearchMajor($query, $major_id = '')
    {
        return $query->where('major_id', $major_id);
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 'active');
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
