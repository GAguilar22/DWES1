<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    protected $table = 'cicles';
    
    public function students(){
        return $this->hasMany(Student::class);
    }
    protected $fillable = [
        'code',
        'name',
        'description',
        'num_courses',
        'image'
    ];
}
