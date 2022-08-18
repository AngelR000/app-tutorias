<?php

namespace App\Http\Controllers;
use App\Imports\EstudianteImport;
use App\Imports\TutorImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Tutor;
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
        $Estudiantes->tutor = $request->tutor;
        $Estudiantes->codigoUDG = $request->codigoUDG;
        $Estudiantes->semestre = $request->semestre;
        $Estudiantes->save();
        return $Estudiantes;
    }

    /**
     * Display the specified resource.
     *@param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tutor)
    {      
        
        $Estudiantes = Estudiante::where('tutor', $tutor)->get();
        
        return $Estudiantes;
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
        $Estudiantes->tutor = $request->tutor;
        $Estudiantes->codigoUDG = $request->codigoUDG;
        $Estudiantes->semestre = $request->semestre;
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

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     * @param string $tutor
     */
    public function select(Request $request){
        try{
     $file= $request->file('import_file');  
     Excel::import(new TutorImport, $file);  
     Excel::import(new EstudianteImport, $file); 
        }catch(\Exception $e){
            return redirect('/estudiantes')->with('error', 'Error');
        }
        return redirect('/estudiantes')->with('success', 'Exito');
    }



    public function limpiarbase() 
    {
        try{
            $estudiantes= Estudiante::query()->delete();
            $tutores= Tutor::query()->delete();
        }catch(\Exception $e){
            return redirect('/estudiantes')->with('errorB', 'Error');
        }
        
        return redirect('/estudiantes')->with('successB', 'Exito');
    }
}
