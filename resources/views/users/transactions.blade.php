@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style class="css">
     main{
        padding:0;

     }
     .trx-status{
        user-select:none;
        border-radius:100px;
        padding:5px 20px;
        width:fit-content;
        display:flex;
        align-items:center;
        justify-content:center;


     }
     .trx-status.all.active{
        background:rgba(0,0,255,0.1);
        color:blue;
     }
      .trx-status.completed.active{
        background:rgba(0,255,0,0.1);
        color:green;
     }
     .trx-status.pending.active{
        background:rgb(218, 165, 32,0.1);
        color:rgb(78, 58, 8);
     }
     

    </style>
@endsection
@section('main')
    <section class="column w-full g-20">
       {{-- HEADER --}}
        <div class="w-full bg-primary primary-text no-select p-20 row align-center space-between g-10">
            <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">{{ ucfirst($type ?? 'Transaction') }} Records</strong>
            <span></span>
        </div>
        {{-- BODY --}}
        <div class="column body g-10 p-10">
            {{-- BREAKDOWN --}}
            <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="p-20 br-10 bg-light g-10 row">
              {{-- TOTAL --}}
                <div class="column g-10">
                  <span class="opacity-07">Total Transactions</span>
                <strong class="desc">{{ number_format($total) }}</strong>
              </div>
             @isset($type)
                  {{-- STATUS --}}
              <div class="flex-auto row align-center p-10 g-10">
                <div onclick="MyFunc.Reload(event,this,'{{ url('users/transactions?type='.$type.'') }}')" class="trx-status all {{ isset($status) ? '' : 'active' }}">All</div>
                <div onclick="MyFunc.Reload(event,this,'{{ url('users/transactions?type='.$type.'&status=success') }}')" class="trx-status completed {{ isset($status) && $status == 'success' ? 'active' : '' }}">Completed</div>
                <div onclick="MyFunc.Reload(event,this,'{{ url('users/transactions?type='.$type.'&status=pending') }}')" class="trx-status pending {{ isset($status) && $status == 'pending' ? 'active' : '' }}">Pending</div>
              </div>
             @endisset
            </div>
        

            {{-- TRANSACTIONS LOOP --}}
          <div style="margin-top:30px;" class="grid pc-grid-2 w-full g-10">
            @if ($trx->isEmpty())
                @include('components.sections',[
                    'null' => 'No transactions found'
                ])
            @else
                @foreach ($trx as $data)
             <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="p-10 br-10 bg-light column">
            {{-- NEW ROW --}}
                <div style="border-bottom:1px solid rgba(0,0,0,0.1)" class="row align-center p-10 space-between w-full">
               {{-- TRANSACTION ID --}}
                <div class="column g-5">
                <span class="opacity-07">Transaction ID</span>
                <span class="font-1">{{ $data->uniqid }}</span>
               </div>
               {{-- AMOUNT --}}
                 <div style="text-align: end" class="column g-5">
                <span class="opacity-07">Amount</span>
                <strong class="font-1">&#8358;{{ number_format($data->amount,2) }}</strong>
               </div>

            </div>
         
                {{-- NEW ROW --}}
               <div style="{{ isset($type) ? 'border-bottom:none;' : 'border-bottom:1px solid rgba(0,0,0,0.1)' }}" class="row align-center p-10 space-between w-full">
               {{-- DATE --}}
               <div class="row align-center g-2">
                <span class="opacity-07">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M236,137A108.13,108.13,0,1,1,119,20,12,12,0,0,1,121,44,84.12,84.12,0,1,0,212,135,12,12,0,1,1,236,137ZM116,76v52a12,12,0,0,0,12,12h52a12,12,0,0,0,0-24H140V76a12,12,0,0,0-24,0Zm92,20a16,16,0,1,0-16-16A16,16,0,0,0,208,96ZM176,64a16,16,0,1,0-16-16A16,16,0,0,0,176,64Z"></path></svg>
               
                </span>
                {{ $data->frame }}
               </div>
            
               {{-- STATUS --}}
                 <div class="column g-5">
              <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
               </div>

            </div>
            
            @if (!isset($type))
                  {{-- NEW ROW --}}
               <div class="row align-center p-10 space-between w-full">
                {{ strtoupper($data->type) }}
               </div>

            @endif
           
            </div>
                
            @endforeach
            @endif
          </div>
            
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Reload : function(event,element,spa_url){
                document.querySelectorAll('.trx-status').forEach((data)=>{
                    data.classList.remove('active');
                });
                element.classList.add('active');
                spa(event,spa_url);
            }
        }
    </script>
@endsection
