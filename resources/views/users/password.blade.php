@extends('layout.users.app')
@section('css')
    <style class="css">
       main{
        padding:0;
       } 
       .cont{
        border:1px solid rgba(0,0,0,0.1) !important;
        background:transparent !important;
        border-radius:5px !important;
       }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- HEADER --}}
        <div class="w-full bg-primary primary-text no-select p-20 row align-center space-between g-10">
            <span onclick="spa(event,'{{ url('users/profile') }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">Change Password</strong>
            <span></span>
        </div>
        {{-- BODY --}}
        <div class="body p-10 column g-10">
             <form action="{{ url()->to('users/post/password/update') }}" onsubmit="PostRequest(event,this,MyFunc.Updated)" method="POST" class="column c-text w-full p-10 max-w-500 m-x-auto g-10">
            <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
           {{-- NEW INPUT --}}
           <div class="column g-5">
             <label for="">Current Password</label>
             <div class="cont br-0 required">
                <input name="current" type="password" placeholder="Enter Current Password" class="inp required input">
              
            </div>
           </div>

            {{-- NEW INPUT --}}
           <div class="column g-5">
              <label for="">New Password</label>
             <div class="cont br-0 required">
                <input name="new" type="password" placeholder="Enter New Password" class="inp required input">
               
            </div>
           </div>

            {{-- NEW INPUT --}}
           <div class="column g-5">
             <label for="">Confirm New Password</label>
            <div class="cont br-0 required">
                <input name="confirm" type="password" placeholder="Confirm New Password" class="inp required input">
                
            </div>
           </div>
            <button class="post"><div class="content">Update Account Password</div></button>
        </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Updated : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,'{{ url('users/profile') }}')
                }
            }
        }
    </script>
@endsection