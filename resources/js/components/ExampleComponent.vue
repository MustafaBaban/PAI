<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                
                    <div class="card-body">
                        <div id="videoContainer"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import ml5 from 'ml5';

    export default {
        name: 'app',
        data() {
            return {
                video: {},
                canvas: {},
                stream: {},
                featureExtractor: {},
                context: {},
                features: {},
                pic: [],
                captures: []
            }
        },
        mounted() {
            this.pic = [2,2,2,2,2]
            this.featureExtractor = ml5.featureExtractor('MobileNet', this.done());
            this.video = this.$refs.video;
            if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
                    video.srcObject = stream;
                    this.stream = stream;
                    console.log(this.stream);
                    this.video.play();
                });
            }
        },

 methods: {
    done(){
        console.log("donee");
    },
    capture() {
        this.canvas = this.$refs.canvas;
        this.context = this.canvas.getContext("2d").drawImage(this.video, 0, 0, 660, 480);
        this.features = this.featureExtractor.infer(this.context);
        console.log(this.context);
    }
}
 
    
    }
    
</script>
