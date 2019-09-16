<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Category::all();
        
        return response()->json([
            "data"=>$categories,
            'result' => 'success',
            'desc' => 'todas las categorias'
        ]);
    }
    public function create(){
        return view("categories.create");
    }
    public function edit(Category $category){
        return view("categories.edit", compact("category"));
    }
    public function store(Request $request){
        //dd ($request->image);
        $category=new Category;
        $category->name=$request->name;
        $category->description=$request->descripcion;
        $category->total_businnesses=0;
        //dd ($category);
        if ($request->hasFile('image')) {
            $category->image =  $request->file('image')->store('public');
          }
        //dd($category);
          $category->save();
          return redirect()->route('category_path');
    }
    public function delete(Category $category){
        dd($category);
        $category->delete();
        return redirect()->route('category_path');
    }
    public function update(Category $category, Request $request){
        if ($request->hasFile('image')) {
            $category->image =  $request->file('image')->store('public');
          }
        $category->update(
            $request->only('name', 'description')
        );
        
        return redirect()->route('category_path');
  
    }

    public function bussinessesCategory(Category $category){
        $negocios=$category->bussinesses;
        return response()->json([
            "data"=>$negocios,
            'result' => 'success',
            'desc' => 'todas las categorias'
        ]);
    }
}
