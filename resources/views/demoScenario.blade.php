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

<script>
// Copyright (c) 2018 ml5
//
// This software is released under the MIT License.
// https://opensource.org/licenses/MIT

/* ===
ml5 Example
KNN Classification on Webcam Images with mobileNet. Built with p5.js
=== */
let video;
let button1;
// Create a KNN classifier
const knnClassifier = ml5.KNNClassifier();
let featureExtractor;

function setup() {
  // Create a featureExtractor that can extract the already learned features from MobileNet
  featureExtractor = ml5.featureExtractor('MobileNet', modelReady);
  noCanvas();
  // Create a video element
  video = createCapture(VIDEO);
  // Append it to the videoContainer DOM element
  video.parent('videoContainer');
  // Create the UI buttons
 
}

function modelReady(){
  console.log("MobileNet Loaded");
}

// Add the current frame from the video to the classifier
function addExample(label) {
  // Get the features of the input video
  const features = featureExtractor.infer(video);
  // You can also pass in an optional endpoint, defaut to 'conv_preds'
  // const features = featureExtractor.infer(video, 'conv_preds');
  // You can list all the endpoints by calling the following function
  // console.log('All endpoints: ', featureExtractor.mobilenet.endpoints)

  // Add an example with a label to the classifier
  knnClassifier.addExample(features, label);
  updateCounts(label);
}

// Predict the current frame.
function classify() {
  // Get the total number of labels from knnClassifier
  const numLabels = knnClassifier.getNumLabels();

  if (numLabels <= 0) {
    console.error('There is no examples in any label');
    return;
  }
  // Get the features of the input video
  const features = featureExtractor.infer(video);

  // Use knnClassifier to classify which label do these features belong to
  // You can pass in a callback function `gotResults` to knnClassifier.classify function
  knnClassifier.classify(features, gotResults);
  // You can also pass in an optional K value, K default to 3
  // knnClassifier.classify(features, 3, gotResults);

  // You can also use the following async/await function to call knnClassifier.classify
  // Remember to add `async` before `function predictClass()`
  // const res = await knnClassifier.classify(features);
  // gotResults(null, res);
}

// // A util function to create UI buttons
// function createButtons() {
//   // When the A button is pressed, add the current frame
//   // from the video with a label of "rock" to the classifier
//   buttonA = select('#addClassRock');
  
//   buttonA.mousePressed(function() {
//     addExample('Rock');
//   });

//   // When the B button is pressed, add the current frame
//   // from the video with a label of "paper" to the classifier
//   buttonB = select('#addClassPaper');
//   buttonB.mousePressed(function() {
//     addExample('Paper');
//   });

//   // When the C button is pressed, add the current frame
//   // from the video with a label of "scissor" to the classifier


//   // Reset buttons
//   resetBtnA = select('#resetRock');
//   resetBtnA.mousePressed(function() {
//     clearLabel('Rock');
//   });
	
//   resetBtnB = select('#resetPaper');
//   resetBtnB.mousePressed(function() {
//     clearLabel('Paper');
//   });
	

//   // Predict button
//   buttonPredict = select('#buttonPredict');
//   buttonPredict.mousePressed(classify);

//   // Clear all classes button
//   buttonClearAll = select('#clearAll');
//   buttonClearAll.mousePressed(clearAllLabels);

//   // Load saved classifier dataset
//   buttonSetData = select('#load');
//   buttonSetData.mousePressed(loadMyKNN);

//   // Get classifier dataset
//   buttonGetData = select('#save');
//   buttonGetData.mousePressed(saveMyKNN);
// }



// Show the results
function gotResults(err, result) {
  // Display any error
  if (err) {
    console.error(err);
  }

  if (result.confidencesByLabel) {
    // const confidences = result.confidencesByLabel; 
    // result.label is the label that has the highest confidence
    if (result.label) {
      select('#result').html(result.label);
      // select('#confidence').html(`${confidences[result.label] * 100} %`);
    }
    

  }

  classify();
}

// Update the example count for each label	
function updateCounts(attr) {
  const counts = knnClassifier.getCountByLabel(); 
  select(`#example${attr}`).html(counts[attr] || 0);


}

// Clear the examples in one label
function clearLabel(label) {
  knnClassifier.clearLabel(label);
  updateCounts(label);
}

// Clear all the examples in all labels
function clearAllLabels() {
  knnClassifier.clearAllLabels();
  updateCounts();
}

// Save dataset as myKNNDataset.json
function saveMyKNN() {
  knnClassifier.save('myKNNDataset');
}

// Load dataset to the classifier
function loadMyKNN() {
  knnClassifier.load('./myKNNDataset.json', updateCounts);
}
</script>

<script>

    function add(){

    }

</script>
   
@endsection
