<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class Noticia_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticia=Noticia::all();
        $noticia= $noticia->sortByDesc('id');
        return view('user_cliente.noticia',['noticias'=>$noticia]);
    }

   
}
