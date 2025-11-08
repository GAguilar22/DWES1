<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'birth_date',
        'phone_number',
        'cicle_id',
    ];
    
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function cicle(){
        return $this->belongsTo(Cicle::class);
    }

}
