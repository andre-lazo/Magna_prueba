<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserFormEdit;
use App\Models\User;
use App\Models\Residencia;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContacto;
class UserController extends Controller

{
     public function __construct(){
         
        $this->middleware('auth');
     }
    public function index(Request $request)
    {
       
        $query=trim($request->get('search'));
         
        $data=DB::table('users')
        ->select('users.id','users.name','users.apellido','users.email','residencias.residencia_id')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('apellido','LIKE','%'.$query.'%')
        ->orderby('residencia_id','asc')
        ->get();
        return view('users.index',['users'=>$data,'search'=>$query]);
    }

  
    public function create()
    {
        $residencia=Residencia::all();
        return \view('users.create',['residencias'=>$residencia]);
    }

  
    public function store(UserFormRequest $request)
    {
        $this->validate(request(),['residencia'=>['required']]);
         $asunto="CREDENCIALES DE USUARIO";
        $usuario= new User();
        $usuario->name=strtoupper($request->get('name'));
        $usuario->email=$request->get('email');
        $usuario->password= bcrypt($request->get('password'));
        $usuario->cedula=$request->get('cedula');
        $usuario->residencia_id=$request->get('residencia');
        $usuario->apellido=strtoupper($request->get('apellido'));
        $usuario->rol=$request->get('rol');
       
        $correo="USUARIO: ".$usuario->email.' CONTRASEÑA TEMPORAL: '
        .$request->get('password');
        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= User::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$im>0){
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName());
                $usuario->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img_emprendedor',$file->getClientOriginalName().$contador);
                $usuario->imagen=$file->getClientOriginalName().$contador;
            }
           
        }

        $rol_numbre=0;
        if($usuario->rol=="cliente_master2"){
            $rol_numbre=8;
        }else{
            $rol_numbre=9;
        }
        $usuario->save();
        DB::table('role_user')->insert(
            array('role_id' => $rol_numbre, 'user_id' =>DB::table('users')->orderby('id', 'desc')->first()->id)
        );
        $usuario->assignRole($request->get($usuario->rol));
      
      // Mail::to($usuario->email)->send(new FormularioContacto($correo,$asunto));
        return redirect('/user')->with('success','Usuario '.$usuario->name.' Registrado correctamente');
    }

    public function show($id)
    {
       // $user=User::findOrFail();
        $data=DB::table('users')
        ->select('users.name','users.apellido','users.cedula','residencias.residencia_id','users.email'
        ,'users.updated_at')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('users.id','=',Crypt::decrypt($id))
        ->get();
        return \view('users.view',['user'=>$data->last()]);

    }

   
    public function edit($id)
    {
        $residencia=Residencia::all();
        $data=DB::table('users')
        ->select('users.id','users.name','users.apellido','users.cedula','residencias.residencia_id','users.email'
        ,'users.updated_at','users.imagen','users.residencia_id as usuario_residencia')
        ->join('residencias','users.residencia_id','residencias.id')
        ->where('users.id','=',Crypt::decrypt($id))
        ->get();

        return view('users.edit',['user'=> $data->last(),'residencias'=>$residencia]);
    }

    
    public function update(UserFormEdit $request, $id)
    { 
        $carbon_date = \Carbon\Carbon::now();
        $this->validate(request(),['email'=>['required','email','max:255','unique:users,email,'.$id]]);
        $this->validate(request(),['cedula'=>['required','max:10','min:10,'.$id]]);
        $this->validate(request(),['residencia'=>['required']]);
        $usuario=User::findOrFail($id); 
        $usuario->name=strtoupper($request->get('name'));
        $usuario->email=$request->get('email');
        $usuario->cedula=$request->get('cedula');
        $usuario->residencia_id=$request->get('residencia');
        $usuario->apellido=strtoupper($request->get('apellido'));
       
        
        if($request->hasFile('imagen'))
        {
           
            $file=$request->imagen;
            $im= User::all();  
            $contador=0;    
            foreach($im as $i){
                if(strpos($i, $file->getClientOriginalName()) !== false){$contador++;}
            }      
            if(!$im>0){
                $file->move(public_path() . '/img',$file->getClientOriginalName());
                $usuario->imagen=$file->getClientOriginalName();
            }else{
                $file->move(public_path() . '/img',$file->getClientOriginalName().$contador);
                $usuario->imagen=$file->getClientOriginalName().$contador;
            }
           
        }
        $pass=$request->get('password');
  
        if($pass != NULL){
            $this->validate(request(),['password'=>['max:255','min:6','confirmed']]);
          $usuario->password=bcrypt($request->get('password'));
          $usuario->created_at=$carbon_date;
          $usuario->updated_at=$carbon_date;
          $correo="USUARIO: ".$usuario->email.' CONTRASEÑA TEMPORAL: '
          .$request->get('password');
          Mail::to($usuario->email)->send(new FormularioContacto($correo,""));
        }
        else{
            unset($usuario->password);
        }
        $usuario->update();
       
      
        return redirect('/user')->with('success','Usuario '.$usuario->name.' Actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $usuario=User::findOrFail(Crypt::decrypt($id));
        $usuario->delete();
        return redirect('user')->with('success','Usuario '.$usuario->name.' Borrado correctamente');
    }
}
