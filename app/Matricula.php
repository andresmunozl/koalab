<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table ='matriculas';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['fecha','oferta_id','student_id','estado','tenantid'];
    public function student()
    {
        return $this->belongsTo('App\Estudiante','student_id')->with('user');
    }
    public function materias()
    {
        return $this->hasMany('App\OfertaMateria','oferta_id','oferta_id')->with(['materia','docente']);
    }
    public function oferta()
    {
        return $this->belongsTo('App\Oferta','oferta_id')->with(['director','grupo']);
    }


}
