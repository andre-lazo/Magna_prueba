<?php

namespace App\Http\Controllers;
use App\Models\Emprendedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Emprendedores_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
            $query=trim($request->get('search'));
            $emprendedores=Emprendedore::all()->where('categoria','=',$query);
            $data=DB::table('emprendedores')
            ->select('emprendedores.id','emprendedores.valor','emprendedores.categoria','users.cedula',
            'users.name','users.apellido','emprendedores.telefono',
            'users.email','emprendedores.titulo','emprendedores.imagen','emprendedores.updated_at','emprendedores.descripcion'
            ,'residencias.residencia_id')
            ->join('users','users.id','emprendedores.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->where('categoria','LIKE','%'.$query.'%')
            ->orderby('updated_at','asc')
            ->get();
       
       
        return view('emprendedores.index_admin',['emprendimientos'=>$data,
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprendedores = Emprendedore::findOrFail($id);
        $emprendedores->delete();
         return redirect('emprendedor')->with('success','Publicidad borrado con exito');
    }
}
