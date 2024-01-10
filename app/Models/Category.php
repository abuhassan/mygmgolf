<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
