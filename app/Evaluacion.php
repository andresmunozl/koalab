<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table ='evaluacions';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','estado','actividad_id','estudiante_id','tenantid'];

    public function actividad (){
        return $this->belongsTo('App\Actividad','actividad_id');
    }
    
    public function estudiante (){
        return $this->belongsTo('App\Estudiante','estudiante_id');
    }

}
