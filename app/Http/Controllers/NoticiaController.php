<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Http\Requests\NoticiaRequest;
class NoticiaController extends Controller
{
    public function __construct(){
         
        $this->middleware('auth');
     }
    public function index()
    {
        $noticia=Noticia::all();
       $noticia= $noticia->sortByDesc('id');
        return view('noticias.index',['noticias'=>$noticia]);
    }

    public function create()
    {
        return \view('noticias.create');
    }

    
    public function store(NoticiaRequest $request)
    {
        $noticia= new Noticia();
        $noticia->titulo=$request->get('titulo');
        $noticia->contenido_previo=$request->get('previo');
        $noticia->contenido_completo=$request->get('completo');
       
        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= Noticia::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$im>0){
                $file->move(public_path() . '/img',$file->getClientOriginalName());
                $noticia->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img',$file->getClientOriginalName().$contador);
                $noticia->imagen=$file->getClientOriginalName().$contador;
            }
           
        }
      $noticia->save();
      return redirect('/noticia')->with('success','Noticia Registrada correctamente');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        $noticia=Noticia::findOrFail($id);
        $noticia->delete();
        return redirect('noticia')->with('success','Noticia borrada correctamente');
    }
}
