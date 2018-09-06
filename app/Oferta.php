<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    //ofertas
    protected $table ='ofertas';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['start','end','description','calendar','group','name','journal','director_id','tenantid'];
    public function grupo (){
        return $this->belongsTo('App\Group','group');
    }public function director (){
        return $this->belongsTo('App\Docent','director_id')->with('user');
    }
}
