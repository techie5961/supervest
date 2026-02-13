@extends('layout.users.app')
@section('title')
    Complete Deposit
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- HEADER --}}
        <div class="w-full p-20 primary-text no-select bg-primary row space-between g-10 align-center">
            <span class="pc-pointer" onclick="spa(event,'{{ url('users/deposit') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <span class="desc bold">Complete Deposit</span>
            <span></span>
        </div>
        {{-- BODY --}}
        <div class="column p-10 max-w-500 m-x-auto w-full g-10">
            {{-- DETAILS --}}
            <div class="w-full bg-light br-10 p-10 column g-10">
                {{-- PAYMENT INSTRUCTIONS --}}
               <div class="column w-full g-5 text-center align-center">
                 <strong class="desc">Payment Instructions</strong>
                 <span>Kindly send <strong class="c-primary">&#8358;{{ number_format($amount,2) }}</strong> into the account details below</span>
                <small class="c-red">Important: send Exactly <strong>&#8358;{{ number_format($amount,2) }}</strong>.Incorrect amount may result in loss of funds.</small>
               </div>
               {{-- PAYMENT DETAILS --}}
               <div class="column w-full g-10">
                {{-- Bank Name --}}
                <div class="br-5 font-1 w-full row space-between g-10 align-center p-10 bg">
                    <span>Bank Name:</span>
                    <span>{{ $bank_details->bank_name ?? 'null' }}</span>
                </div>
                  {{-- Account Number --}}
                <div class="br-5 font-1 w-full row space-between g-10 align-center p-10 bg">
                    <span>Account Number:</span>
                    <span>{{ $bank_details->account_number ?? 'null' }} 
                    <span onclick="copy('{{ $bank_details->account_number ?? 'null' }}')" class="c-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M192,72V216a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H184A8,8,0,0,1,192,72Zm24-40H72a8,8,0,0,0,0,16H208V184a8,8,0,0,0,16,0V40A8,8,0,0,0,216,32Z"></path></svg>
                  </span>    
                    </span>
                </div>
                 {{-- Account Name --}}
                <div class="br-5 font-1 w-full row space-between g-10 align-center p-10 bg">
                    <span>Account Name:</span>
                    <span>{{ $bank_details->account_name ?? 'null' }}</span>
                </div>
                {{-- Amount --}}
                <div class="br-5 font-1 w-full row space-between g-10 align-center p-10 bg">
                    <span>Amount to Pay:</span>
                    <span>&#8358;{{ number_format($amount,2) }}
                         <span onclick="copy('{{ $amount }}')" class="c-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M192,72V216a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H184A8,8,0,0,1,192,72Zm24-40H72a8,8,0,0,0,0,16H208V184a8,8,0,0,0,16,0V40A8,8,0,0,0,216,32Z"></path></svg>
                  </span> 
                    </span>
                </div>
                {{-- Session ID --}}
                <div class="br-5 font-1 w-full row space-between g-10 align-center p-10 bg">
                    <span>Session ID:</span>
                    <span>{{ $session_id }}</span>
                </div>
               </div>
            </div>


             {{-- PAYMENT PROOF --}}
                 <form method="POST" onsubmit="PostRequest(event,this,MyFunc.Completed)" action="{{ url('users/post/complete/deposit/process') }}" enctype="multipart/form-data" class="w-full bg-light br-10 p-10 column g-10">
                  {{-- CSRF TOKEN --}}
                  <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                  {{-- AMOUNT --}}
                  <input type="hidden" name="amount" value="{{ $amount }}" class="inp input">
                  <strong class="desc">Submit Payment Proof</strong>
                {{-- NEW INPUT --}}
                <div class="column g-5">
                      <label for="">Sender Name</label>
                    <div style="border:1px solid rgba(0,0,0,0.1)" class="cont w-full h-50 br-10">
                        <input placeholder="Sender Name" type="text" name="account_name" id="" class="input inp required w-full border-none bg-transparent">
                    </div>
                </div>
                 {{-- NEW INPUT --}}
                <div class="column g-5">
                    <label for="">Payment Receipt/Screenshot</label>
                    <div style="border:1px solid rgba(0,0,0,0.1)" class="cont w-full h-50 br-10">
                        <input type="file" accept="image/*" name="receipt" class="input inp required w-full border-none bg-transparent">
                    </div>
                </div>
                <button class="post">Submit</button>
            </form>
                  {{-- IMPORTANT INFORMATION/INSTRUCTIONS --}}
      <div style="border:1px solid var(--primary);background:var(--primary-transparent)" class="absolute-child column g-10 important-information p-10 br-10">
     <span class="c-primary font-1">Need Help?</span>
     <span class="opacity-07">If you encounter any issues with your payment,please contact our support team immediately.</span>
    </div>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Completed : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,'{{ url('users/transactions') }}')
                }
            }
        }
    </script>
@endsection