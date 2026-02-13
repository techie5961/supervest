@extends('layout.users.app') 
@section('title')
    Deposit
@endsection
@section('css')
    <style class="css">
        body{
         
            overflow:auto !important;
        }
       main{
        padding:0;
       }
       .parent{
        position:relative;
        padding-bottom:70px;
       }
       .absolute-child{
        position:absolute;
        top:80%;
        left:20px;
        right:20px;
        color:var(--text);
       }
      
    </style>
@endsection
@section('main')
   <section class="w-full section">
    <div class="w-full parent p-20 column g-10 primary-text bg-primary">
        {{-- HEADER --}}
        <div class="w-full row align-center g-10 space-between">
             <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">Deposit Funds</strong>
            <span onclick="spa(event,'{{ url('users/transactions?type=deposit') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M140,80v41.21l34.17,20.5a12,12,0,1,1-12.34,20.58l-40-24A12,12,0,0,1,116,128V80a12,12,0,0,1,24,0ZM128,28A99.38,99.38,0,0,0,57.24,57.34c-4.69,4.74-9,9.37-13.24,14V64a12,12,0,0,0-24,0v40a12,12,0,0,0,12,12H72a12,12,0,0,0,0-24H57.77C63,86,68.37,80.22,74.26,74.26a76,76,0,1,1,1.58,109,12,12,0,0,0-16.48,17.46A100,100,0,1,0,128,28Z"></path></svg>

            </span>
        </div>
        {{-- DEPOSIT BALANCE --}}
        <div style="background:rgba(255,255,255,0.4);box-shadow:0 5px 5px rgba(0,0,0,0.1)" class="w-full p-20 column br-10">
            <span class="font-1">Deposit Balance</span>
            <strong style="font-size:2rem;">&#8358;{{ number_format(Auth::guard('users')->user()->deposit) }}</strong>
        </div>
      
        {{-- ABSOLUTE CHILD 1 FOR FORM --}}
      <div class="p-20 column g-10 form-house absolute-child br-10 bg-light">
      {{-- AMOUNT LABEL --}}
        <div class="row font-1 align-center">
            Deposit Amount <span>(Minimum &#8358;{{ number_format($auto[0]->price,2) }})</span>
        </div>
        {{-- AMOUNT INPUT --}}
        <div style="border:1px solid rgba(0,0,0,0.3)" class="cont w-full border-1 h-50 br-5 row align-center">
          <div class="h-full column align-center justify-center perfect-square">
              <strong class="c-primary desc">
                &#8358;
            </strong>
          </div>
           <input type="number" name="amount" placeholder="Enter Amount" class="w-full h-full border-none br-inherit">
        </div>
        {{-- QUICK SELECT --}}
        <span class="desc">Quick Select</span>
        <div class="grid w-full grid-3 g-10 place-center">
            @foreach ($auto as $data)
            {{-- SELECTORS LOOP IN QUICK SELECT --}}
            <div onclick="MyFunc.QuickSelect('{{ $data->price }}')" style="border:1px solid rgba(0,0,0,0.4)" class="w-full no-select pc-pointer br-10 p-10 column justify-center">
                &#8358;{{ number_format($data->price,2) }}
            </div>
                
            @endforeach
        </div>
        <button onclick="MyFunc.CompleteDeposit(document.querySelector('input[name=amount]').value)" class="post">Deposit Now</button>
      </div>
     
    
    </div>
     {{-- MARGINALIZE --}}
      <div class="marginalize"></div>
    <div class="column w-full g-10 p-20">
          {{-- IMPORTANT INFORMATION/INSTRUCTIONS --}}
      <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="column g-10 important-information p-10 br-10">
        {{-- INFO HEAD --}}
        <strong class="font-1 c-primary">Important Information</strong>
       {{-- INFO DETAIL --}}
        <div class="row g-10 w-full">
            <span class="c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

            </span>
            <span>Do not modify the deposit amount after submission</span>
        </div>
         {{-- INFO DETAIL --}}
        <div class="row g-10 w-full">
            <span class="c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

            </span>
            <span>Always initiate payments from this page</span>
        </div>
           {{-- INFO DETAIL --}}
        <div class="row g-10 w-full">
            <span class="c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

            </span>
            <span>Deposits typically process within 5 minutes</span>
        </div>
           {{-- INFO DETAIL --}}
        <div class="row g-10 w-full">
            <span class="c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

            </span>
            <span>Contact support if you encounter delays in your deposit</span>
        </div>
      </div>
    </div>
    
  
   </section>
@endsection
@section('js')
   <script class="js">
    window.MyFunc ={
        Restyle : function(){
        document.querySelector('.marginalize').style.height=(Math.abs(document.querySelector('.parent').getBoundingClientRect().bottom - document.querySelector('.absolute-child').getBoundingClientRect().bottom) + 10) + 'px';  
          
        },
         QuickSelect : function(amount){
            document.querySelector('input[name=amount]').value=amount;
         },
         CompleteDeposit : function(amount){
            if(amount == ''){
                CreateNotify('error','Please enter a valid amount');
                return;
            }
            if(amount < {{ $auto[0]->price }}){
                  CreateNotify('error','Minimum deposit amount is &#8358;{{ number_format($auto[0]->price,2) }}');
                return;
            }
            spa(event,'{{ url('users/deposit/complete') }}?amount=' + amount);
         }

    }
    MyFunc.Restyle();
    // window.onload=function(){
    //     setTimeout(()=>{
    //         MyFunc.Restyle()
    //     },1000)
        
    // }
 
   </script>
@endsection