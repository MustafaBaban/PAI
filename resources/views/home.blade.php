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
    <div class="container" style="margin:15px;">
        <div class="col-md-12">
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
                <div class="card-header">Attributes</div>
            
                <div class="card-body">
        
                    <div id="buttons">
                        @foreach($attrs as $attr)
                        <div class="stuff">
                            <p><input type="button" onclick="addExample(&quot;{{$attr->name}}&quot;)" id="addClass{{$attr->name}}" value="{{$attr->name}}"/>
                            <button onclick="clearLabel(&quot;{{$attr->name}}&quot;)" id="reset{{$attr->name}}">Reset Class {{$attr->name}}</button>
                            </p><p><span id="example{{$attr->name}}">0</span> {{$attr->name}} examples</p>
                        </div>    
                        @endforeach
                    </div>

                    <div class="stuff">
                        KNN Classifier with mobileNet model labeled this
                        as Class: <span id="result">...</span>
                        with a confidence of <span id="confidence">...</span>
                    </div>
                    <button onclick="classify()" id="buttonPredict">Start predicting!</button><br />

                </div>
            </div>
        </div>
    </div>
            

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script src="{{url('js/sketch.js')}}"></script>


   
@endsection
