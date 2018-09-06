<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table ='temas';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','competencia_id','subtema','tenantid'];

    public function subtema()
    {
        return $this->belongsTo('App\Tema','subtema','id');
    }

    public function competencia (){
        return $this->belongsTo('App\Competencia','competencia_id');
    }
}
