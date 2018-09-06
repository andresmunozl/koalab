<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desempeno extends Model
{
    protected $table ='desempenos';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','tema_id','tenantid'];

    public function tema (){
        return $this->belongsTo('App\Tema','tema_id');
    }
}
