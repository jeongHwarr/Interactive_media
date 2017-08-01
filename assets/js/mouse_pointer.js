function addClickEvent(videoElement,target_video){
  videoElement.addEventListener("mousedown", mouseHandler, false);
  videoElement.param = target_video;
}


//*************CSS 사이즈 받아오는 함수**************//
function getElementCSSSize(el) {
  var cs = getComputedStyle(el);
  var w = parseInt(cs.getPropertyValue("width"), 10);
  var h = parseInt(cs.getPropertyValue("height"), 10);
  return {width: w, height: h}
}

//*************마우스 포인터 받아오는 함수**************//
function mouseHandler(event) {
  //원래 VideoJS 화면 클릭시 playtoggle를 막기 위해 한번 더 토글
  target_video = event.target.param;
  if(target_video.paused()){
    target_video.play();
  }else{
    target_video.pause();
  }
  //
  var size = getElementCSSSize(this);
  var scaleX = this.videoWidth / size.width;
  var scaleY = this.videoHeight / size.height;

  var rect = this.getBoundingClientRect();  // absolute position of element
  var x = ((event.clientX - rect.left) * scaleX + 0.5)|0; // round to integer
  var y = ((event.clientY - rect.top ) * scaleY + 0.5)|0;

  console.log("x : " + x);
  console.log("y : " + y);

  $('#input_waves_pos_x').val(x);
  $('#input_waves_pos_y').val(y);
  $('#input_caption_pos_x').val(x);
  $('#input_caption_pos_y').val(y);
  $('#input_sticker_pos_x').val(x);
  $('#input_sticker_pos_y').val(y);

  $('#input_waves_start_time').val(video.currentTime.toFixed(3));
  $('#startTime_captions').val(video.currentTime.toFixed(3));
  $('#startTime_stickers').val(video.currentTime.toFixed(3));
}
