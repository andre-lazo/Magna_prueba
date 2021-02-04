<?php

namespace App\Http\Controllers;
use App\Models\Alicuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alicuota_userController extends Controller
{
   
    
    public function index(Request $request)
    {
      
        $data=DB::table('alicuotas')
        ->select('alicuotas.id','residencias.residencia_id','users.name','users.apellido','users.cedula'
        ,'alicuotas.cuotas_pagadas','alicuotas.cuotas_adeudadas',
        'alicuotas.fecha_inicio','alicuotas.fecha_final','alicuotas.cuotas_totales',
        'alicuotas.valor_total','alicuotas.valor_pagado', 'alicuotas.valor_adeudado',
        'alicuotas.updated_at')
        ->join('residencias','alicuotas.residencia_id','residencias.id')
        ->join('users','users.id','alicuotas.id_usuario')  
        ->where('users.cedula','=',$request->user()->cedula) 
        ->orderby('residencia_id','asc')
        ->get();
        if($data==null){
            return redirect('index')->with('success','Sin registro de alicuotas');
        }
       else{
        return view('user_cliente.alicuota',['alicuotas'=>$data]);
       }
       return null;
    }

   
}
