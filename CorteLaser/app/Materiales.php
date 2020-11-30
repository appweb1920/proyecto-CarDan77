<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Materiales extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table='materiales';
    protected $primaryKey = 'id';
    protected $fillable=['id','Nombre', 'DescripcionUso','CostoPieza','TipoMaterial','imagen'];
}
