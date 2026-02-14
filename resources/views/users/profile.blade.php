@extends('layout.users.app')
@section('title')
    Profile
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
       .absolute-div{
       
        border-radius:10px;
        background:white;
        box-shadow:5px 5px 5px rgba(0,0,0,0.1);
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:10px;
        padding:10px;
        position:absolute;
        left:10px;
        right:10px;
        top:calc(100% - 30px);

       }
    </style>
@endsection
@section('main')
<section class="w-full column">
    <div class="w-full relative-parent bg-primary g-20 primary-text p-10 column align-center">
        {{-- GRETTNGS --}}
        <div class="column p-10 align-center g-10 justify-center">
            <strong style="font-size:2rem;">Hi, {{ Auth::guard('users')->user()->mobile }}</strong>
            <span>Welcome back</span>
        </div>
        {{-- BALANCE --}}
         <div style="background:rgba(255,255,255,0.3);box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="w-full m-top-10 br-10 column g-10 p-10">
            <span>Available Balance</span>
            <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->deposit + Auth::guard('users')->user()->withdrawal,2) }}</strong>
        </div>
       
        {{-- ACTION BUTTONS --}}
        <div class="absolute-div no-select">
            {{-- DEPOSIT BTN --}}
            <div onclick="spa(event,'{{ url('users/deposit') }}')" style="background:linear-gradient(to top right,rgb(106, 106, 248),blue)" class="w-full pointer br-10 column g-10 align-center justify-center p-20">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M228,144v64a12,12,0,0,1-12,12H40a12,12,0,0,1-12-12V144a12,12,0,0,1,24,0v52H204V144a12,12,0,0,1,24,0ZM96.49,80.49,116,61v83a12,12,0,0,0,24,0V61l19.51,19.52a12,12,0,1,0,17-17l-40-40a12,12,0,0,0-17,0l-40,40a12,12,0,1,0,17,17Z"></path></svg>

                <span class="font-1">Deposit</span>
            </div>
            {{-- WITHDRAW BTN --}}
              <div onclick="spa(event,'{{ url('users/withdraw') }}')" style="background:linear-gradient(to top right,#4caf50,green)" class="w-full br-10 pointer column g-10 align-center justify-center p-20">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M228,144v64a12,12,0,0,1-12,12H40a12,12,0,0,1-12-12V144a12,12,0,0,1,24,0v52H204V144a12,12,0,0,1,24,0Zm-108.49,8.49a12,12,0,0,0,17,0l40-40a12,12,0,0,0-17-17L140,115V32a12,12,0,0,0-24,0v83L96.49,95.51a12,12,0,0,0-17,17Z"></path></svg>

                <span class="font-1">Withdraw</span>
            </div>
        </div>
        
       
    </div>

    {{-- marginalize --}}
     <div class="marginalize w-full"></div>

     {{-- links --}}
    <div class="column g-10 p-10">
         <div class="w-full bg-light br-10 column g-10">
        {{-- ACCOUNT --}}
        <div style="border-bottom:1px solid rgba(0,0,0,0.1)" class="w-full column p-10">
            <strong class="desc opacity-07">MY ACCOUNT</strong>
            {{-- MY PRODUCT --}}
            <div onclick="spa(event,'{{ url('users/products') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM128,160a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0A48.05,48.05,0,0,1,128,160ZM40,72V56H216V72Z"></path></svg>

                </span>
                <span class="font-1">My Products</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
            {{-- MY TEAM --}}
             <div  onclick="spa(event,'{{ url('users/referrals') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="CurrentColor"></path>
