<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['course_name', 'menu', 'maximum',];

    public function users(){
        return $this->belongsToMany(User::class, 'course_user', 'course_id','user_id')->withPivot('authorized','id')->withTimestamps();
    }
}
