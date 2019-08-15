@extends('layouts.app')

@section('content')

    <style>
        
        video {
    z-index: 0;
    background-size: 100% 100%;

    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    margin:auto !important;
}
.cam{
    margin:15px;
}
.btnz{
    margin:15px;
}
.stuff{
    margin:6px;
    padding:6px;
    float:left;
}
    </style>


    <!-- Page Content -->
    <div class="container col-md-5" style="margin:15px;">
        <div class="" style="margin-right:0px !important;">
            <div class="card">
                <div class="card-header">All Your Scenarios</div>
            
                <div class="card-body">
                    
                    @foreach ($scenarios as $scenario)
                        <a class="btn btn-light" href="scenario/{{$scenario->id}}">
                        <h2>{{$scenario->name}}</h2>
                        </a>
                        <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>




   
@endsection
