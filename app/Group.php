<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table ='groups';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['name','ext','colegio_id','tenantid'];

}
