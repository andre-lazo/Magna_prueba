<?php

namespace App\Http\Controllers;
use App\Models\Alberca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Alberca_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=DB::table('albercas')
            ->select('albercas.id',
                     'albercas.title',
                     'albercas.hora',
                    'albercas.visi1',
                    'albercas.visi2',
                    'albercas.visi3',
                    'albercas.visi4',
                    'albercas.visi5',
                    'albercas.visi6',
                    'albercas.visi7',
                    'albercas.pare1',
                    'albercas.pare2',
                    'albercas.pare3',
                    'albercas.pare4',
                    'albercas.pare5',
                    'albercas.pare7',    
                    'albercas.color',
                    'albercas.textColor',
                    'albercas.start',
                    'albercas.end',
                    'albercas.created_at',
                    'albercas.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','albercas.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->orderby('updated_at','asc')
            ->get();

        return view('reservas.alberca', ['eventos'=>$data]);
    }

   
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
       
        $data=DB::table('albercas')
            ->select('albercas.id',
                     'albercas.title',
                     'albercas.hora',
                    'albercas.visi1',
                    'albercas.visi2',
                    'albercas.visi3',
                    'albercas.visi4',
                    'albercas.visi5',
                    'albercas.visi6',
                    'albercas.visi7',
                    'albercas.pare1',
                    'albercas.pare2',
                    'albercas.pare3',
                    'albercas.pare4',
                    'albercas.pare5',
                    'albercas.pare7',
                    'albercas.pare6',    
                    'albercas.color',
                    'albercas.textColor',
                    'albercas.start',
                    'albercas.end',
                    'albercas.created_at',
                    'albercas.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','albercas.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->where('albercas.id','=',Crypt::decrypt($id))
            ->orderby('updated_at','asc')
            ->get();
        return view('reservas.view',['evento'=>$data->last()]);
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
        //
    }
}
