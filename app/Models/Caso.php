<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = 'casos';
    protected $primaryKey = 'id_caso';

    protected $fillable = ['num_expediente', 
                            'fecha_incio',
                            'fecha_fin',
                            'estado',
                            'activo',
                            'cliente',
                            'abogado'];

    //Relación 1 * inversa
    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }
    
    public function abogados(){
        return $this->belongsTo(Abogado::class);
    }
        
    
}
