@extends('layout.users.app')
@section('title')
    Bank Account
@endsection
@section('css')
    <style class="css">
      main{
        padding:0;
      }
      .cont{
        border:1px solid rgba(0,0,0,0.1) !important;
        background:var(--bg) !important;
        border-radius:10px !important;
      }
    </style>
@endsection
@section('main')
    <section class="column w-full">
      {{-- HEADER --}}
        <div class="w-full bg-primary primary-text no-select p-20 row align-center space-between g-10">
            <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">Update Bank Details</strong>
            <span></span>
        </div>
     
        {{-- BODY --}}
        <div class="w-full column align-center p-10 g-10">
           <form style="box-shadow:5px 5px 10px rgba(0,0,0,0.1)" onsubmit="PostRequest(event,this,MyFunc.Linked)" action="{{ url()->to('users/post/bank/update/process') }}" method="POST" class="column w-full bg-light br-10  max-w-500 g-10 p-10 flex-auto">
        <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
      {{-- NEW INPUT --}}
        <div class="column g-5 w-full">
          <label for="">Account Number</label>
          <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
            
            <input name="account_number" placeholder="10 Digits Account Number" type="number" class="inp reqiuired input">
            
        </div>
        </div>
        
        {{-- BANK NAME --}}
           <div class="column g-5 w-full">
          <label for="">Bank Name</label>
        <div style="border:1px solid var(--bg-lighter)" class="cont br-0 bg-light max-500 required">
         
          <select name="bank_name" id="" class="inp required input">
            <option value="">Select Bank...</option>
            @foreach (PaystackBanks()->data as $data)
                <option value="{{ $data->name }}">{{ $data->name }}</option>
            @endforeach
          </select>
         
        </div>
           </div>
           {{-- NEW INPUT --}}
              <div class="column g-5 w-full">
          <label for="">Account Name</label>
         <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
          
            <input name="account_name" placeholder="Account Name" type="text" class="inp required input">
             
        </div>
              </div>
        <button class="post"><div class="content">Add Bank</div></button>
       </form>
   
        </div>
      


     
    </section>
@endsection
@section('js')
    <script class="js">
     window.MyFunc = {
      Verified : function(response){
      let data=JSON.parse(response);
      if(data.status == 'success'){
        document.querySelector('input[name=account_name]').value=data.message;
        document.querySelector('.add-btn').classList.remove('disabled');

      }else{
        document.querySelector('input[name=account_name]').value=data.message;
        document.querySelector('.add-btn').classList.add('disabled');
      }
      },
      Linked : function(response){
        let data=JSON.parse(response);
        if(data.status == 'success'){
          spa(event,'{{ url()->previous() }}');
        }
      }
     }
    </script>
@endsection