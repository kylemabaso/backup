<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'password',
    ];

    public function category() {
        return $this->belongsTo('App\Models\CourseCategory');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function qualifications() {
        return $this->hasManyThrough(Qualification::class, QualificationCourse::class, 'course_id', 'id', null, 'qualification_id');
    }

    public function stages() {
        return $this->hasMany(CourseStage::class)->orderBy('order', 'asc');
    }
}
