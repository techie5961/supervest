@extends('layout.users.app')
@section('title')
    My Products
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
        <div class="w-full bg-primary primary-text no-select p-20 row align-center space-between g-10">
            <span onclick="spa(event,'{{ url()->previous() }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">My Products</strong>
            <span></span>
        </div>
        {{-- BODY --}}
         <div class="w-full p-10 column g-10">
            @if ($products->isEmpty())
                @include('components.sections',[
                    'null' => 'No active products found'
                ])
            @else
               <div class="w-full grid pc-grid-2 g-10">
                
                @foreach ($products as $data)
                    {{-- PRODUCT --}}
        <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full br-10 bg-light column g-10 p-10">
              {{-- PRODUCT NAME --}}
            <div class="row w-full align-center g-10 space-between">
            <strong class="font-1">{{ $data->json->name }}</strong>
             </div>
               {{-- COST PRICE --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Purchase Price:</span>
            <span>&#8358;{{ number_format($data->json->price,2) }}</span>
        </div>
        {{-- PRODUCT DURATION --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Investment Period:</span>
            <span>{{ $data->json->validity }} Days</span>
        </div>
          {{-- DAILY RETURN --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Daily Income:</span>
            <span>&#8358;{{ number_format($data->json->return,2) }}</span>
        </div>
          {{-- DAILY RETURN --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Income Time:</span>
            <span>Everyday at <strong class="opacity-07 font-1">{{ $data->income_time }}</strong></span>
        </div>
         {{-- DAILY RETURN --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Total Income:</span>
            <span style="color:#4caf50;">&#8358;{{ number_format($data->json->return * $data->json->validity,2) }}</span>
        </div>
       
        </div>
                @endforeach
            </div> 
            @endif
        </div>
     </section>
@endsection