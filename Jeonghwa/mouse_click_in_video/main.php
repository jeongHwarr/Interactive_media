<?php
include 'constants.php';
include '/config/dbconn.php';
include '/util/queryUtil.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="<?=CSSROOT?>/main.css" rel="stylesheet">
    <!-- video JS -->
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
    <!-------------->
    <title> Test </title>
  </head>

  <body>
    <?php
    $querystr = 'SELECT * FROM medias';
    $result = queryForSelect($db, $querystr);
    ?>

<div id="video_div">
  <video
      id="myvideo"
      class="video-js"
      controls
      preload="auto"
      data-setup='{}'>
    <source src="http://media.w3.org/2010/05/sintel/trailer.mp4" type="video/mp4"></source>
    <source src="http://media.w3.org/2010/05/sintel/trailer.webm" type="video/webm"></source>
    <source src="http://media.w3.org/2010/05/sintel/trailer.ogv" type="video/ogg"></source>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">
        supports HTML5 video
      </a>
    </p>
  </video>
</div>


    <script type="text/javascript">

      videoElement = document.getElementById("myvideo");
      videoElement.addEventListener("mousedown", mouseHandler, false);
      video = videojs('myvideo');

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
        if(video.paused()){
          video.play();
        }
        else{
          video.pause();
        }

        $('#myvideo').removeClass( 'controls-enabled' );

        var size = getElementCSSSize(this);
        var scaleX = this.videoWidth / size.width;
        var scaleY = this.videoHeight / size.height;

        var rect = this.getBoundingClientRect();  // absolute position of element
        var x = ((event.clientX - rect.left) * scaleX + 0.5)|0; // round to integer
        var y = ((event.clientY - rect.top ) * scaleY + 0.5)|0;

        console.log("x : " + x);
        console.log("y : " + y);
        console.log("Video Current Time :" + videoElement.currentTime);
      }
    </script>

  </body>

</html>
