<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class HistorialCompraMaterial extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table='historial_compra_material';
    protected $primaryKey = 'id';
    protected $fillable=['id','id_material', 'PiezasAdquiridas','GastoTotal'];
}
