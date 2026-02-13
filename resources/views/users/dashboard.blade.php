@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
   
@endsection
@section('main')
  <section class="w-full column p-10 g-10">
    {{-- BANNER --}}
<img style="box-shadow:0 0 10px rgba(0,0,0,0.1)" src="{{ asset('banners/'.$banner_settings->earning_structure.'') }}" alt="Earning Structure Banner" class="w-full box-shadow max-w-500 br-10">
 {{-- NAVS --}}
 <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full grid grid-4 p-10 br-10 g-10 bg-light">
    {{-- NAV --}}
    <div onclick="spa(event,'{{ url('users/deposit') }}')" style="background: linear-gradient(to bottom right,blue,rgb(1, 1, 97));color:white" class="w-full h-full p-10 br-10 column g-10 justify-center align-center">
        <div style="background:rgba(255,255,255,0.2);color:white;" class="circle p-20 perfect-square column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,168,96H136V32a8,8,0,0,0-16,0V96H88a8,8,0,0,0-5.66,13.66Z"></path></svg>
            
        </div>
        <strong class="text-center">Deposit</strong>
    </div>
     {{-- NAV --}}
    <div onclick="spa(event,'{{ url('users/withdraw') }}')" style="background: linear-gradient(to bottom right,#4caf50,green);color:white" class="w-full h-full p-10 br-10 column g-10 justify-center align-center">
        <div style="background:rgba(255,255,255,0.2);color:white;" class="circle p-20 perfect-square column justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0ZM88,80h32v64a8,8,0,0,0,16,0V80h32a8,8,0,0,0,5.66-13.66l-40-40a8,8,0,0,0-11.32,0l-40,40A8,8,0,0,0,88,80Z"></path></svg>

        </div>
        <strong class="text-center">Withdraw</strong>
    </div>
      {{-- NAV --}}
    <div onclick="spa(event,'{{ url('users/products') }}')" style="background: linear-gradient(to bottom right,rgb(248, 102, 49),orangered);color:white" class="w-full h-full p-10 br-10 column g-10 justify-center align-center">
        <div style="background:rgba(255,255,255,0.2);color:white;" class="circle p-20 perfect-square column justify-center">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM128,160a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0A48.05,48.05,0,0,1,128,160ZM40,72V56H216V72Z"></path></svg>

        </div>
        <strong class="text-center">My Products</strong>
    </div>
      {{-- NAV --}}
    <div onclick="spa(event,'{{ url('users/gift/code') }}')" style="background: linear-gradient(to bottom right,purple,rgb(59, 1, 59));color:white" class="w-full h-full p-10 br-10 column g-10 justify-center align-center">
        <div style="background:rgba(255,255,255,0.2);color:white;" class="circle p-20 perfect-square column justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

        </div>
        <strong class="text-center">Gift Code</strong>
    </div>
 </div>

 {{-- INVESTMENT PRODUCTS --}}
 
@if (!$products->isEmpty())
<strong class="desc">Our Investment Products</strong>
    <div class="w-full grid pc-grid-2 g-10 place-center">
    @foreach ($products as $data)
    {{-- PRODUCT --}}
        <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full br-10 bg-light column g-10 p-10">
            {{-- PRODUCT BANNER --}}
            <img style="margin-bottom:10px;max-height:100px;" src="{{ asset('products/'.$data->photo.'') }}" alt="{{ $data->name }} Display Photo" class="w-full br-10">
        {{-- PRODUCT NAME/PRICE --}}
            <div class="row w-full align-center g-10 space-between">
            <strong class="font-1">{{ $data->name }}</strong>
            <strong style="color:var(--primary-dark)" class="font-1">&#8358;{{ number_format($data->price,2) }}</strong>
        </div>
        {{-- PRODUCT DURATION --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Investment Period:</span>
            <span>{{ $data->validity }} Days</span>
        </div>
          {{-- DAILY RETURN --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Daily Return:</span>
            <span>&#8358;{{ number_format($data->return,2) }}</span>
        </div>
         {{-- DAILY RETURN --}}
        <div class="row w-full align-center g-10 space-between">
            <span>Total Return:</span>
            <span style="color:#4caf50;">&#8358;{{ number_format($data->return * $data->validity,2) }}</span>
        </div>
        {{-- PURCHASE BUTTON --}}
       
        <div onclick="MyFunc.ShowSlideUp('{{ $data->name }}','&#8358;{{ number_format($data->price,2) }}','{{ url('users/get/purchase/product/confirm?id='.$data->id.'') }}')" style="box-shadow:0 0 2px var(--primary);" class="w-full font-1 pointer br-10 p-10 bg-primary primary-text column justify-center align-center">
            Add to Portfolio
        </div>
        </div>
    @endforeach
    </div>
@endif
 
</section>
{{-- SLIDEUP TEMPLATE FOR PURCHASE --}}
<template class="slideup-template">
<div class="w-full column g-10 p-10">
    {{-- HEADER --}}
    <div class="row p-10 w-full align-center space-between g-10">
        <strong class="desc">Confirm Purchase</strong>
        <div onclick="HideSlideUp()" class="h-40 w-40 column no-select clip-circle pc-pointer justify-center align-center circle" style="background:rgba(0,0,0,0.1)">
            <strong class="desc">&times;</strong>
        </div>
    </div>
    {{-- BODY --}}
    <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full bg-light p-10 br-10 column g-10">
      {{-- PRODUCT NAMING --}}
        <div class="row align-center g-10 w-full">
         <div class="h-50 w-50 column justify-center br-10 primary-text no-shrink bg-primary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="40" width="40"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

        </div>
        <div class="column g-5">
            <strong class="desc product-name">Product 1</strong>
            <span style="opacity:0.7">Cost: <span class="product-cost"></span></span>
        </div>
       </div>
       {{-- ACCOUNT / DEPOSIT BALANCE --}}
       <div class="p-5" style="border-top:0.5px solid rgba(0,0,0,0.7);opacity:0.7">
        Account: &#8358;{{ number_format(Auth::guard('users')->user()->deposit,2) }}
       </div>
    </div>
    <button data-url="" onclick="GetRequest(event,this.dataset.url,this,MyFunc.Confirmed)" class="w-fit border-none purchase-btn m-x-auto m-y-10 pointer  p-10 p-x-20 align-center justify-center br-1000 clip-1000 bg-primary primary-text">
       <span>Purchase</span>
    </button>
    
</div>
</template>
@endsection
@section('js')
<script class="js">
    
   window.MyFunc = {
    ShowSlideUp : function(product_name,product_cost,purchase_link){
      try{
          let child=document.querySelector('template.slideup-template').innerHTML;
        let div=document.createElement('div');
        div.innerHTML=child;
       div.querySelector('.product-name').innerHTML=product_name;
        div.querySelector('.product-cost').innerHTML=product_cost;
       div.querySelector('.purchase-btn').dataset.url=purchase_link;
        SlideUp(div.innerHTML);
      }catch(error){
        alert(error.stack)
      }
    },
    Confirmed : function(response){
        let data=JSON.parse(response);
              CreateNotify(data.status,data.message);
              if(data.status == 'success'){
                HideSlideUp();
                spa(event,'{{ url('users/products') }}');
              }
    }
   }
</script>
@endsection