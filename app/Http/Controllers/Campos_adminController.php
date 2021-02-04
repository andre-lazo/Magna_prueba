<?php

namespace App\Http\Controllers;
use App\Models\Futbol;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Campos_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=DB::table('futbols')
            ->select('futbols.id',
                     'futbols.title',
                     'futbols.hora',
                     'futbols.visi1',
                     'futbols.visi2',
                     'futbols.visi3',
                     'futbols.visi4',
                     'futbols.visi5',
                     'futbols.visi6',
                     'futbols.visi7',
                     'futbols.pare1',
                     'futbols.pare2',
                     'futbols.pare3',
                     'futbols.pare4',
                     'futbols.pare5',
                     'futbols.pare7',    
                     'futbols.color',
                     'futbols.textColor',
                     'futbols.start',
                     'futbols.end',
                     'futbols.created_at',
                     'futbols.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','futbols.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->orderby('updated_at','asc')
            ->get();

        return view('reservas.cancha_cesped', ['eventos'=>$data]);
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
        $data=DB::table('futbols')
        ->select('futbols.id',
                 'futbols.title',
                 'futbols.hora',
                 'futbols.visi1',
                 'futbols.visi2',
                 'futbols.visi3',
                 'futbols.visi4',
                 'futbols.visi5',
                 'futbols.visi6',
                 'futbols.visi7',
                 'futbols.pare1',
                 'futbols.pare2',
                 'futbols.pare3',
                 'futbols.pare4',
                 'futbols.pare5',
                 'futbols.pare7',   
                 'futbols.pare6',    
                 'futbols.color',
                 'futbols.textColor',
                 'futbols.start',
                 'futbols.end',
                 'futbols.created_at',
                 'futbols.updated_at',
                 'users.cedula',
                 'users.name','users.apellido',
                 'users.email',
                 'users.cedula',
            'residencias.residencia_id')
        ->join('users','users.id','futbols.id_usuario')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('futbols.id','=',Crypt::decrypt($id))
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
