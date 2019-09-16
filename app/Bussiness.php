<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    protected $table = 'bussinness';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'address', 'lat', 'lng', 'ranking', "image", "description", "category_id"
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
