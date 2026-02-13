<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- SEO Meta -->
   
    <meta name="description" content="{{ config('app.name') }} lets you invest in reliable packages and earn daily profits. Withdraw anytime. Transparent. Flexible. Profitable. Join thousands building daily income.">
    <meta name="keywords" content="{{ config('app.name') }}, investment, daily profit, earn online, financial freedom, investment platform, passive income, earn daily, flexible withdrawal">
    <meta name="author" content="Techie Innovations">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ config('app.name') }} - Invest in Smart Packages & Earn Daily">
    <meta property="og:description" content="Start investing today with {{ config('app.name') }} and enjoy daily returns. Secure, flexible, and easy withdrawals.">
    <meta property="og:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update with actual image -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }} - Smart Daily Investments">
    <meta name="twitter:description" content="Invest in {{ config('app.name') }} and get daily earnings. Simple, secure and profitable.">
    <meta name="twitter:image" content="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}"> <!-- Update -->

    <title>{{ config('app.name') }} | Users | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png?v='.config('versions.vite_version').'') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg?v='.config('versions.vite_version').'') }}" />
<link rel="shortcut icon" href="{{  asset('favicon/favicon.ico?v='.config('versions.vite_version').'') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{  asset('favicon/apple-touch-icon.png?v='.config('versions.vite_version').'') }}" />
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }} " />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest?v='.config('versions.vite_version').'') }}" />
      <link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css?v='.config('versions.styles_version').'') }}">
  <link rel="stylesheet" href="{{ asset('css/users/app.css?v=3.8') }}">
  @yield('css')
  <style>
  header{
    display:none;
  }
    
    footer{
      background:var(--bg);
      padding:10px;
      position:fixed;
      bottom:0;
      left:0;
      right:0;
      box-shadow:0 0 10px rgba(0,0,0,0.2)
    }
    footer .navs{
      background:inherit;
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:10px;
      width:100%;
    }
    footer .navs .nav{
      display:flex;
      flex-direction:column;
      gap:3px;
      align-items:center;

    }
  </style>
</head>
@include('components.sections',[
  'action_loader' => true
])
<body class="">
<section class="loading top-0 left-0 bottom-0 right-0 pos-fixed z-index-9000 c-primary column justify-center bg">
    <svg height="100" width="100" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="12" cy="12" r="9.5" fill="none" stroke-width="3" stroke-linecap="round"><animate attributeName="stroke-dasharray" dur="1.5s" calcMode="spline" values="0 150;42 150;42 150;42 150" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/><animate attributeName="stroke-dashoffset" dur="1.5s" calcMode="spline" values="0;-16;-59;-59" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/></circle><animateTransform attributeName="transform" type="rotate" dur="2s" values="0 12 12;360 12 12" repeatCount="indefinite"/></g></svg>

</section>
  <section class="ball-loading row justify-center g-10">
  <div class="ball"></div>
  <div class="ball"></div>
  <div class="ball"></div>
