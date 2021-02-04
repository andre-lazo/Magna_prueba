<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class User_clienteController extends Controller
{


    public function show($id_usu)
    {
       
        $data=DB::table('users')
        ->select('users.name','users.apellido','users.cedula','users.updated_at','users.email','residencias.residencia_id')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('users.id','=',Crypt::decrypt($id_usu))
        ->orderby('residencia_id','asc')
        ->get();
        return \view('user_cliente.profile',['user'=>$data->last()]);

    }
}
