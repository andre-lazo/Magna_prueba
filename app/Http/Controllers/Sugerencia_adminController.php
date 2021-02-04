<?php

namespace App\Http\Controllers;
use App\Models\Sugerencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Sugerencia_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $query=trim($request->get('search'));

            $data=DB::table('sugerencias')
            ->select('sugerencias.id','sugerencias.descripcion','users.cedula','users.name','users.apellido',
            'users.email','sugerencias.titulo','sugerencias.imagen','sugerencias.created_at','sugerencias.observacion'
            ,'sugerencias.updated_at','sugerencias.estado','residencias.residencia_id')
            ->join('users','users.id','sugerencias.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->where('apellido','LIKE','%'.$query.'%')
            ->orderby('updated_at','asc')
            ->get();

        $query2=trim($request->get('search2'));

            $data2=DB::table('sugerencias')
            ->select('sugerencias.id','sugerencias.descripcion','users.cedula','users.name','users.apellido',
            'users.email','sugerencias.titulo','sugerencias.imagen','sugerencias.created_at','sugerencias.observacion'
            ,'sugerencias.updated_at','sugerencias.estado','residencias.residencia_id')
            ->join('users','users.id','sugerencias.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->where('apellido','LIKE','%'.$query2.'%')
            ->orderby('updated_at','asc')
            ->get();
            return \view('sugerencias.index_admin',['sugerencias'=>$data], ['sugerencias2'=>$data2]);
       
     
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $sugerencia=Sugerencia::findOrFail($id);
        $sugerencia->estado=$request->get('estado');
        $sugerencia->observacion=$request->get('observacion');
        $sugerencia->update();
        return \redirect('/sugerencia');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
