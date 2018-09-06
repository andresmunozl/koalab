<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $table ='competencias';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','estandar_id','tenantid'];

    public function estandar (){
        return $this->belongsTo('App\Estandar','estandar_id');
    }
}
