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
    </style>
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">

      
        <div class="sidebar-heading"><a class="navbar-brand" href="#"><img src="logo.png" style="max-height: 48px;" alt=""></a></div>

        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
 
        <div>
            <div class="cam">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Example Component</div>
                    
                        <div class="card-body">
                            <div id="videoContainer"></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="btnz">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Example Component</div>
                    
                        <div class="card-body">
              
                            <div id="buttons">
                                @foreach($attrs as $attr)
                                    <p><input type="button" onclick="pushExample(&quot;{{$attr->name}}&quot;)" id="addClass{{$attr->name}}" value="{{$attr->name}}"/>
                                    <button onclick="clearLabel(&quot;{{$attr->name}}&quot;)" id="reset{{$attr->name}}">Reset Class {{$attr->name}}</button>
                                    </p><p><span id="example{{$attr->name}}">0</span> {{$attr->name}} examples</p>
                                    <p>| Confidence in {{$attr->name}} is: <span id="confidence{{$attr->name}}">0</span></p>
                                @endforeach
                            </div>

                            <p>
                                KNN Classifier with mobileNet model labeled this
                                as Class: <span id="result">...</span>
                                with a confidence of <span id="confidence">...</span>
                            </p>
                            <button onclick="classify()" id="buttonPredict">Start predicting!</button><br />
        
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script>

        let attribute = "Marzena";
        let counts = 0;
        function pushExample(attrr){
            addExample(attrr);  
        }
 
   
        $("#addButton").click(function() {
            counts++;
            $("#buttons").append(
            `<p><input type="button" onclick="pushExample(&quot;${attribute+counts}&quot;)" id="addClass${attribute+counts}" value="${attribute+counts}"/>
            <button  id="reset${attribute+counts}">Reset Class ${attribute+counts}</button>
            </p><p><span id="example${attribute+counts}">0</span> ${attribute+counts} examples</p>
            <p>| Confidence in ${attribute+counts} is: <span id="confidence${attribute+counts}">0</span></p>`);
        });
      
    </script>
    <!-- /#page-content-wrapper -->
@endsection
