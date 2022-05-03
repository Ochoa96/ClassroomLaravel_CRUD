<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    protected $primaryKey = "id";
    protected $fillable = ['name', 'level', 'class_hours', 'teacher_id'];
    protected $hidden = [ 'id'];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
