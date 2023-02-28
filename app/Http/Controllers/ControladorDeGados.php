<?php

namespace App\Http\Controllers;

// use App\Models\Models\ModelBovino;

use App\Http\Requests\BovinoRequest;
use App\Models\Models\ModelBovino;

class ControladorDeGados extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todosbovinos=ModelBovino::all();
        return view("inicio", compact("todosbovinos"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listatodos()
    {
        $todosbovinos=ModelBovino::all();
        return view("listatodos", compact("todosbovinos"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function abaterbovinos()
    {
        $todosbovinos=ModelBovino::all();
        return view("abater", compact("todosbovinos"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmAbater(BovinoRequest $request, $id)
    {
        ModelBovino::where(["id"=>$id])->update([
            "abatido"=>$request->abatido
        ]);
        return redirect("gerenciando_bovinos");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastrar()
    {
        return view("cadastrar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BovinoRequest $request)
    {
        $cad=ModelBovino::create([
            "id"=>$request->id,
            "peso"=>$request->peso,
            "leiteProduzido"=>$request->leiteProduzido,
            "racaoConsumida"=>$request->racaoConsumida,
            "data_nasc"=>$request->data_nasc,
        ]);
        if($cad) {
            return redirect("gerenciando_bovinos/bovinos");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bovino=ModelBovino::find($id);
        return view("cadastrar", compact("bovino"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BovinoRequest $request, $id)
    {
        ModelBovino::where(["id"=>$id])->update([
            "id"=>$request->id,
            "peso"=>$request->peso,
            "leiteProduzido"=>$request->leiteProduzido,
            "racaoConsumida"=>$request->racaoConsumida,
            "data_nasc"=>$request->data_nasc,
        ]);
        return redirect("gerenciando_bovinos/bovinos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelBovino::destroy($id);
        return($del)?"sim":"não";
    }
}
