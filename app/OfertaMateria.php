<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaMateria extends Model
{
    protected $table ='oferta_materias';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['materia_id','oferta_id','docente_id','tenantid'];
    public function materia()
    {
        return $this->belongsTo('App\Materia','materia_id');
    }
    public function docente()
    {
        return $this->belongsTo('App\Docent','docente_id')->with('user');
    }
    public function oferta()
    {
        return $this->belongsTo('App\Oferta','oferta_id')->with('grupo');
    }
}
