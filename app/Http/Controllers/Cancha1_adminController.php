<?php

namespace App\Http\Controllers;
use App\Models\Cancha;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cancha1_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=DB::table('canchas')
               ->select('canchas.id',
                        'canchas.title',
                        'canchas.hora',
                        'canchas.visi1',
                        'canchas.visi2',
                        'canchas.visi3',
                        'canchas.visi4',
                        'canchas.visi5',
                        'canchas.visi6',
                        'canchas.visi7',
                        'canchas.pare1',
                        'canchas.pare2',
                        'canchas.pare3',
                        'canchas.pare4',
                        'canchas.pare5',
                        'canchas.pare7',    
                        'canchas.color',
                        'canchas.textColor',
                        'canchas.start',
                        'canchas.end',
                        'canchas.created_at',
                        'canchas.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','canchas.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->orderby('updated_at','asc')
            ->get();

        return view('reservas.cancha_c1', ['eventos'=>$data]);
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
       
        $data=DB::table('canchas')
        ->select('canchas.id',
                 'canchas.title',
                 'canchas.hora',
                 'canchas.visi1',
                 'canchas.visi2',
                 'canchas.visi3',
                 'canchas.visi4',
                 'canchas.visi5',
                 'canchas.visi6',
                 'canchas.visi7',
                 'canchas.pare1',
                 'canchas.pare2',
                 'canchas.pare3',
                 'canchas.pare4',
                 'canchas.pare5',
                 'canchas.pare7',  
                 'canchas.pare6',   
                 'canchas.color',
                 'canchas.textColor',
                 'canchas.start',
                 'canchas.end',
                 'canchas.created_at',
                 'canchas.updated_at',
              'users.cedula',
              'users.name','users.apellido',
              'users.email',
              'users.cedula',
         'residencias.residencia_id')
     ->join('users','users.id','canchas.id_usuario')
     ->join('residencias','users.residencia_id','residencias.id')
     ->where('canchas.id','=',Crypt::decrypt($id))
     
     
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
