<?php

namespace App\Http\Controllers;
use App\Models\Cancha;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class CanchasController extends Controller
{
    public function index(Request $request)
    {
        $canchas= Cancha::all()->where('id_usuario','=',$request->user()->id);   
        $canchas=$canchas->sortByDesc('id');

        return view('canchas.index', ['canchas'=>$canchas]);
    }

    
    public function create(Request $request)
    {
        $data=DB::table('canchas')
        ->select( 'canchas.start','residencias.id')
        ->join('users','users.id','canchas.id_usuario')
        ->join('residencias','users.residencia_id','residencias.id')    
        ->get();
        $bool1=false;   
        $bool2=false;   
        $bool3=false;   
        $bool4=false;   
        $bool5=false;   
        $bool6=false;   
        $bool7=false;   
        $bool8=false;   
        $bool9=false;   
        $bool10=false;   
        $arreglo= array();
        $hora=$request->get('txtFecha');
        $canchas=Cancha::all();
      foreach($canchas as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Cancha();
            $a=$item;
            array_push($arreglo,$a);
            if($a->hora=='17 pm - 18 pm'){$bool10=true;}
            if($a->hora=='08 am - 09 am'){$bool1=true;}
            if($a->hora=='09 am - 10 am'){$bool2=true;}
            if($a->hora=='10 am - 11 am'){$bool3=true;}
            if($a->hora=='11 am - 12 pm'){$bool4=true;}
            if($a->hora=='12 pm - 13 pm'){$bool5=true;}
            if($a->hora=='13 pm - 14 pm'){$bool6=true;}
            if($a->hora=='14 pm - 15 pm'){$bool7=true;}
            if($a->hora=='15 pm - 16 pm'){$bool8=true;}
            if($a->hora=='16 pm - 17 pm'){$bool9=true;}
          }
      }
      
      $i=0;
    foreach($data as $item){
        if($item->id==$request->user()->residencia_id&&$item->start==$hora." 00:00:00"){
            $i++;
        }
    }
    $todo=false;
    if($bool1==true&&$bool2==true&&$bool3==true&&
       $bool4==true&&$bool5==true&&$bool6==true&&
       $bool7==true&&$bool8==true&&$bool9==true&&
       $bool10==true
       ){
        $todo=true;
    }
      if(!$todo){
      if($i<2){
      return view('canchas.create',['arreglo'=>$arreglo,
      'hora1'=>$bool1,
      'hora2'=>$bool2,
      'hora3'=>$bool3,
      'hora4'=>$bool4,
      'hora5'=>$bool5,
      'hora6'=>$bool6,
      'hora7'=>$bool7,
      'hora8'=>$bool8,
      'hora9'=>$bool9,
      'hora10'=>$bool10,
      'fecha'=>$hora
      ]);
    }else{
          return redirect('/canchas')->with('warning','ESTA VILLA NO PUEDE RESERVAR MAS DE DOS VECES POR DÍA LA CANCHA!!!');
      }}else{
        return redirect('/canchas')->with('warning','LO SENTIMOS NO QUEDAN MAS HORAS DISPONIBLES PARA RESERVAR EN ESTE DIA');

      }
    }
  
    public function store(Request $request)
    {
        $this->validate(request(),['hora'=>['required']]);

        $cancha = new Cancha();
        $cancha->title =request('hora');
        $cancha->hora = request('hora');
        $cancha->visi1 = request('visi1');
        $cancha->pare1 = request('parent1');
        $cancha->visi2 = request('visi2');
        $cancha->pare2 = request('parent2');
        $cancha->visi3 = request('visi3');
        $cancha->pare3 = request('parent3');
        $cancha->visi4 = request('visi4');
        $cancha->pare4 = request('parent4');
        $cancha->visi5 = request('visi5');
        $cancha->pare5 = request('parent5');
        $cancha->visi6 = request('visi6');
        $cancha->pare6 = request('parent6');
        $cancha->visi7 = request('visi7');
        $cancha->pare7 = request('parent7');
        $cancha->color = '#0000FF';
        $cancha->textColor = '#FFFFFF';
        $cancha->start = request('txtFecha');
        $cancha->end = request('txtFecha');
        $cancha->id_usuario=request('id');
        $cancha->save();


        return redirect('canchas')->with('success','Reservacion realizada con exito');
        
    }

    public function show(Request $request)
    {
        $canchas= Cancha::all();
        $data['canchas'] =$canchas;
        return response()->json($data['canchas']);
        
       

    }


    public function downloadPDF($id){
        $cancha = Cancha::findOrFail($id);
        $pdf = PDF::loadView('eventos2', ['canchas'=>$cancha]);
        //dd($pdf); 
        //return $pdf->download('cedula2.pdf');
        return redirect('canchas');
    }

    public function edit($id,Request $request)
    {
        $alberca = Cancha::findOrFail($id);
        $data=DB::table('residencias')
        ->select('manzana','villa')
        ->where('residencias.id','=',$request->user()->residencia_id)
        ->get();
        $cedula=$request->user()->cedula;
        $locacion='Cancha Cemento 1';
        $pdf = PDF::loadView('Reservaciones', ['albercas'=>$alberca,'manzana'=>$data->last()->manzana,
        'villa'=>$data->last()->villa,
        'cedula'=>$cedula,
        'locacion'=>$locacion]);
         return $pdf->download('Reservacion.pdf');
    }

 
    public function update(Request $request, $id)
    {
        $datosCancha = request()->except(['_token', '_method']);
        $respuesta = Cancha::where('id','=', $id)->update($datosCancha);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $canchas = Cancha::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Cancha::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('canchas')->with('success','Reservacion eliminada con exito');
    }

}