<path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="CurrentColor"></path>
<path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="CurrentColor"></path>
<path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="CurrentColor"></path>
<path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="CurrentColor"></path>
<path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="CurrentColor"></path>
</svg>


                </span>
                <span class="font-1">My Team</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
        </div>
         {{-- TRANSACTIONS --}}
        <div style="border-bottom:1px solid rgba(0,0,0,0.1)" class="w-full column p-10">
            <strong class="desc opacity-07">TRANSACTIONS</strong>
            {{-- TRANSACTION HISTORY --}}
            <div  onclick="spa(event,'{{ url('users/transactions') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,96a12,12,0,1,1,12,12A12,12,0,0,1,208,96ZM196,72a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm28.66,56a8,8,0,0,0-8.63,7.31A88.12,88.12,0,1,1,120.66,40,8,8,0,0,0,119.34,24,104.12,104.12,0,1,0,232,136.66,8,8,0,0,0,224.66,128ZM128,56a72,72,0,1,1-72,72A72.08,72.08,0,0,1,128,56Zm-8,72a8,8,0,0,0,8,8h48a8,8,0,0,0,0-16H136V80a8,8,0,0,0-16,0Zm40-80a12,12,0,1,0-12-12A12,12,0,0,0,160,48Z"></path></svg>

                </span>
                <span class="font-1">Transaction History</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
            {{-- DEPOSIT HISTORY --}}
             <div  onclick="spa(event,'{{ url('users/transactions?type=deposit') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,117.66-32,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32L120,148.69V88a8,8,0,0,1,16,0v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32Z"></path></svg>


                </span>
                <span class="font-1">Deposit History</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
              {{-- WITHDRAWAL HISTORY --}}
             <div  onclick="spa(event,'{{ url('users/transactions?type=withdrawal') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,101.66a8,8,0,0,1-11.32,0L136,107.31V168a8,8,0,0,1-16,0V107.31l-18.34,18.35a8,8,0,0,1-11.32-11.32l32-32a8,8,0,0,1,11.32,0l32,32A8,8,0,0,1,165.66,125.66Z"></path></svg>

                </span>
                <span class="font-1">Withdrawal History</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
        </div>
          {{-- SETTINGS --}}
        <div class="w-full column p-10">
            <strong class="desc opacity-07">SETTINGS</strong>
            {{-- BANK DETAILS --}}
            <div  onclick="spa(event,'{{ url('users/bank') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M168,128a40,40,0,1,1-40-40A40,40,0,0,1,168,128Zm80-64V192a8,8,0,0,1-8,8H16a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H240A8,8,0,0,1,248,64Zm-16,46.35A56.78,56.78,0,0,1,193.65,72H62.35A56.78,56.78,0,0,1,24,110.35v35.3A56.78,56.78,0,0,1,62.35,184h131.3A56.78,56.78,0,0,1,232,145.65Z"></path></svg>

                </span>
                <span class="font-1">Bank Details</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
            {{-- CHANGE PASSWORD --}}
             <div  onclick="spa(event,'{{ url('users/password/update') }}')" class="p-10 no-select pc-pointer g-10 row align-center">
                <span class="c-primary">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96Z"></path></svg>


                </span>
                <span class="font-1">Change Password</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
              {{--LOGOUT --}}
             <div onclick="window.location.href='{{ url('users/logout') }}'" class="p-10 c-red no-select pc-pointer g-10 row align-center">
                <span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M116,128V48a12,12,0,0,1,24,0v80a12,12,0,0,1-24,0Zm66.55-82a12,12,0,0,0-13.1,20.1C191.41,80.37,204,103,204,128a76,76,0,0,1-152,0c0-25,12.59-47.63,34.55-61.95A12,12,0,0,0,73.45,46C44.56,64.78,28,94.69,28,128a100,100,0,0,0,200,0C228,94.69,211.44,64.78,182.55,46Z"></path></svg>

                </span>
                <span class="font-1">Logout</span>
                <span class="m-left-auto opacity-05">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                </span>
            </div>
        </div>
     </div>
    </div>
</section>
@endsection
@section('js')
<script class="js">
  window.MyFunc = {
    Style : function(){
         document.querySelector('.marginalize').style.height=(Math.abs(document.querySelector('.relative-parent').getBoundingClientRect().bottom - document.querySelector('.absolute-div').getBoundingClientRect().bottom) + 10) + 'px';
   
    }
  }
  MyFunc.Style();
 
    
       
</script>
    
    
@endsection