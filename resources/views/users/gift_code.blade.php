@extends('layout.users.app') 
@section('title')
   Gift Code
@endsection
@section('css')
    <style class="css">
    main{
        padding:0;
    }
    .relative-parent{
        position:relative;
        padding-bottom:50px;
    }
      .absolute-child{
        position:absolute;
        left:20px;
        right:20px;
        top:calc(100% - 30px);
        padding:10px;
        background:white;
        box-shadow:5px 5px 5px rgba(0,0,0,0.1);
        border-radius:10px;
        display:flex;
        flex-direction:column;
        gap:10px;


      }
    </style>
@endsection
@section('main')
   <section class="w-full column g-10">
    <div class="w-full relative-parent bg-primary primary-text column p-20 g-10">
       {{-- HEADER --}}
        <div class="w-full row align-center g-10 space-between">
             <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">Gift Code</strong>
            <span>
             
            </span>
        </div>
      
        {{-- ABSOLUTE CHILD --}}
        <form method="Post" onsubmit="PostRequest(event,this,MyFunc.Completed)" action="{{ url('users/post/gift/code/process') }}" style="color:var(--text)" class="max-w-500 m-x-auto absolute-child">
            {{-- csrf token  --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
            <label for="">Gift Code</label>
            <div style="border:1px solid rgba(0,0,0,0.3)" class="cont w-full br-10 bg-transparent">
                <input type="text" name="code" placeholder="Enter Gift Code" class="w-full required inp input h-full bg-transparent border-none">
            </div>
            {{-- FEE BREAKDOWN --}}
            <div style="background:rgb(218, 165, 32,0.3);color:rgb(83, 64, 15);border:1px solid rgb(90, 69, 17)" class="w-full br-10 p-10 align-center row g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M108,84a16,16,0,1,1,16,16A16,16,0,0,1,108,84Zm128,44A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Zm-72,36.68V132a20,20,0,0,0-20-20,12,12,0,0,0-4,23.32V168a20,20,0,0,0,20,20,12,12,0,0,0,4-23.32Z"></path></svg>

                <span>You can only use a code once</span>
            </div>
            <button class="post">Redeem code</button>
        </form>
    </div>
    {{-- Marginalize --}}
    <div class="marginalize w-full">

    </div>
   {{-- body --}}
   <div class="column p-20 g-20">
    
     {{-- INFO --}}
     <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="w-full  max-w-500 m-x-auto bg-light br-10 column p-20 g-10">
        <strong class="desc">Gift Code guide</strong>
       
        
         <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Enter gift code in the input above</span>
        </div>
         
         <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>You can only use a code once</span>
        </div>
         <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Your wallet is creditted instantly upon redeeming a code.</span>
        </div>
        <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Stay active on the platforms group and community to get new codes from platform administrators.</span>
        </div>
      

    </div>
   </div>
   </section>
@endsection
@section('js')
<script class="js">
    window.MyFunc = {
        Style : function(){
        
              document.querySelector('.marginalize').style.height=(Math.abs(document.querySelector('.relative-parent').getBoundingClientRect().bottom - document.querySelector('.absolute-child').getBoundingClientRect().bottom) + 10) + 'px';

         
        },
        Completed : function(response,event){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                spa(event,'{{ url('users/transactions') }}');
            }


        }

    }
    MyFunc.Style();
</script>
@endsection