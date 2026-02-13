@extends('layout.users.app')
@section('title')
    Invite and Earn
@endsection
@section('css')
    <style class="css">
      main{
        padding:0;
      }
      .relative-parent{
        padding:20px;
        width:100%;
        position:relative;
        background:var(--primary);
        padding-bottom:50px;
       

      }
      .absolute-child{
    position: absolute;
    left:20px;
    right:20px;
    border-radius:20px;
    top:calc(100% - 30px);
    background:white;
    padding:20px;
    display:flex;
    flex-direction:column;
    gap:20px;

      }
    </style>
@endsection
@section('main')
   <div class="relative-parent">
     {{-- HEADER --}}
        <div style="color:var(--primary-text)" class="w-full row align-center g-10 space-between">
             <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">Invite Friends</strong>
            <span>
            
            </span>
        </div>
        {{-- absolute child --}}
        <div class="absolute-child m-x-auto max-w-500">
            {{-- REFERRAL TOOLS --}}
            <strong class="desc">Your Referral Tools</strong>
            {{-- REFERRAL CODE --}}
            <div style="border:1px solid rgba(0,0,0,0.1);background:rgba(0,0,0,0.05)" class="g-10 align-center w-full br-5 p-10 column g-10">
                <span>Your Invite Code</span>
                {{-- INVITE CODE --}}
                <div style="border:1px solid rgba(0,0,0,0.1)" class="h-50 p-10 row space-between align-center w-full bg-light br-5">
                    <div class="w-full no-scrollbar overflow-hidden h-full row align-center">
                        <strong class="desc">{{ Auth::guard('users')->user()->uniqid }}</strong>
                    </div>
                    <span onclick="copy('{{ Auth::guard('users')->user()->uniqid }}')" class="c-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,32H163.74a47.92,47.92,0,0,0-71.48,0H56A16,16,0,0,0,40,48V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V48A16,16,0,0,0,200,32Zm-72,0a32,32,0,0,1,32,32H96A32,32,0,0,1,128,32Z"></path></svg>

                    </span>
                </div>
                <div onclick="copy('{{ Auth::guard('users')->user()->uniqid }}')" class="br-5 p-10 align-center no-select pointer justify-center row  w-full primary-text bg-primary">Copy Code</div>
            </div>
             {{-- REFERRAL LINK --}}
            <div style="border:1px solid rgba(0,0,0,0.1);background:rgba(0,0,0,0.05)" class="align-center w-full br-5 p-10 column g-10">
                <span>Your Invite Link</span>
                {{-- INVITE LINK --}}
                <div style="border:1px solid rgba(0,0,0,0.1)" class="h-50 g-10 p-10 row space-between align-center w-full bg-light br-5">
                    <div class="w-full no-scrollbar overflow-hidden h-full row align-center">
                        <span style="font-family:monospace" class="ws-nowrap">{{ url('register').'?ref='.Auth::guard('users')->user()->uniqid }}</span>
                    </div>
                    <span onclick="copy('{{ url('register').'?ref='.Auth::guard('users')->user()->uniqid }}')" class="c-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,32H163.74a47.92,47.92,0,0,0-71.48,0H56A16,16,0,0,0,40,48V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V48A16,16,0,0,0,200,32Zm-72,0a32,32,0,0,1,32,32H96A32,32,0,0,1,128,32Z"></path></svg>

                    </span>
                </div>
                <div onclick="copy('{{ url('register').'?ref='.Auth::guard('users')->user()->uniqid }}')" class="br-5 p-10 align-center no-select pointer justify-center row  w-full primary-text bg-primary">Copy Link</div>
            </div>
        </div>
       
   </div>
    {{-- MARGINALIZE --}}
        <div class="marginalize w-full">

        </div>
        {{-- BODY --}}
       <div class="column p-20 g-10">
        {{-- EARNING STRUCTURE --}}
         <div style="box-shadow:5px 5px rgba(0,0,0,0,0.1)" class="w-full m-x-auto max-w-500 br-10 bg-light column align-center g-10 p-10">
            <strong class="desc">Your Earnings Structure</strong>
            {{-- FIRST LEVEL --}}
            <div class="row align-center space-between g-10 p-10 w-full bg-primary-transparent br-5">
                <div style="color:orange" class="h-40 w-40 column justify-center align-center no-shrink circle bg-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm12,152a8,8,0,0,1-16,0V95l-11.56,7.71a8,8,0,1,1-8.88-13.32l24-16A8,8,0,0,1,140,80Z"></path></svg>
                    
                </div>
                <div class="column m-right-auto g-10">
                    <strong class="font-1">Direct Referrals (Level 1)</strong>
                    <span class="opacity-07">Friends who sign up using your link</span>
                </div>
                <div class="bg-primary h-fit w-fit primary-text column justify-center align-center bold br-1000 p-10">
                    {{ $referral_settings->first_level }}% Commission
                </div>
            </div>
             {{-- SECOND LEVEL --}}
            <div class="row align-center space-between g-10 p-10 w-full bg-primary-transparent br-5">
                <div style="color:silver" class="h-40 w-40 column justify-center align-center no-shrink circle bg-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm24,144a8,8,0,0,1,0,16H104a8,8,0,0,1-6.4-12.8l43.17-57.56a16,16,0,1,0-27.86-15,8,8,0,0,1-15.09-5.34,32,32,0,1,1,55.74,29.93L120,168Z"></path></svg>

                </div>
                <div class="column m-right-auto g-10">
                    <strong class="font-1">Secondary Referrals (Level 2)</strong>
                    <span class="opacity-07">Friends of your friends</span>
                </div>
                <div class="bg-primary h-fit w-fit primary-text column justify-center align-center bold br-1000 p-10">
                    {{ $referral_settings->second_level }}% Commission
                </div>
            </div>
        </div>
        {{-- HOW IT WORKS --}}
         <div style="box-shadow:5px 5px rgba(0,0,0,0,0.1)" class="w-full m-x-auto max-w-500 br-10 bg-light column align-center g-10 p-10">
            <strong class="desc">How it Works</strong>
            {{-- NEW ROW --}}
          <div class="w-full row g-10 align-center">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </span>
            <span>Share your invite code or link with friends</span>
          </div>
             {{-- NEW ROW --}}
          <div class="w-full row g-10 align-center">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </span>
            <span>Earn <strong>{{ $referral_settings->first_level }}% commission</strong> when your direct referrals invest</span>
          </div>
             {{-- NEW ROW --}}
          <div class="w-full row g-10 align-center">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </span>
            <span>Earn <strong>{{ $referral_settings->second_level }}% commission</strong> when their referrals invest</span>
          </div>
            {{-- NEW ROW --}}
          <div class="w-full row g-10 align-center">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </span>
            <span>Earnings are creditted immediately after investment</span>
          </div>
            
        </div>
       </div>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Style : function(){
                document.querySelector('.marginalize').style.height=(Math.abs(document.querySelector('.relative-parent').getBoundingClientRect().bottom - document.querySelector('.absolute-child').getBoundingClientRect().bottom) + 20 ) +'px';
            }
        }
        MyFunc.Style();
    </script>
@endsection