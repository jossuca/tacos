<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'name', 'sale', 'description', 'business_id'
    ];

        //Manejo de relaciones con el ORM Eloquent
    public function menus (){
        return $this->hasMany(Menus::class);
    }
}
