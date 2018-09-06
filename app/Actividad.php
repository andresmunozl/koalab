<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table ='actividads';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','tipo','tema_id','desempeno_id','tenantid'];

    public function tema (){
        return $this->belongsTo('App\Tema','tema_id');
    }

    public function desempeno (){
        return $this->belongsTo('App\Desempeno','desempeno_id');
    }

}
