<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    protected $table ='programacions';
    protected $primaryKey='programacion_id';
    public $timestamps=true;
    public $fillable = ['oferta_id','materia_id','docente_id','tenantid'];

    public function materia(){
        return $this->belongsTo('App\Materia','materia_id');
    }

    public function docente(){
        return $this->belongsTo('App\Docent','docente_id');
    }
}
