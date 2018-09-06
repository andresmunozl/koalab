<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table ='recursos';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['user_id','actividad_id','nombre','descripcion','estado','miniatura','recurso','tenantid'];

    public function user (){
        return $this->belongsTo('App\User','user_id');
    }
    public function actividad (){
        return $this->belongsTo('App\Actividad','actividad_id');
    }
}
