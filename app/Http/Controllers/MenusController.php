<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller{
    public function index(){
        $menus=Menu::all();

        return response()->json([
            "data"=>$menus,
            'result' => 'success',
            'desc' => 'todos los menus'
        ]);
    }

    public function create(){
        return view("menus.create");
    }

    public function store(Request $request){
        //dd ($request->image);
        $menu=new menu;
        $menu->name=$request->name;
        $menu->sale=$request->sale;
        $menu->description=$request->descripcion;
        $menu->business_id=$request->business_id;
        //dd ($menu); 
          
        //dd($menu);
          $menu->save();
          return redirect()->route('menu.path');
    }
}
