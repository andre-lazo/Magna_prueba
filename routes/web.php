<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

  


Route::get('/', function (Request $request) {
    
        if(Auth::guest()){
        return view('auth.login');
    }
        if(Auth::user()){
        $role=Role::all();
        foreach($role as $rol){
            if($rol->name==Auth::user()->rol){
                $name_rol=$rol->name;
            }
        }
        if ($name_rol=="admin2") {
            return redirect('/user')->with('success','Bienvenido Usuario '.Auth::user()->name);
        } 
        if($name_rol=="cliente2"|| $name_rol=="cliente_master2")
       if(Auth::user()->created_at!=Auth::user()->updated_at){

        return redirect('/index')->with('success','Bienvenido Usuario '.Auth::user()->name);
    }
        else{
            return redirect('/configuracion_cliente')->with('warning','PORFAVOR ACTUALICE SU CONTRASEÑA ');
        }
        }
    });
    Route::get('/logout', function () {
        return redirect('/');
    });

   


 
   
    Route::group(['middleware' => ['role:admin2','permission:vistas_admin2']], function () {
    Route::resource('noticia', 'App\Http\Controllers\NoticiaController');
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('alicuota', 'App\Http\Controllers\AlicuotaController');
    Route::resource('evento', 'App\Http\Controllers\EventoController');
    Route::resource('alberca', 'App\Http\Controllers\Alberca_adminController');
    Route::resource('campo', 'App\Http\Controllers\Campos_adminController');
    Route::resource('cancha1', 'App\Http\Controllers\Cancha1_adminController');
    Route::resource('cancha2', 'App\Http\Controllers\Cancha2_adminController');
    Route::resource('sugerencia', 'App\Http\Controllers\Sugerencia_adminController');
    Route::resource('emprendedor', 'App\Http\Controllers\Emprendedores_adminController');

       });
        
    Route::group(['middleware' => ['role:cliente2|cliente_master2']], function () {
        
    Route::get('/index', function () {
         return view('user_cliente.index');
        });
    Route::get('/normas', function () {return view('user_cliente.normas');});
    Route::resource('noticia_cliente', 'App\Http\Controllers\Noticia_userController');
    Route::resource('alicuota_cliente', 'App\Http\Controllers\Alicuota_userController');
    Route::resource('user_cliente', 'App\Http\Controllers\User_clienteController');
    Route::resource('eventos', 'App\Http\Controllers\EventosController');
    Route::resource('canchas', 'App\Http\Controllers\CanchasController');
    Route::resource('albercas', 'App\Http\Controllers\AlbercasController');
    Route::resource('campos', 'App\Http\Controllers\CamposController');
    Route::resource('futbols', 'App\Http\Controllers\FutbolsController');
    Route::resource('configuracion_cliente', 'App\Http\Controllers\ConfiguracionController');
    Route::resource('sugerencias', 'App\Http\Controllers\SugerenciaController');
    Route::resource('emprendedores', 'App\Http\Controllers\EmprendedoreController');

           });
    