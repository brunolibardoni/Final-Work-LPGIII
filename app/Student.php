<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['student_name, date_of_birth, cpf, rg, cpf, cellphone'];

    public $timestamps = true;

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
