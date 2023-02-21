<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudyClass extends Model 
{
    use HasFactory;

    protected $table = 'StudyClass';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'class_code', 'class_name', 'total_member', 'teacher_id', 'cv_id'
    ];


}
