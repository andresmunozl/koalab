<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table ='estudiantes';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['padre_id','madre_id','user_id','photo','tenantid'];

    public function user (){
        return $this->belongsTo('App\user','user_id');
    }

}
