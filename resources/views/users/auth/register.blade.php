 @extends('layout.users.auth')
 @section('title')
     Register
 @endsection
 @section('main')
     <section class="justify-center max-w-500 m-x-auto form-house column w-full p-10">
    <div class="logo-house">
      <img class="h-70" src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" alt="">
    </div>
      {{-- FORM AND OTHERS GROUP --}}
    <div class="column w-full g-10 p-10">
     <form method="POST" action="{{ url('users/post/register/process') }}" onsubmit="PostRequest(event,this,call_back)" style="margin-top:20px" action="" class="w-full column g-10">
    {{-- TITLE --}}
    <strong class="desc m-x-auto">Create Account</strong>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
       
        
           {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Phone Number</label>
         <div class="cont br-0 required row">
          <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="mobile" type="number" placeholder="Mobile Number">
              @include('components.sections',[
          'required' => true
        ])
      </div>
      </div>
      
         {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Username</label>
       <div class="cont br-0 required row">
         <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="username" type="text" placeholder="Username">
    @include('components.sections',[
          'required' => true
        ])
       </div>
      </div>
         
         {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Full Name</label>
        <div class="cont br-0 required row">
            <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="name" type="text" placeholder="Full Name">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      </div>
       
      
    
         {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Referral Code (Optional)</label>
       <div class="cont br-0 required row">
             <input class="input inp" value="{{ $ref ?? '' }}" name="ref" type="text">
              
        </div>
      </div>
     
        
         {{-- NEW INPUT GROUP --}}
      <div class="w-full column g-5">
        <label>Password</label>
        <div class="cont br-0 required row">
             <input autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="password" type="password" placeholder="Password">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      </div>
      <button class="post pointer select-none bold font-1 top-10"><div class="content">Register Now</div></button>
     <div class="row g-10 m-x-auto top-10 bottom-10">
      <span>
       Already Have an Account?
      </span>
       <a href="{{ url('login') }}" class="c-primary select-none font-1 no-u">Login</a>
     
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