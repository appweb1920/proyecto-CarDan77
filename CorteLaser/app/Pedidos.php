<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Pedidos extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table='pedidos';
    protected $primaryKey = 'id';
    protected $fillable=['id','id_producto'];   

}
