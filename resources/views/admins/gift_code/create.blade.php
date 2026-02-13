@extends('layout.admins.app')
@section('title')
    Create Gift Code
@endsection
@section('main')
    <section class="w-full column p-10 g-10">
        <div class="bg-light g-10 br-10 column p-10">
            <strong class="desc row align-center g-5 c-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,72H180.92c.39-.33.79-.65,1.17-1A29.53,29.53,0,0,0,192,49.57,32.62,32.62,0,0,0,158.44,16,29.53,29.53,0,0,0,137,25.91a54.94,54.94,0,0,0-9,14.48,54.94,54.94,0,0,0-9-14.48A29.53,29.53,0,0,0,97.56,16,32.62,32.62,0,0,0,64,49.57,29.53,29.53,0,0,0,73.91,71c.38.33.78.65,1.17,1H40A16,16,0,0,0,24,88v32a16,16,0,0,0,16,16v64a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V120H40V88h80v32h16V88h80v32H136v92a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V136a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72ZM84.51,59a13.69,13.69,0,0,1-4.5-10A16.62,16.62,0,0,1,96.59,32h.49a13.69,13.69,0,0,1,10,4.5c8.39,9.48,11.35,25.2,12.39,34.92C109.71,70.39,94,67.43,84.51,59Zm87,0c-9.49,8.4-25.24,11.36-35,12.4C137.7,60.89,141,45.5,149,36.51a13.69,13.69,0,0,1,10-4.5h.49A16.62,16.62,0,0,1,176,49.08,13.69,13.69,0,0,1,171.49,59Z"></path></svg>

                Create Gift Code
            </strong>
             <hr class="bg-primary">
             <form action="{{ url('admins/post/create/gift/code/process') }}" onsubmit="PostRequest(event,this,Completed)" method="POST" class="w-full column g-10">
               {{-- CSRF TOKEN --}}
               <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                {{-- NEW INPUT --}}
                <div class="column g-5 w-full">
                    <label for="">Code Value (&#8358;)</label>
                    <div style="border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.05);" class="w-full br-5 cont bg">
                        <input type="number" name="value" placeholder="E.G &#8358;500.00" class="inp input required w-full border-none br-5 bg-transparent">
                    </div>
                </div>
                    {{-- NEW INPUT --}}
                  <div class="column g-5 w-full">
                    <label for="">Code Length</label>
                    <div style="border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.05);" class="w-full br-5 cont bg">
                        <input type="number" name="length" placeholder="E.G 16" value="16" class="inp input required w-full border-none br-5 bg-transparent">
                    </div>
                </div>
                    {{-- NEW INPUT --}}
                 <div class="column g-5 w-full">
                    <label for="">Code Limit</label>
                    <div style="border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.05);" class="w-full br-5 cont bg">
                        <input type="number" name="limit" placeholder="E.G 1000" value="1000" class="inp input required w-full border-none br-5 bg-transparent">
                    </div>
                </div>
                    {{-- SUBMIT BUTTON --}}
                <button class="post">Create Code</button>
             </form>
        </div>
       
    </section>
@endsection
@section('js')
    <script class="js">
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/gift/code/manage') }}'
            }
        }
    </script>
@endsection