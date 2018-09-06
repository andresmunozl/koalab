<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaYear extends Model
{
    protected $table ='materia_years';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['materia_id','academic_year_id','state','tenantid'];
    public function m (){
        return $this->belongsTo('App\Materia','materia_id');
    }
    public function y (){
        return $this->belongsTo('App\AcademicYear','academic_year_id');
    }
}
