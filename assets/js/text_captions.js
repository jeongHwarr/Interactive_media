// videoElement = document.getElementById("media2");
// videoElement.addEventListener("mousedown", mouseHandler, false);
//
//   function getElementCSSSize(el) {
//     var cs = getComputedStyle(el);
//     var w = parseInt(cs.getPropertyValue("width"), 10);
//     var h = parseInt(cs.getPropertyValue("height"), 10);
//     return {width: w, height: h}
//   }
//
//     var left = 0;
//     var top = 0;
//
//   function mouseHandler(event) {
//     var size = getElementCSSSize(this);
//     var scaleX = this.videoWidth / size.width;
//     var scaleY = this.videoHeight / size.height;
//
//     var rect = this.getBoundingClientRect();
//     var x = ((event.clientX - rect.left) * scaleX + 0.5)|0;
//     var y = ((event.clientY - rect.top ) * scaleY + 0.5)|0;
//
//     left_pos = x;
//     top_pos = y;
//
//    document.getElementById("x_point").innerHTML = x;
//    document.getElementById("y_point").innerHTML = y;
//
//    }

function set1_xy(x,y){
  $('#overlay1').css('display', 'block');
  $('#overlay1').css('top', x + 'px').css('left', y+ 'px');
  return;
}
function set2_xy(x,y){
  $('#overlay2').css('display', 'block');
  $('#overlay2').css('top', x + 'px').css('left', y+ 'px');
  return;
}
function set3_xy(x,y){
  $('#overlay3').css('display', 'block');
  $('#overlay3').css('top', x + 'px').css('left', y+ 'px');
  return;
}
function set4_xy(x,y){
  $('#overlay4').css('display', 'block');
  $('#overlay4').css('top', x + 'px').css('left', y+ 'px');
  return;
}

var video = document.getElementById('media2');
function myfunction1(s,t,x,y){
  video.addEventListener('timeupdate', function() {
    if (video.currentTime >= parseInt(s) && video.currentTime < parseInt(t) && !video.paused) {
      set1_xy(x,y);
         }else {
         $('#overlay1').css('display', 'none');
         }
    }, false);
}


function myfunction2(s,t,x,y){
  video.addEventListener('timeupdate', function() {
    if (video.currentTime >= parseInt(s) && video.currentTime < parseInt(t) && !video.paused) {
         set2_xy(x,y);
         }else {
         $('#overlay2').css('display', 'none');
         }
    }, false);
}

function myfunction3(s,t,x,y){
  video.addEventListener('timeupdate', function() {
    if (video.currentTime >= parseInt(s) && video.currentTime < parseInt(t) && !video.paused) {
        set3_xy(x,y);
         }else {
         $('#overlay3').css('display', 'none');
         }
    }, false);
}

function myfunction4(s,t,x,y){
  video.addEventListener('timeupdate', function() {
    if (video.currentTime >= parseInt(s) && video.currentTime < parseInt(t) && !video.paused) {
         set4_xy(x,y);
         }else {
         $('#overlay4').css('display', 'none');
         }
    }, false);
}
