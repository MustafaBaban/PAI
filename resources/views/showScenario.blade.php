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
.btn
    {
    border-color:#c9c9c9 !important;
    }
    </style>


    <!-- Page Content -->
    <div class="container col-md-5" style="margin:15px;">
        <div class="" style="margin-right:0px !important;">
            <div class="card">
                <div class="card-header">Video</div>
            
                <div class="card-body">
                    <div id="videoContainer"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="btnz">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$scenario->name}}'s Attributes<button style="float:right;" data-toggle="modal" class="btn btn-primary" data-target="#attributeModal">Add Attribute</button></div>
               
                <div class="card-body">
        
                    <div id="buttons">
                        @foreach($attrs as $attr)
                        <div class="stuff">
                            <p><input type="button" class="btn btn-light" onclick="addExample(&quot;{{$attr->name}}&quot;)" id="addClass{{$attr->name}}" value="{{$attr->name}}"/>
                            <button class="btn btn-warning" onclick="clearLabel(&quot;{{$attr->name}}&quot;)" id="reset{{$attr->name}}">Reset Class {{$attr->name}}</button>
                            </p><p><span id="example{{$attr->name}}">0</span> {{$attr->name}} examples</p>
                        </div>
                        @if($loop->iteration % 2 == 0)
                        <br> 
                        @endif 
                        @endforeach
                    </div>

                    <div class="stuff">
                        Predicting the results as: <span id="result">...</span>
                        
                        <button onclick="classify()" class="btn btn-success" id="buttonPredict">Predict</button><br />
                    </div>

                </div>
            </div>
        </div>
    </div>
            
    @include('createAttributeModal')

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script src="{{url('js/sketch.js')}}"></script>

<script>

    function add(){

    }

</script>
   
@endsection
