<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $primaryKey = "id";
    protected $fillable = ['full_name', 'profession', 'degree', 'phone'];
    protected $hidden = ['id'];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
