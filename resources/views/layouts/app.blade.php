<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
   
    @include('layouts/css')
    @yield('css')

    @include('layouts/script')
    @yield('js')
</head>
<body>
    @if(Auth::user())
    @include('layouts/navbar')
    @endif
    <div class="wrapper">
      <div class="container">

  <input type="hidden" id="base_url" value="{{url('/')}}">
    
      <section class="conent">
         @if(Session::has('flash_message'))
         <div class="alert alert-success session_messages" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon fas fa-check"></i>
              {{ Session::get('flash_message') }}
         </div>
         @endif
          @if(Session::has('error_message'))
          <div class="alert alert-danger session_messages" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon fas fa-ban"></i>
              {{ Session::get('error_message') }}
         </div>
         @endif
      </section>
    
        @yield('content')
     

    
     </div>
 </div>
</body>
</html>
