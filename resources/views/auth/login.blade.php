<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGNA</title>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('fonts/style.css')}}">
     <style>
         body{
            background: url({{asset('img/entrada.jpeg')}}) no-repeat center center  fixed;
            font-family: 'Titillium Web', sans-serif;
            background-size: cover; 
         }
         #contenedor{
             padding-top:50px; 
           
         }
         
     </style>
</head>
<body>
    <div class="row mx-auto " id="contenedor" style="width: 700px; opacity: 90%;">
        
        <div class="col-xs-12 col-lg-6  mt-4 bg-white "  id="logo"  >
            <img class="mt-5 pt-5" src="{{asset('img/magna.jpeg')}}" width="100%">   
        </div>
    
        <div class="col-xs-12 col-lg-6 bg-secondary mt-4">
           
            <x-guest-layout>
              
                  
                  <center><h1 class="mb-3 mt-5" style="font-size:30px">LOGIN</h1>
                  
            
                    <x-jet-validation-errors class="mb-4" />
            
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <div>
                            <span class="icon-user" style="font-size: 30px"></span>  <x-jet-label for="email" style="font-size: 20px" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="example@gmail.com" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="mt-4">
                            <span class="icon-key" style="font-size: 30px"></span>
                            <x-jet-label for="password" style="font-size: 20px" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>
            
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div style="font-size: 15px" class=" mt-4 mb-3 btn btn-warning">
                            <x-jet-button>
                                {{ __('Login') }}
                            </x-jet-button>
                        </div><br>
                      
                          
                        </center>
                    </form>
              
            </x-guest-layout>
            
        </div>
    </div>
  
</body>
</html>