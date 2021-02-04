<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use Illuminate\Http\Request;

class SugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      

        return view('sugerencias.index',
        ['sugerencias'=>Sugerencia::all()->where('id_usuario',$request->user()->id)]);
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
       
        $this->validate(request(),['titulo'=>['required','unique:sugerencias']]);
        $this->validate(request(),['descripcion'=>['required']]);
        


        $sugerencia= new Sugerencia();
        $sugerencia->id_usuario=$request->user()->id;
        $sugerencia->estado='pendiente';
        $sugerencia->titulo=$request->get('titulo');
        $sugerencia->descripcion=$request->get('descripcion');
       
       
        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= Sugerencia::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$im>0){
                $file->move(public_path() . '/img_sugerencia',$file->getClientOriginalName());
                $sugerencia->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img_sugerencia',$file->getClientOriginalName().$contador);
                $sugerencia->imagen=$file->getClientOriginalName().$contador;
            }
           
        }
        $sugerencia->save();
       
      
       
        return redirect('/sugerencias')->with('success','Sugerencia '.$sugerencia->titulo.' Registrada correctamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function show(Sugerencia $sugerencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Sugerencia $sugerencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sugerencia $sugerencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sugerencia=Sugerencia::findOrFail($id);
        $sugerencia->delete();
        return redirect('/sugerencias')->with('success','Sugerencia '.$sugerencia->titulo.' Borrada correctamente');
    }
}
