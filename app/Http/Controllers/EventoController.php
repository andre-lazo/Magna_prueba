<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{

    public function index()
    {
        
        $data=DB::table('eventos')
            ->select('eventos.id',
                     'eventos.title',
                     'eventos.hora',
                     'eventos.visi1',
                     'eventos.visi2',
                     'eventos.visi3',
                     'eventos.visi4',
                     'eventos.visi5',
                     'eventos.visi6',
                     'eventos.visi7',
                     'eventos.pare1',
                     'eventos.pare2',
                     'eventos.pare3',
                     'eventos.pare4',
                     'eventos.pare5',
                     'eventos.pare7',    
                     'eventos.color',
                     'eventos.textColor',
                     'eventos.start',
                     'eventos.end',
                     'eventos.created_at',
                     'eventos.updated_at',
                     'users.cedula',
                     'users.name','users.apellido',
                     'users.email',
                     'users.cedula',
                'residencias.residencia_id')
            ->join('users','users.id','eventos.id_usuario')
            ->join('residencias','users.residencia_id','residencias.id')
            ->orderby('updated_at','asc')
            ->get();

        return view('reservas.salon', ['eventos'=>$data]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
        $data=DB::table('eventos')
        ->select('eventos.id',
                 'eventos.title',
                 'eventos.hora',
                 'eventos.visi1',
                 'eventos.visi2',
                 'eventos.visi3',
                 'eventos.visi4',
                 'eventos.visi5',
                 'eventos.visi6',
                 'eventos.visi7',
                 'eventos.pare1',
                 'eventos.pare2',
                 'eventos.pare3',
                 'eventos.pare4',
                 'eventos.pare5',
                 'eventos.pare6',
                 'eventos.pare7',    
                 'eventos.color',
                 'eventos.textColor',
                 'eventos.start',
                 'eventos.end',
                 'eventos.created_at',
                 'eventos.updated_at',
                 'users.cedula',
                 'users.name','users.apellido',
                 'users.email',
                 'users.cedula',
            'residencias.residencia_id')
        ->join('users','users.id','eventos.id_usuario')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('eventos.id','=',Crypt::decrypt($id))
        ->orderby('updated_at','asc')
        ->get();
        return view('reservas.view',['evento'=>$data->last()]);
    }

    public function edit(Evento $evento)
    {
        //
    }

    public function update(Request $request, Evento $evento)
    {
        //
    }

    public function destroy(Evento $evento)
    {
        //
    }
}
