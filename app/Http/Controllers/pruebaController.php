<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pruebaController extends Controller
{
    public function prueba(Request $x){
        dd($x); //depurar codigo
        return $x;
    }
}
