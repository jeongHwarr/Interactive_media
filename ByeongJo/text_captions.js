videoElement = document.getElementById("myvideo");
videoElement.addEventListener("mousedown", mouseHandler, false);

  function getElementCSSSize(el) {
    var cs = getComputedStyle(el);
    var w = parseInt(cs.getPropertyValue("width"), 10);
    var h = parseInt(cs.getPropertyValue("height"), 10);
    return {width: w, height: h}
  }

    var left = 0;
    var top = 0;

  function mouseHandler(event) {
    var size = getElementCSSSize(this);
    var scaleX = this.videoWidth / size.width;
    var scaleY = this.videoHeight / size.height;

    var rect = this.getBoundingClientRect();  
    var x = ((event.clientX - rect.left) * scaleX + 0.5)|0;
    var y = ((event.clientY - rect.top ) * scaleY + 0.5)|0;

    left_pos = x;
    top_pos = y;

   document.getElementById("x_point").innerHTML = x;
   document.getElementById("y_point").innerHTML = y;

   }

  var a = document.getElementById('time1').value;
  var b = document.getElementById('time2').value;
  var video = document.getElementById('myvideo');

  function myfunction(a,b){

  video.addEventListener('timeupdate', function() {
    if (video.currentTime >= parseInt(a) && video.currentTime < parseInt(b)) {
        $('#overlay').css('display', 'block').css('left', left_pos +'px').css('top',top_pos +'px' );
       } else {
         $('#overlay').css('display', 'none');
              }
    }, false);
  }

  function myfunction2(a,b){
    video.addEventListener('timeupdate', function() {
      if (video.currentTime >= parseInt(a) && video.currentTime < parseInt(b)) {
           $('#overlay2').css('display', 'block').css('left', left_pos +'px').css('top',top_pos +'px' );
           }else {
           $('#overlay2').css('display', 'none');
           }
      }, false);
  }
