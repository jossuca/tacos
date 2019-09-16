<?php

namespace App\Http\Controllers;

use App\Bussiness;
use App\Category;
use Illuminate\Http\Request;

class BussinnessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Bussiness=Bussiness::all();
        
        return response()->json([
            "data"=>$Bussiness,
            'result' => 'success',
            'desc' => 'todas los negocios'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view("negocios.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bussiness=new Bussiness();
        $bussiness->address=$request->address;
        $bussiness->lat=$request->lat;
        $bussiness->lng=$request->lng;
        $bussiness->ranking=0;
        $bussiness->description=$request->description;
        $bussiness->category_id=$request->category_id;
        //dd ($bussiness);
        if ($request->hasFile('image')) {
            $bussiness->image =  $request->file('image')->store('public');
          }
        //dd($bussiness);
          $bussiness->save();
          return redirect()->route('bussiness.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function show(Bussiness $bussiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussiness $bussiness)
    {
        $categories=Category::all();
        return view("negocios.edit", compact("bussiness", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bussiness $bussiness)
    {

       
        if ($request->hasFile('image')) {
            $bussiness->image =  $request->file('image')->store('public');
          }
        $bussiness->update(
            $request->only('address', 'lat', 'lng', 'descripcion')
        );
        
        return redirect()->route('bussiness.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussiness $bussiness)
    {
        //
    }

    public function categoryBussines(Bussiness $bussiness){
        $category=$bussiness->category;
        //dd($category);

        return response()->json([
            "data"=>$category,
            'result' => 'success',
            'desc' => 'todas las categorias'
        ]);
    }
}
