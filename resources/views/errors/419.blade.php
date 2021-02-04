@extends('errors::layout')
@section('title','419')
@section('message')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<img width="30%" height="30%" src="{{asset('img/magna.jpeg')}}" alt="">
<h1>'Su sesion ha expirado'</h1>
    <a href="{{url('/')}}" class="btn btn-primary">Dirijase Al Inicio de Sesion</a>
@endsection
    
 
