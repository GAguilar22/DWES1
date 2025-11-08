<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\User;

class Esdeveniment extends Model
{
    use HasFactory;
    
    protected $table = 'esdeveniments'; 

    // Utilizamos el belongsToMany porque un Esdeveniment puede tener muchos usuarios y un usuario puede estar en varios Esdevenimats
    // Asi tenemos la relacion N-N
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_esdeveniments', 'esdev_id', 'user_id');
    }

    protected $fillable = [
        'nom',
        'descripcio',
        'data',
        'hora',
        'num_max_assistents',
        'edat_minima',
        'imatge',
        'categoria_id'
    ]; 

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
