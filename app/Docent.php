<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docent extends Model
{
    protected $table ='docents';
    protected $primaryKey='id';
    public $timestamps=true;
    public $fillable = ['photo','address','profession','user_id','tenantid'];

    public function user (){
        return $this->belongsTo('App\User','user_id');
    }

}
