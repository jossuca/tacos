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

    public function business(){
        return $this->belongsTo(Bussiness::class);
    }
}
