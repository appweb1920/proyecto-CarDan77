<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Productos extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table='productos';
    protected $primaryKey = 'id';
    protected $fillable=['id','Nombre', 'Descripcion','Precio','TipoMaterial','MaterialNecesario','imagen'];   
}
