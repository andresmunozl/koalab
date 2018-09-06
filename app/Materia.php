<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table ='materias';
    protected $primaryKey='materia_id';
    public $timestamps=true;
    public $fillable = ['name','descripcion','colegio_id','tenantid'];
}
