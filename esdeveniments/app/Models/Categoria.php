<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Esdeveniment;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['nom'];

    public function esdeveniments()
    {
    
     //Definimos la relacion 1-N con el modelo Esdeveniment, utilizando la FK
     
        return $this->hasMany(Esdeveniment::class, 'categoria_id');
    }
}
