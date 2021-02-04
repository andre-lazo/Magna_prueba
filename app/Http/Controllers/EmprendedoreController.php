<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmprendedoresRequest;
use App\Models\Emprendedore;
use Illuminate\Http\Request;

class EmprendedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('search'));
            $emprendedores=Emprendedore::all()->where('categoria','=',$query);
        }
        if($request->get('search')==""){
            $emprendedores=Emprendedore::all();
        }
        $emprendedores= $emprendedores->sortByDesc('id');
        $mano=array();
        $restaurante=array();
        $limpieza=array();
        $tecnologia=array();
        $articulos=array();
        $market=array();
        $bisuteria=array();
        $ropa=array();
        $farmacia=array();
        $entretenimiento=array();
        $fitneess=array();
        $deporte=array();
        $licorera=array();
        $bazar=array();
        $belleza=array();
        $servicios=array();
       
        foreach($emprendedores as $item){
            if($item->categoria=='MANO DE OBRA'){array_push($mano,$item);}
            if($item->categoria=='RESTAURANTE'){array_push($restaurante,$item);}
            if($item->categoria=='LIMPIEZA'){array_push($limpieza,$item);}
            if($item->categoria=='TECNOLOGIA'){array_push($tecnologia,$item);}
            if($item->categoria=='ARTÍCULOS DEL HOGAR'){array_push($articulos,$item);}
            if($item->categoria=='MINI MARKET'){array_push($market,$item);}
            if($item->categoria=='BISUTERÍA'){array_push($bisuteria,$item);}
            if($item->categoria=='ROPA'){array_push($ropa,$item);}
            if($item->categoria=='FARMACEUTICA'){array_push($farmacia,$item);}
            if($item->categoria=='ENTRETENIMIENTO'){array_push($entretenimiento,$item);}
            if($item->categoria=='FITNEESS'){array_push($fitneess,$item);}
            if($item->categoria=='DEPORTE'){array_push($deporte,$item);}
            if($item->categoria=='LICORERÍA'){array_push($licorera,$item);}
            if($item->categoria=='BAZAR'){array_push($bazar,$item);}
            if($item->categoria=='ARTICULOS DE BELLEZA'){array_push($belleza,$item);}
            if($item->categoria=='SERVICIOS'){array_push($servicios,$item);}
          
        }
        $emprendedores= $emprendedores->sortByDesc('updated_at');
        return view('emprendedores.publicidad',['emprendedores'=>$emprendedores,
        'mano'=>$mano,
        'limpieza'=>$limpieza,
        'restaurante'=>$restaurante,
        'tecnologia'=>$tecnologia,
        'articulos'=>$articulos,
        'market'=>$market,
        'bisuteria'=>$bisuteria,
        'ropa'=>$ropa,
        'farmacia'=>$farmacia,
        'entretenimiento'=>$entretenimiento,
        'fitneess'=>$fitneess,
        'deporte'=>$deporte,
        'licorera'=>$licorera,
        'bazar'=>$bazar,
        'belleza'=>$belleza,
        'servicios'=>$servicios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $emprendedores=Emprendedore::all()->where('id_usuario','=',$request->user()->id);
        $emprendedores= $emprendedores->sortByDesc('updated_at');
        return view('emprendedores.index',['emprendedores'=>$emprendedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmprendedoresRequest $request)
    {
        $this->validate(request(),['titulo'=>['required','unique:emprendedores']]);
        $this->validate(request(),['descripcion'=>['required']]);
        $this->validate(request(),['imagen'=>['required']]);
        


        $emprendedor= new Emprendedore();
        $emprendedor->id_usuario=$request->user()->id;
        $emprendedor->categoria=$request->get('categoria');
        $emprendedor->titulo=$request->get('titulo');
        $emprendedor->descripcion=$request->get('descripcion');
        $emprendedor->valor=$request->get('valor');
        $emprendedor->telefono=$request->get('telefono');

        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= Emprendedore::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$contador>0){
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName());
                $emprendedor->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName().$contador);
                $emprendedor->imagen=$file->getClientOriginalName().$contador;
            }
           
        }
       
        $emprendedor->save();
       
      
       
        return redirect('/emprendedores/create')->with('success','Pubicacion '.$emprendedor->titulo.' Registrada correctamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprendedore  $emprendedore
     * @return \Illuminate\Http\Response
     */
    public function show(Emprendedore $emprendedore)
    {
        //
    }

  
    public function edit(Emprendedore $emprendedore)
    {
        //
    }

    public function update(EmprendedoresRequest $request,$id)
    { 
        $this->validate(request(),['titulo'=>['required']]);
        $this->validate(request(),['descripcion'=>['required']]);
        
        


        $emprendedor=Emprendedore::findOrFail($id);
        $emprendedor->categoria=$request->get('categoria');
        $emprendedor->titulo=$request->get('titulo');
        $emprendedor->descripcion=$request->get('descripcion');
        $emprendedor->valor=$request->get('valor');
        $emprendedor->telefono=$request->get('telefono');

       
        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= Emprendedore::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$contador>0){
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName());
                $emprendedor->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName().$contador);
                $emprendedor->imagen=$file->getClientOriginalName().$contador;
            }
           
        }
       
        $emprendedor->update();
       
      
       
        return redirect('/emprendedores/create')->with('success','Pubicacion '.$emprendedor->titulo.' Actualizada correctamente');
   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emprendedore  $emprendedore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
     $emprendedores = Emprendedore::findOrFail($id);
    $emprendedores->delete();
     return redirect('emprendedores/create')->with('success','Publicidad borrado con exito');
    }
}
