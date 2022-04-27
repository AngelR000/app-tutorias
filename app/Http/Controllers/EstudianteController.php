<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudiante::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Estudiantes=new Estudiante();
        $Estudiantes->nombre = $request->nombre;
        $Estudiantes->email = $request->email;
        $Estudiantes->codigoUDG = $request->codigoUDG;
        $Estudiantes->save();
        return $Estudiantes;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Estudiantes=Estudiante::find($id);
        $Estudiantes->nombre = $request->nombre;
        $Estudiantes->email = $request->email;
        $Estudiantes->codigoUDG = $request->codigoUDG;
        $Estudiantes->save();
        return $Estudiantes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Estudiantes=Estudiante::find($id);
         $Estudiantes->delete();   
    }
}
