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
                <div class="card-header">Your Attributes</div>
               
                <div class="card-body">
        
                    <div id="buttons">
                     
                        <div class="stuff">
                            <p><input type="button" class="btn btn-light" onclick="addExample('Straight')" id="addClassStraight" value="Straight"/>
                            <button class="btn btn-warning" onclick="clearLabel('Straight')" id="resetStraight">Reset Class Straight</button>
                            </p><p><span id="exampleStraight">0</span> Straight examples</p>
                        </div>
                        <div class="stuff">
                            <p><input type="button" class="btn btn-light" onclick="addExample('Leaned')" id="addClassLeaned" value="Leaned"/>
                            <button class="btn btn-warning" onclick="clearLabel('Leaned')" id="resetLeaned">Reset Class Leaned</button>
                            </p><p><span id="exampleLeaned">0</span> Leaned examples</p>
                        </div>
                        <div class="stuff">
                            <p><input type="button" class="btn btn-light" onclick="addExample('Slouched')" id="addClassSlouched" value="Slouched"/>
                            <button class="btn btn-warning" onclick="clearLabel('Slouched')" id="resetSlouched">Reset Class Slouched</button>
                            </p><p><span id="exampleSlouched">0</span> Slouched examples</p>
                        </div>


                    
                    </div>

                    <div class="stuff">
                        Predicting the results as: <span id="result">...</span>
                        
                        <button onclick="classify()" class="btn btn-success" id="buttonPredict">Predict</button><br />
                    </div>

                </div>
            </div>
        </div>
    </div>
            

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script src="https://raw.githubusercontent.com/MustafaBaban/PAI/master/public/js/sketch.js"></script>

<script>

    function add(){

    }

</script>
   
@endsection
