<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estandar extends Model
{
    protected $table ='estandars';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['nombre','descripcion','planeador_id','tenantid'];
}
