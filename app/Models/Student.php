<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public $fillable = [
        'class_id',
        'category_id',
        'name',
        'email',
        'phone',
        'photo',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
