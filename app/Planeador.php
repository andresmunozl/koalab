<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeador extends Model
{
    
    protected $table ='planeadors';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['codigo_dane','docente_id','fecha_inicio','fecha_fin','horas','sesiones','colegio_id','materia_id','tenantid'];

    public function docente()
    {
        return $this->belongsTo('App\Docent','docente_id')->with('user');
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia','materia_id');
    }

}
