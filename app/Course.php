<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['course_name', 'menu', 'maximum',];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
