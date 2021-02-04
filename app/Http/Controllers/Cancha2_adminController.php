<?php

namespace App\Http\Controllers;
use App\Models\Campo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Cancha2_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=DB::table('campos')
            ->select('campos.id',
                     'campos.title',
                     'campos.hora',
                     'campos.visi1',
                     'campos.visi2',
                     'campos.visi3',
                     'campos.visi4',
                     'campos.visi5',
                     'campos.visi6',
                     'campos.visi7',
                     'campos.pare1',
                     'campos.pare2',
                     'campos.pare3',
                     'campos.pare4',
                     'campos.pare5',
                     'campos.pare7',    
                     'campos.color',
                     'campos.textColor',
                     'campos.start',
                     'campos.end',
                     'campos.created_at',
                     'campos.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','campos.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->orderby('updated_at','asc')
            ->get();

        return view('reservas.cancha_c2', ['eventos'=>$data]);
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
        $data=DB::table('campos')
        ->select('campos.id',
                 'campos.title',
                 'campos.hora',
                 'campos.visi1',
                 'campos.visi2',
                 'campos.visi3',
                 'campos.visi4',
                 'campos.visi5',
                 'campos.visi6',
                 'campos.visi7',
                 'campos.pare1',
                 'campos.pare2',
                 'campos.pare3',
                 'campos.pare4',
                 'campos.pare5',
                 'campos.pare6',
                 'campos.pare7',    
                 'campos.color',
                 'campos.textColor',
                 'campos.start',
                 'campos.end',
                 'campos.created_at',
                 'campos.updated_at',
                 'users.cedula',
                 'users.name','users.apellido',
                 'users.email',
                 'users.cedula',
            'residencias.residencia_id')
        ->join('users','users.id','campos.id_usuario')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('campos.id','=',Crypt::decrypt($id))
       
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
