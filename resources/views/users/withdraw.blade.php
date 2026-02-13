@extends('layout.users.app') 
@section('title')
    Deposit
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
            <strong class="desc">Withdraw Funds</strong>
           <span onclick="spa(event,'{{ url('users/transactions?type=withdrawal') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M140,80v41.21l34.17,20.5a12,12,0,1,1-12.34,20.58l-40-24A12,12,0,0,1,116,128V80a12,12,0,0,1,24,0ZM128,28A99.38,99.38,0,0,0,57.24,57.34c-4.69,4.74-9,9.37-13.24,14V64a12,12,0,0,0-24,0v40a12,12,0,0,0,12,12H72a12,12,0,0,0,0-24H57.77C63,86,68.37,80.22,74.26,74.26a76,76,0,1,1,1.58,109,12,12,0,0,0-16.48,17.46A100,100,0,1,0,128,28Z"></path></svg>

            </span>
        </div>
        {{-- WITHDRAWAL BALANCE --}}
          <div style="background:rgba(255,255,255,0.4);box-shadow:0 5px 5px rgba(0,0,0,0.1)" class=" max-w-500 m-x-auto w-full p-20 column br-10">
            <span class="font-1">Withdrawal Balance</span>
            <strong style="font-size:2rem;">&#8358;{{ number_format(Auth::guard('users')->user()->withdrawal) }}</strong>
        </div>
        {{-- ABSOLUTE CHILD --}}
        <form method="Post" onsubmit="PostRequest(event,this,MyFunc.Completed)" action="{{ url('users/post/withdraw/process') }}" style="color:var(--text)" class="max-w-500 m-x-auto absolute-child">
            {{-- csrf token  --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
            <label for="">Withdrawal Amount</label>
            <div style="border:1px solid rgba(0,0,0,0.3)" class="cont w-full br-10 bg-transparent">
                <input type="number" name="amount" placeholder="Enter withdrawal amount" class="w-full required inp input h-full bg-transparent border-none">
            </div>
            {{-- FEE BREAKDOWN --}}
            <div style="background:rgba(0,255,0,0.1);color:green;border:1px solid green" class="w-full br-10 p-10 align-center row g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M108,84a16,16,0,1,1,16,16A16,16,0,0,1,108,84Zm128,44A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Zm-72,36.68V132a20,20,0,0,0-20-20,12,12,0,0,0-4,23.32V168a20,20,0,0,0,20,20,12,12,0,0,0,4-23.32Z"></path></svg>

                <span>A processing fee of {{ $settings->withdrawal_fee }}% applies to all withdrawals</span>
            </div>
            <button class="post">Withdraw Now</button>
        </form>
    </div>
    {{-- Marginalize --}}
    <div class="marginalize w-full">

    </div>
   {{-- body --}}
   <div class="column p-20 g-20">
    {{-- BANK DETAILS --}}
     <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="w-full  max-w-500 m-x-auto bg-light br-10 column p-20 g-10">
        <strong class="desc">Bank Account Details</strong>
        <div style="border:1px solid rgba(0,0,0,0.1);background:rgba(0,0,0,0.05)" class="w-full br-10 p-10 column g-5">
            <span class="break-word font-1">{{ strtoupper($bank->account_name) }}</span>
            <span class="break-word">{{ $bank->bank_name }}</span>
            <span class="break-word">{{ $bank->account_number }}</span>
        </div>
        <div onclick="spa(event,'{{ url('users/bank') }}')" class="c-primary no-select pc-pointer row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M232.49,55.51l-32-32a12,12,0,0,0-17,0l-96,96A12,12,0,0,0,84,128v32a12,12,0,0,0,12,12h32a12,12,0,0,0,8.49-3.51l96-96A12,12,0,0,0,232.49,55.51ZM192,49l15,15L196,75,181,60Zm-69,99H108V133l56-56,15,15Zm105-7.43V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28h67.43a12,12,0,0,1,0,24H52V204H204V140.57a12,12,0,0,1,24,0Z"></path></svg>

            <span>Edit Bank Details</span>
        </div>

    </div>
     {{-- WITHDRAWAL INFO --}}
     <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="w-full  max-w-500 m-x-auto bg-light br-10 column p-20 g-10">
        <strong class="desc">Withdrawal Information</strong>
        <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </span>
            <span>Minimum Withdraw: &#8358;{{ number_format($settings->min_withdrawal,2) }}</span>
        </div>
        <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Withdrawal Fee: {{ number_format($settings->withdrawal_fee) }}%</span>
        </div>
         <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Referral is optional,you can withdraw without referring.</span>
        </div>
         <div class="w-full row align-center g-5">
            <span class="c-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                
            </span>
            <span>Processing time: 1 - 24 Hours.</span>
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
                spa(event,'{{ url('users/transactions/withdrawals') }}');
            }


        }

    }
    MyFunc.Style();
</script>
@endsection