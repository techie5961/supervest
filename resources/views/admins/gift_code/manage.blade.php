@extends('layout.admins.app')
@section('title')
    Manage Gift Codes
@endsection
@section('main')
    <section class="column w-full g-10 p-10">
        <div class="w-full br-5 bg-light p-10 column g-5">
            <div class="row align-center space-between">
                <span class="c-green">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M230.91,124A8,8,0,0,1,228,134.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,121.09l92,53.65,92-53.65A8,8,0,0,1,230.91,124ZM28,86.91l96,56a8,8,0,0,0,8.06,0l96-56a8,8,0,0,0,0-13.82l-96-56a8,8,0,0,0-8.06,0l-96,56a8,8,0,0,0,0,13.82ZM232,192H184a8,8,0,0,0,0,16h48a8,8,0,0,0,0-16Zm-92,23.76-12,7L36,169.09A8,8,0,0,0,28,182.91l96,56a8,8,0,0,0,8.06,0l16-9.33A8,8,0,1,0,140,215.76Z"></path></svg>

                </span>
                <strong class="desc">100</strong>
            </div>
            <span>Total Gift Codes</span>
        </div>
        @if ($codes->isEmpty())
            @include('components.sections',[
                'null' => 'No gift code found'
            ])
        @else
        <strong class="desc grid-full">Gift Codes</strong>
           <div class="grid w-full g-10 pc-grid-2">
             @foreach ($codes as $data)
            <div class="w-full bg-light br-10 p-10 column g-10">
               {{-- NEW ROW --}}
                <div class="row w-full align-center g-10">
                   {{-- CODE --}}
                    <div class="column g-5">
                    <span>Code</span>
                  <div class="row g-5">
                  <strong class="desc">{{ strlen($data->code) > 10 ? substr($data->code,0,10).'....' : $data->code }}</strong>
                  
                  <span onclick="copy('{{ $data->code }}')" class="c-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M200,32H163.74a47.92,47.92,0,0,0-71.48,0H56A16,16,0,0,0,40,48V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V48A16,16,0,0,0,200,32Zm-72,0a32,32,0,0,1,32,32H96A32,32,0,0,1,128,32Z"></path></svg>
                  </span>
                </div>   
                </div>
               
                {{-- ACTION BUTTONS --}}
                <div class="row g-5 m-left-auto">
                    <div onclick="DeletePrompt('{{ url('admins/gift/code/delete?id=').$data->id }}')" class="h-full c-white bg-red pointer no-select br-10 p-10 row justify-center align-center">
                        <strong>Delete</strong>
                    </div>
                     <div onclick="window.location.href='{{ url('admins/gift/code/edit?id='.$data->id.'') }}'" class="h-full c-white pointer bg-green no-select br-10 p-10 row justify-center align-center">
                        <strong>Edit Code</strong>
                    </div>
                </div>

                </div>
                {{-- NEW ROW --}}
                <div class="row w-full space-between align-center g-10">
                    <div class="column g-5">
                        <span>Reward</span>
                        <strong class="font-1">&#8358;{{ number_format($data->value,2) }}</strong>
                    </div>
                     <div style="text-align: end" class="column g-5">
                        <span>Completed/Limit</span>
                        <strong class="font-1">{{ $data->redeemed }}/{{ $data->limit }}</strong>
                    </div>
                </div>
            </div>
                
            @endforeach
           </div>
             @include('components.sections',[
        'paginate' => true,
        'current' => $codes->currentPage(),
        'last' => $codes->lastPage()
     ])
        @endif
    </section>
@endsection
@section('js')
    <script class="js">
        function DeletePrompt(delete_url){
           
                    let data=`<div class="column align-center text-center g-10 w-full">
                       <span class="c-red">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="50" width="50"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

                </span>
    <span>Are you sure you want to delete this gift code?this action cannot be undone</span>
    <div onclick="window.location.href='${delete_url}'" class="w-full br-1000 bg-red c-white no-select row justify-center align-center h-50">
        Yes! Delete this code
    </div>
</div>`;
PopUp(data);
                        
        }
    </script>
@endsection
