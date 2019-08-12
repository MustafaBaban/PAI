<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js" type="text/javascript"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <h2>KNN Classification on Webcam Images with mobileNet. Built with p5.js</h2>
  <div id="videoContainer"></div>
  <p id="status">Loading Model...</p>
  <div>
    <button id="load">Load Dataset</button><br />
    <p>If you load this sample classifer dataset. Try to make rock, paper, or scissor gestures to see if the classifier can class them.<br />
      If this sample dataset doesn't work well for you, you could train your own classifier,<br />
      and use the 'Save Dataset' button below to create your own myKNNDataset.json file,<br />
      and replace the myKNNDataset.json in this folder.'
    </p>
  </div>
  <br /><p>
    <span class="emoji"> ✊ </span><button id="addClassRock">Add an Example to Class Rock</button>
    <button id="resetRock">Reset Class Rock</button>
    </p><p><span id="exampleRock">0</span> Rock examples</p>
    <p>| Confidence in Rock is: <span id="confidenceRock">0</span></p>

    <br /><span class="emoji"> 🖐 </span><button id="addClassPaper">Add an Example to Class Paper</button>
    <button id="resetPaper">Reset Class Paper</button>
    <p><span id="examplePaper">0</span> Paper examples</p>
    <p>| Confidence in Paper is: <span id="confidencePaper">0</span></p>

    <br /><span class="emoji"> ✌️ </span><button id="addClassScissor">Add an Example to Class Scissor</button>
    <button id="resetScissor">Reset Class Scissor</button>
    <p><span id="exampleScissor">0</span> Scissor examples</p>
    <p>| Confidence in Scissor is: <span id="confidenceScissor">0</span></p>
  
  <br />
  <p>
    <button id="buttonPredict">Start predicting!</button><br />
    <button id="clearAll">Clear all classes</button><br />
  </p>
  <p>
    KNN Classifier with mobileNet model labeled this
    as Class: <span id="result">...</span>
    with a confidence of <span id="confidence">...</span>
  </p>
  <div><button id="save">Save Dataset</button></div>

 <script src="js/sketch.js"></script>

</body>
</html>
