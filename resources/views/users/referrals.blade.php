@extends('layout.users.app')
@section('title')
    Referrals
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
            <span onclick="spa(event,'{{ url('users/profile') }}')" class="pc-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>

            </span>
            <strong class="desc">My Referrals</strong>
            <span></span>
        </div>
        {{-- BODY --}}
        <div class="w-full p-10 column g-10">
            @if ($referrals->isEmpty())
                @include('components.sections',[
                    'null' => 'No referrals found'
                ])
            @else
               <div class="w-full grid pc-grid-2 g-10">
                <div class="w-full bg-primary primary-text row p-10 align-center space-between">
                    <span>User</span>
                    <span>Investments</span>
                </div>
                <div class="w-full mobile-display-none bg-primary primary-text row p-10 align-center space-between">
                    <span>User</span>
                    <span>Investments</span>
                </div>
                @foreach ($referrals as $data)
                    <div style="box-shadow:5px 5px 5px rgba(0,0,0,0.1)" class="p-10 br-10 bg-light column g-10">
                        <div class="row w-full g-10 align-center space-between">
                            <div class="row align-center g-10">
                                <div class="w-40 h-40 bold c-primary font-1 justify-center circle no-shrink bg-primary-transparent column no-select align-center space-between">
                                    {{ substr($data->mobile,0,1) }}
                                </div>
                                <span>{{ $data->mobile }}</span>
                            </div>
                            <strong class="font-1 c-primary">&#8358;{{ number_format($data->invested,2) }}</strong>
                        </div>
                    </div>
                @endforeach
            </div> 
            @endif
        </div>
   </section>
@endsection