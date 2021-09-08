<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    use HasFactory;

    protected $table = 'abogados';
    protected $primaryKey = 'id_abogado';

    // a continuación estamos habilitando la asignación masiva, aqui le indicamos en el array
    // cuales son los campos que se pueden introducir por asignación masiva
    protected $fillable = ['tipo_documento', 
                            'num_documento',
                            'num_tarjetaProfesional', 
                            'nombres',
                            'apellidos', 
                            'celular',
                            'direccion',
                            'activo'];
    //Relación 1 *
    public function casos(){
        return $this->hasMany(Caso::class);
    }
}
