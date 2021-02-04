<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Residencia;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\UserFormEdit;
use Illuminate\Support\Facades\Hash;
class ConfiguracionController extends Controller
{
    public function index(Request $request)
    {
        $users=User::where('id','=',$request->user()->id)->first();
        $residencias=Residencia::where('id','=',$request->user()->residencia_id)->first();
            return view('configuracion_user.configuracion',['user'=>$users],['residencias'=>$residencias]);
        }
    
    public function show($id)
    {
        $user=User::findOrFail(Crypt::decrypt($id));
        return view('configuracion_user.configuracion',['user'=>$user]);

    }
    public function update(UserFormEdit $request, $id)
    {

        $pass= $request->user()->password;
        $p=$request->get('passwordA');
        $this->validate(request(),['email'=>['required','email','max:255','unique:users,email,'.$id]]);
       
        $this->validate(request(),['cedula'=>['required','max:10','min:10','unique:users,cedula,'.$id]]);
        $usuario=User::findOrFail($id); 
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->cedula=$request->get('cedula');
        $usuario->residencia_id=$request->get('residencia');
        $usuario->apellido=$request->get('apellido');
     
        if (Hash::check($p, $pass)){
            $this->validate(request(),['password'=>['max:255','min:6','confirmed']]);
            $usuario->password=bcrypt($request->get('password'));
            $usuario->update();
            return redirect('/index')->with('success','Usuario '.$usuario->name.' Actualizado correctamente');
        }
        else{
        return redirect('/configuracion_cliente')->with('warning' ,'La contraseña actual no es correcta');
    }
}

}
