function addClickEvent(videoElement){
  videoElement.addEventListener("mousedown", mouseHandler, false);
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
  if(this.tagName=='VIDEO'){
    var size = getElementCSSSize(this);
    var scaleX = this.videoWidth / size.width;
    var scaleY = this.videoHeight/ size.height;
    var rect = this.getBoundingClientRect();  // absolute position of element

    event.preventDefault();
    switch(event.which){
      case 1: //left click
        $('#input_waves_start_time').val(video.currentTime.toFixed(3));
        $('#startTime_captions').val(video.currentTime.toFixed(3));
        $('#startTime_stickers').val(video.currentTime.toFixed(3));
        video.pause();
        break;

      case 2: //wheel click
        var x = ((event.clientX - rect.left) * scaleX + 0.5)|0; // round to integer
        var y = ((event.clientY - rect.top ) * scaleY + 0.5)|0;
        $('#input_waves_pos_x').val(x);
        $('#input_waves_pos_y').val(y);
        $('#input_caption_pos_x').val(x);
        $('#input_caption_pos_y').val(y);
        $('#input_sticker_pos_x').val(x);
        $('#input_sticker_pos_y').val(y);
        video.play();
        break;

      case 3: //right click
        $('#input_waves_end_time').val(video.currentTime.toFixed(3));
        $('#endTime_captions').val(video.currentTime.toFixed(3));
        $('#endTime_stickers').val(video.currentTime.toFixed(3));
        break;
    }
  }


}
