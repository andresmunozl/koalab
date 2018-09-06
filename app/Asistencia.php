<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table ='asistencia';
    protected $primaryKey='asistencia_id';
    public $timestamps=true;
    public $fillable = ['asistencia_id','estudiante_id','programacion_id','tipo_asistencia','observacion_asistencia','fecha_asistencia','tenantid'];

    public function programacion (){
        return $this->belongsTo('App\Programacion','programacion_id');
    }

    public function estudiante (){
        return $this->belongsTo('App\Estudiante','estudiante_id');
    }
}
