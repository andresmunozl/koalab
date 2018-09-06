<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table ='colleges';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['tenantid','codigo','nombre','direccion','telefono','email','website','dane','departamento',
        'municipio','state','tipo','calendario','sector'];

}