</section>
    <header>
        {{-- <div style="background-image:url('{{ asset('images/users/'.Auth::guard('users')->user()->photo.'') }}')" class="photo"></div> --}}
         <img src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" alt="Logo" class="logo m-right-auto">
         <div class="row g-10">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#708090" viewBox="0 0 256 256"><path d="M224,124h0a92,92,0,0,1-92,92H48a8,8,0,0,1-8-8V124a92,92,0,0,1,92-92h0A92,92,0,0,1,224,124Z" opacity="0.2"></path><path d="M172,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h68A8,8,0,0,1,172,112Zm-8,24H96a8,8,0,0,0,0,16h68a8,8,0,0,0,0-16Zm68-12A100.11,100.11,0,0,1,132,224H48a16,16,0,0,1-16-16V124a100,100,0,0,1,200,0Zm-16,0a84,84,0,0,0-168,0v84h84A84.09,84.09,0,0,0,216,124Z"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Line Icons by Vjacheslav Trushkin - https://github.com/cyberalien/line-md/blob/master/license.txt --><g fill="none" stroke="#708090" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><g><path stroke-dasharray="4" stroke-dashoffset="4" d="M12 3v2"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="4;0"/></path><path fill="#708090" fill-opacity="0" stroke-dasharray="28" stroke-dashoffset="28" d="M12 5c-3.31 0 -6 2.69 -6 6l0 6c-1 0 -2 1 -2 2h8M12 5c3.31 0 6 2.69 6 6l0 6c1 0 2 1 2 2h-8"><animate fill="freeze" attributeName="fill-opacity" begin="0.9s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.4s" values="28;0"/></path><animateTransform fill="freeze" attributeName="transform" begin="0.9s" dur="6s" keyTimes="0;0.05;0.15;0.2;1" type="rotate" values="0 12 3;3 12 3;-3 12 3;0 12 3;0 12 3"/></g><path stroke-dasharray="8" stroke-dashoffset="8" d="M10 20c0 1.1 0.9 2 2 2c1.1 0 2 -0.9 2 -2"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="8;0"/><animateTransform fill="freeze" attributeName="transform" begin="1.1s" dur="6s" keyTimes="0;0.05;0.15;0.2;1" type="rotate" values="0 12 8;6 12 8;-6 12 8;0 12 8;0 12 8"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M22 6v4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.05s" dur="0.2s" values="6;0"/><animate attributeName="stroke-width" begin="1.95s" dur="3s" keyTimes="0;0.1;0.2;0.3;1" repeatCount="indefinite" values="2;3;3;2;2"/></path><path stroke-dasharray="2" stroke-dashoffset="2" d="M22 14v0.01"><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.25s" dur="0.2s" values="2;0"/><animate attributeName="stroke-width" begin="2.25s" dur="3s" keyTimes="0;0.1;0.2;0.3;1" repeatCount="indefinite" values="2;3;3;2;2"/></path></g></svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#708090" viewBox="0 0 256 256"><path d="M160,128a32,32,0,1,1-32-32A32,32,0,0,1,160,128Z" opacity="0.2"></path><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152Zm73.71,7.14a80,80,0,0,1-14.08,22.2,8,8,0,0,1-11.92-10.67,63.95,63.95,0,0,0,0-85.33,8,8,0,1,1,11.92-10.67,80.08,80.08,0,0,1,14.08,84.47ZM69,103.09a64,64,0,0,0,11.26,67.58,8,8,0,0,1-11.92,10.67,79.93,79.93,0,0,1,0-106.67A8,8,0,1,1,80.29,85.34,63.77,63.77,0,0,0,69,103.09ZM248,128a119.58,119.58,0,0,1-34.29,84,8,8,0,1,1-11.42-11.2,103.9,103.9,0,0,0,0-145.56A8,8,0,1,1,213.71,44,119.58,119.58,0,0,1,248,128ZM53.71,200.78A8,8,0,1,1,42.29,212a119.87,119.87,0,0,1,0-168,8,8,0,1,1,11.42,11.2,103.9,103.9,0,0,0,0,145.56Z"></path></svg>
        </div>
    </header>
    <main>
        @yield('main')
        <section onclick="HideSlideUp()" class="slideup">
          <div onclick="StopPropagation(event)" class="child">
            <div class="bar"></div>
            <div class="body">
            @yield('slideup_child')
            </div>
          </div>
        </section>
         <section onclick="HidePopUp()" class="popup">
            <div onclick="StopPropagation(event)" class="child">
               @yield('popup_child')
            </div>
        </section>
    </main>
    <footer>
      <section class="navs">
       <div onclick="spa(event,'{{ url('users/dashboard') }}')" class="column nav align-center g-5 pointer no-select p-10 w-full">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,120v96a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V164a4,4,0,0,0-4-4H108a4,4,0,0,0-4,4v52a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a16,16,0,0,1,4.69-11.31l80-80a16,16,0,0,1,22.62,0l80,80A16,16,0,0,1,224,120Z"></path></svg>

     <span>Home</span>
       </div>
        <div onclick="spa(event,'{{ url('users/products') }}')" class="column nav align-center g-5 pointer no-select p-10 w-full">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM128,160a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0A48.05,48.05,0,0,1,128,160ZM40,72V56H216V72Z"></path></svg>

    <span>Products</span>
       </div>
        <div onclick="spa(event,'{{ url()->to('users/invite') }}')" class="column nav align-center g-5 pointer no-select p-10 w-full">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M212,200a36,36,0,1,1-69.85-12.25l-53-34.05a36,36,0,1,1,0-51.4l53-34a36.09,36.09,0,1,1,8.67,13.45l-53,34.05a36,36,0,0,1,0,24.5l53,34.05A36,36,0,0,1,212,200Z"></path></svg>

      <span>Share</span>
       </div>
        <div onclick="spa(event,'{{ url()->to('users/profile') }}')" class="column nav align-center g-5 pointer no-select p-10 w-full">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M172,120a44,44,0,1,1-44-44A44.05,44.05,0,0,1,172,120Zm60,8A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88.09,88.09,0,0,0-91.47-87.93C77.43,41.89,39.87,81.12,40,128.25a87.65,87.65,0,0,0,22.24,58.16A79.71,79.71,0,0,1,84,165.1a4,4,0,0,1,4.83.32,59.83,59.83,0,0,0,78.28,0,4,4,0,0,1,4.83-.32,79.71,79.71,0,0,1,21.79,21.31A87.62,87.62,0,0,0,216,128Z"></path></svg>
  
      <span>Profile</span>
       </div>
      </section>
    </footer>
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    <script src="{{ asset('js/users/app.js?=2.3') }}"></script>
    <script>
      document.querySelector('main').style.marginBottom=document.querySelector('footer').getBoundingClientRect().height +  'px';
    </script>
    @yield('js')
</body>
</html>