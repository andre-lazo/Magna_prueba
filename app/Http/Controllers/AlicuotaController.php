<?php

namespace App\Http\Controllers;

use App\Models\Alicuota;
use Illuminate\Http\Request;
use App\Models\Residencia;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
class AlicuotaController extends Controller
{
    public function __construct(){
         
        $this->middleware('auth');
     }
     public function index(Request $request)
     {
         $query=trim($request->get('search'));
         $residencia=Residencia::all();
         $usuario=DB::table('users')
         ->select('users.id','users.name','users.apellido','users.cedula','users.email','residencias.residencia_id')
         ->join('residencias','users.residencia_id','residencias.id')
         ->orderby('apellido','asc')
         ->get();
        
         $data=DB::table('alicuotas')
         ->select('alicuotas.residencia_id as alicuota_r','alicuotas.id','residencias.residencia_id','users.name','users.apellido','users.cedula'
         ,'alicuotas.cuotas_pagadas','alicuotas.cuotas_adeudadas','alicuotas.updated_at')
         ->join('residencias','alicuotas.residencia_id','residencias.id')
         ->join('users','users.id','alicuotas.id_usuario') 
         ->where('cedula','LIKE','%'.$query.'%')
         ->orderby('residencia_id','asc')
         ->get();
         return \view('alicuotas.index',['alicuotas'=>$data,'residencias'=>$residencia,'usuarios'=>$usuario]);
     }

   
    
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datos= Alicuota::all();
      $bandera=false;
       list($nombre,$apellido,$cedula)= explode("-",$request->get('propietario'),3);
        $alicuota= new Alicuota();
        $alicuota->nombre=$nombre;
        $alicuota->apellido=$apellido;
        $alicuota->cedula=$cedula;
        foreach($datos as $dato){
            if($dato->cod_MnzV==$request->get('residencia')){$bandera=true;}
        }
        $alicuota->cod_MnzV=$request->get('residencia');
        $alicuota->fecha_inicio=$request->get('fecha_inicio');
        $alicuota->fecha_final=$request->get('fecha_fin');
        $alicuota->cuotas_totales=$request->get('cuotas_totales');
        $alicuota->valor_total=$request->get('valor_total');
        $alicuota->cuotas_pagadas=$request->get('cuotas_pagadas');
        $alicuota->valor_pagado=$request->get('valor_pagado');
        $alicuota->cuotas_adeudadas=$request->get('cuotas_adeudadas');
        $alicuota->valor_adeudado=$request->get('valor_adeudado');
        if(!$bandera){ $alicuota->save();
            return \redirect('alicuota')->with('success','Alicuota de '.$alicuota->nombre.' registrada correctamente');
    }else{
        return \redirect('alicuota')->with('warning','Alicuota de residencia '.$alicuota->cod_MnzV.' ya esta registrada');
    }
       
    }

    public function show($id)
    {
      
        $data=DB::table('alicuotas')
        ->select('alicuotas.id','residencias.residencia_id','users.name','users.apellido','users.cedula'
        ,'alicuotas.cuotas_pagadas','alicuotas.cuotas_adeudadas','alicuotas.updated_at'
        ,'alicuotas.fecha_inicio','alicuotas.fecha_final','alicuotas.valor_total'
        ,'alicuotas.valor_pagado','alicuotas.created_at','alicuotas.cuotas_totales'
        ,'alicuotas.valor_adeudado')
        ->join('residencias','alicuotas.residencia_id','residencias.id')
        ->join('users','users.id','alicuotas.id_usuario') 
        ->where('alicuotas.id','=',Crypt::decrypt($id))
        ->get();
        return view('alicuotas.view',['alicuota'=>$data->last()]);

    }

    public function edit( $id)
    { $residencia=Residencia::all();
        $usuario=User::all();
        $data=DB::table('alicuotas')
        ->select('alicuotas.id','alicuotas.residencia_id as r','residencias.residencia_id','users.name','users.apellido','users.cedula'
        ,'alicuotas.cuotas_pagadas','alicuotas.cuotas_adeudadas','alicuotas.updated_at'
        ,'alicuotas.fecha_inicio','alicuotas.fecha_final','alicuotas.valor_total'
        ,'alicuotas.valor_pagado','alicuotas.created_at','alicuotas.cuotas_totales'
        ,'alicuotas.valor_adeudado','alicuotas.id_usuario')
        ->join('residencias','alicuotas.residencia_id','residencias.id')
        ->join('users','users.id','alicuotas.id_usuario') 
        ->where('alicuotas.id','=',Crypt::decrypt($id))
        ->get();
        return view('alicuotas.edit',['alicuota'=>$data->last(),'residencias'=>$residencia,'usuarios'=>$usuario]);
    }


    public function update(Request $request,  $id)
    {
       
        $alicuota= Alicuota::findOrFail($id); 
     
      
        $alicuota->fecha_inicio=$request->get('fecha_inicio');
        $alicuota->fecha_final=$request->get('fecha_fin');
        $alicuota->cuotas_totales=$request->get('cuotas_totales');
        $alicuota->valor_total=$request->get('valor_total');
        $alicuota->cuotas_pagadas=$request->get('cuotas_pagadas');
        $alicuota->valor_pagado=$request->get('valor_pagado');
        $alicuota->cuotas_adeudadas=$request->get('cuotas_adeudadas');
        $alicuota->valor_adeudado=$request->get('valor_adeudado');
        $alicuota->id_usuario=$request->get('propietario');
        $alicuota->residencia_id=$request->get('residencia');
        $alicuota->update();
        return \redirect('alicuota')->with('success','Alicuota de '.$alicuota->nombre.' actualizada correctamente');
    }
    public function destroy(Alicuota $alicuota)
    {
        //
    }
}
