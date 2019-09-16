<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'name', 'total_businnesses', 'description', 'image'
    ];

        //Manejo de relaciones con el ORM Eloquent
    public function bussinesses (){
        return $this->hasMany(Bussiness::class);
    }

}
