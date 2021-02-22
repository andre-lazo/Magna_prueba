<?php

namespace App\Http\Controllers;
use App\Models\Futbol;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class FutbolsController extends Controller
{
    public function index(Request $request)
    {
       
        $futbols= Futbol::all()->where('id_usuario','=',$request->user()->id);   ;
        $futbols=$futbols->sortByDesc('id');

        return view('futbols.index', ['futbols'=>$futbols]);
    }

    
    public function create(Request $request)
    { 
        $data=DB::table('futbols')
        ->select( 'futbols.start','residencias.id')
        ->join('users','users.id','futbols.id_usuario')
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
        $futbols=Futbol::all();
      foreach($futbols as $item){
          if($item->start==$hora. ' 00:00:00')
          {
            $a= new Futbol();
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
      return view('futbols.create',['arreglo'=>$arreglo,
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
          return redirect('/futbols')->with('warning','ESTA VILLA NO PUEDE RESERVAR MAS DE DOS VECES POR DÍA LA CANCHA!!!');
      }}else{
        return redirect('/futbols')->with('warning','LO SENTIMOS NO QUEDAN MAS HORAS DISPONIBLES PARA RESERVAR EN ESTE DIA');

      }
    }

  
    public function store()
    {
        $this->validate(request(),['hora'=>['required']]);

        $futbol = new Futbol();
        $futbol->title =request('hora');
        $futbol->hora = request('hora');
        $futbol->visi1 = request('visi1');
        $futbol->pare1 = request('parent1');
        $futbol->visi2 = request('visi2');
        $futbol->pare2 = request('parent2');
        $futbol->visi3 = request('visi3');
        $futbol->pare3 = request('parent3');
        $futbol->visi4 = request('visi4');
        $futbol->pare4 = request('parent4');
        $futbol->visi5 = request('visi5');
        $futbol->pare5 = request('parent5');
        $futbol->visi6 = request('visi6');
        $futbol->pare6 = request('parent6');
        $futbol->visi7 = request('visi7');
        $futbol->pare7 = request('parent7');
        $futbol->color = '#0000FF';
        $futbol->textColor = '#FFFFFF';
        $futbol->start = request('txtFecha');
        $futbol->end = request('txtFecha');
        $futbol->id_usuario=request('id');
        $futbol->save();

        return redirect('futbols')->with('success','Reservacion realizada con exito');

        
    }

    public function show(Request $request)
    {
        $futbols= Futbol::all();

        $data['futbols'] =$futbols;
        return response()->json($data['futbols']);

         
      
    }
   


   

    public function edit($id,Request $request)
    {
       
        $alberca = Futbol::findOrFail($id);
    $data=DB::table('residencias')
    ->select('manzana','villa')
    ->where('residencias.id','=',$request->user()->residencia_id)
    ->get();
    $cedula=$request->user()->cedula;
    $locacion='Cancha de Cesped';
    $pdf = PDF::loadView('Reservaciones', ['albercas'=>$alberca,'manzana'=>$data->last()->manzana,
    'villa'=>$data->last()->villa,
    'cedula'=>$cedula,
    'locacion'=>$locacion]);
        return $pdf->download('Reservacion.pdf');
    }
 
    public function update(Request $request, $id)
    {
        $datosFutbol = request()->except(['_token', '_method']);
        $respuesta = Futbol::where('id','=', $id)->update($datosFutbol);    

        return response()->json($respuesta);
    }


    public function destroy($id)
    {
        //RECUPERAMO LOS ELEMENTOS EN EVENTOS
        $futbols = Futbol::findOrFail($id);
        //LUEGO DESTRUIMOS 
        Futbol::destroy($id);
        //RETORNA QUE SE ELIMINA
        return redirect('futbols')->with('success','Reservacion eliminada con exito');
    }
}
