 @extends('layout.users.auth')
 @section('title')
     Login
 @endsection 
 @section('main')
     <section class="justify-center form-house column w-full">
    <div class="logo-house">
      <img class="h-70" src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" alt="">
    </div>
    {{-- FORM AND OTHERS GROUP --}}
    <div class="column w-full g-10 p-10">
       <form method="POST" action="{{ url('users/post/login/process') }}" onsubmit="PostRequest(event,this,call_back)" style="margin-top:20px" action="" class="w-full column g-10">
    {{-- TITLE --}}
    <strong class="desc m-x-auto">Login</strong>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
       
      
       {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Username or Mobile</label>
          <div class="cont br-0 required row">
            <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="id" type="text" placeholder="Username or Mobile Number">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      </div>
       
       {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
         <label>Account Password</label>
        <div class="cont br-0 row">
            <input autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="password" type="password" placeholder="Password">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      </div>
      <button class="post pointer bold select-none top-10"><div class="content">Login Safely</div></button>
    <div  class="row g-10 m-x-auto top-10 bottom-10">
       <span>
       Dont have an account? <a href="{{ url('register') }}" class="c-primary font-1 no-u m-left-auto select-none">Create One</a>
        
      </span> 
    </div>
    </form>
    
    </div>
    <div style="background:var(--bg);border-top:1px solid rgba(0,0,0,0.2)" class="w-full p-20 column g-10 justify-center align-center">
      <span class="font-1">&copy;{{ now()->year }} {{ config('app.name') }}</span>
    </div>
     </section>
 @endsection
 @section('js')
     <script class="js">
      window.MyFunc=function(){
        window.call_back=function(response){
          if(JSON.parse(response).status == 'success'){
            window.location.href=JSON.parse(response).url;
          }
        }
      }
      MyFunc();
     </script>
 @endsection