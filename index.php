<?php
include 'constants.php';
include './assets/config/dbconn.php';
include './assets/util/queryUtil.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Editor ver0.5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/progress-bars1.css">
    <link rel="stylesheet" href="assets/css/waves.css" />
    <link rel="stylesheet" href="assets/css/slide.css" />
    <link rel="stylesheet" href="assets/css/captions.css">
    <link rel="stylesheet" href="assets/css/stickers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- video JS -->
    <script src="./assets/video_js/video_js.js"></script>
    <link href="./assets/video_js/video_js.css" rel="stylesheet">
    <script src="./assets/video_js/videojs_ie8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    <!-- intro_js-->
    <script src="./assets/intro_js/intro_min.js"></script>
    <link rel="stylesheet" href="./assets/intro_js/introjs_min.css">
    <!-- <link rel="stylesheet" href="./assets/intro_js/introjs-rtl_min.css"> -->

    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Editor Ver 0.5</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li role="presentation"><button class="btn btn-primary" id="btn_help">사용법</button></li>
                    <li role="presentation"><button class="btn btn-success" id="btn_project_save" type="button" data-step="8" data-position="left" data-intro="모든 변경 사항은 이 버튼을 눌러야만 최종 저장 됩니다">프로젝트 저장</button></li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="contents_wrapper" class="main div"> <!--전체를 감싸는 div-->

        <div id="div_first" class="section_media"  style="visibility:hidden"><!--영상 섹션 div-->
            <!--media1 박스 시작-->
            <div class="col-lg-12 col-lg-offset-0 m_grid">
              <div id="m1_wrapper">
                <video
                  id="media1"
                  class="video-js"
                  preload="auto"
                  data-setup='{}'>
                <!-- <source id="media1_video_src" src="assets/file/media/pianist.mp4" type="video/mp4"></source> -->
                <!-- <source src="http://media.w3.org/2010/05/sintel/trailer.webm" type="video/webm"></source>
                <source src="http://media.w3.org/2010/05/sintel/trailer.ogv" type="video/ogg"></source> -->
                <p class="vjs-no-js">
                  To view this video please enable JavaScript, and consider upgrading to a
                  web browser that
                  <a href="http://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video
                  </a>
                </p>
              </video>
              </div>
            </div>
            <!--media1 박스 종료-->
            <div class="col-md-12" id="separate">
                <hr>
            </div>
            <!--media2 박스 시작-->
            <div class="col-lg-12 col-lg-offset-0 m_grid step1" oncontextmenu="return false;">
                <div class="waves-effect">
                    <video data-step="1" data-intro="이 영상 위에서 편집 작업을 할 수 있습니다"
                        id="media2"
                        class="video-js waves-box captions_p sticker_d"
                        controls
                        preload="auto"
                        data-setup='{}'>
                    <!-- <source id="media2_video_src" src="assets/file/media/pianist.mp4" type="video/mp4"></source> -->
                    <!-- <source src="http://media.w3.org/2010/05/sintel/trailer.webm" type="video/webm"></source>
                    <source src="http://media.w3.org/2010/05/sintel/trailer.ogv" type="video/ogg"></source> -->
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                        </a>
                    </p>
                        </div>
                </video>
            </div>
        </div>

        <div id="div_second" class="section_tab"><!--우측 탭 영역-->
            <div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Waves</a></li>
                    <li data-step="6" data-position="left" data-intro="원하는 효과를 클릭하여 효과를 설정할 수 있습니다"><a href="#tab-2" role="tab" data-toggle="tab">Captions</a></li>
                    <li><a href="#tab-3" role="tab" data-toggle="tab">Stickers</a></li>
                </ul>
                <div class="tab-content">

                    <!--waves 효과 탭 시작-->
                    <div class="tab-pane active" role="tabpanel" id="tab-1"> <!--첫번째 탭-->
                        <div class="row">
                            <div class="col-md-12" id="section_waves_input"
                            data-step="5" data-position="bottom" data-intro="좌클릭(시작시간)→휠클릭(위치설정)→우클릭(끝나는시간) 순서로 작업을 하시는 것이 편합니다.
                            시작시간을 설정하면 영상이 자동으로 멈추고, 멈춘 동안에 휠을 클릭하여 위치를 설정하면 영상이 다시 재생됩니다" >
                                <form id = "waves_set" role="form" data-toggle="validator"> <!--입력 폼-->
                                    <div class="row form-group">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_waves"
                                                    data-minlength="2" data-error="제목이 너무 짧습니다." placeholder="제목없음">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>

                                        <div>
                                          <div class="col-lg-4 col-md-12" class="span6"
                                              data-step="2" data-position="bottom" data-intro="효과가 나오기 시작할 시간을 의미합니다. 편집 영상에서 마우스 `좌클릭`시 자동으로 값이 들어갑니다">
                                              <input id="input_waves_start_time" class="form-control time_start" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">

                                          </div>
                                        </div>

                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12"
                                             data-step="4" data-position="bottom" data-intro="효과가 끝날 시간을 의미합니다. 편집 영상에서 마우스 `우클릭`시 자동으로 값이 들어갑니다">
                                            <input id="input_waves_end_time" class="form-control time_end" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-md-12 help-block with-errors"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"
                                             data-step="3" data-position="bottom" data-intro="효과가 나올 위치를 의미합니다. 편집 영상에서 원하는 위치에 마우스 `휠클릭`시 자동으로 값이 들어갑니다">
                                            <p class="tab_title">Position </p>
                                            <div class="row  form-group">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_waves_pos_x" class="form-control pos_x" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_waves_pos_y" class="form-control pos_y" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                                <div class="col-md-12 help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="extra_waves" style="display: none">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Duration</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input id="input_waves_duration" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Delay</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input id="input_waves_delay" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Scale</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input id="input_waves_scale" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="tab_title">Translate</p>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                            <p class="tab_cont">X</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <input id="input_waves_translate_x" class="form-control pos_x" type="text">
                                                        </div>
                                                        <div class="col-lg-2 col-md-12">
                                                            <p class="tab_cont">Y</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <input id="input_waves_translate_y" class="form-control pos_y" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Color</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <select class="form-control" id="color_waves">
                                                            <option value="0">black</option>
                                                            <option value="1">blue</option>
                                                            <option value="2">red</option>
                                                            <option value="3">green</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--extra_waves end-->
                                    <button class="btn btn-default" type="button" id="more_op_waves">추가 옵션</button>
                                    <button id="btn-make-effect" class="btn btn-default input_effects" type="button">미리보기</button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-default" type="hidden" id="waves_copy" value="효과 복제"></input> <!--효과복제 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="waves_save" value="효과 저장" data-position="left" data-step="6" data-intro="설정한 효과를 임시적으로 저장할 수 있습니다"></input> <!--효과저장/수정 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="waves_delete" value="효과 삭제"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="waves_modify_cancel" value="취소"> </input> <!--효과수정 취소 버튼-->
                                    <input type="hidden" id="waves_index" value="">
                                </form>
                                <!--waves추가옵션-->
                            </div><!--section waves_input end-->
                            <div class="col-md-12">
                              <hr>
                            </div>
                            <div class="col-md-12" id="section_waves_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">Effects View</p>
                                    </div>
                                    <div class="col-md-12 ">
                                      <div class="waves-effect preview" style="margin:0px 40px; width:240px; height:130px;">
                                      <div class="test-box">
                                      </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <!--waves 효과 탭 종료-->

                    <!--caption 효과탭 시작-->
                    <div class="tab-pane" role="tabpanel" id="tab-2"> <!--두번째 탭-->
                        <div class="row">
                            <div class="col-md-12" id="section_captions_input">
                                <form id = "captions_set" role="form" data-toggle="validator"> <!--입력 폼-->
                                    <div class="row form-group">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_captions" data-minlength="2" data-error="제목을 두글자 이상 입력하세요" placeholder="제목없음">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Caption </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="context_captions" placeholder="화면 입력 내용">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Animation</p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                              <select class="form-control" id="animation_captions">
                                                  <option value="none">Choose Animation!</option>
                                                  <option value="animated infinite bounceOut">bounceOut</option>
                                                  <option value="animated infinite fadeIn">fadeIn</option>
                                                  <option value="animated infinite bounceIn">bounceIn</option>
                                                  <option value="animated infinite rotateIn">rotateIn</option>
                                                  <option value="animated infinite rotateInDownLeft">rotateInDownLeft</option>
                                                  <option value="animated infinite rotateInDownRight">rotateInDownRight</option>
                                                  <option value="animated infinite rotateInUpLeft">rotateInUpLeft</option>
                                                  <option value="animated infinite rotateInUpRight">rotateInUpRight</option>
                                                  <option value="animated infinite rotateOut">rotateOut</option>
                                                  <option value="animated infinite shake">shake</option>
                                                  <option value="animated infinite swing">swing</option>
                                                  <option value="animated infinite rubberBand">rubberBand</option>
                                                  <option value="animated infinite flash">flash</option>
                                                  <option value="animated infinite bounce">bounce</option>
                                                  <option value="animated infinite hinge">hinge</option>
                                                  <option value="animated infinite zoomOutUP">zoomOutUP</option>
                                                  <option value="animated infinite zoomOutRight">zoomOutRight</option>
                                                  <option value="animated infinite zoomOutLeft">zoomOutLeft</option>
                                                  <option value="animated infinite zoomOutDown">zoomOutDown</option>
                                                  <option value="animated infinite zoomOut">zoomOut</option>
                                                  <option value="animated infinite lightSpeenIn">lightSpeedIn</option>
                                                  <option value="animated infinite jello">jello</option>
                                                  <option value="animated infinite wobble">wobble</option>
                                                  <option value="animated infinite tada">tada</option>
                                                  <option value="animated infinite pulse">pulse</option>
                                                  <option value="animated infinite flip">flip</option>
                                                  <option value="animated infinite flipInX">flipInX</option>
                                                  <option value="animated infinite flipInY">flipInY</option>
                                                  <option value="animated infinite flipOutX">flipOutX</option>
                                                  <option value="animated infinite flipOutY">flipOutY</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_start" id="startTime_captions" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_end" id="endTime_captions" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-md-12 help-block with-errors"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Position </p>
                                            <div class="row form-group">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_caption_pos_x" class="form-control pos_x" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_caption_pos_y" class="form-control pos_y" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                                <div class="col-md-12 help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="extra_captions" style="display: none">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Font Size</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input class="form-control" type="text" id="font_size_captions" value="20">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Delay</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input class="form-control" id="delay_captions" type="number" step="0.0001" min="1" data-error="0은 입력할수 없습니다." value="1">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Color</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <select class="form-control" id="color_captions">
                                                            <option value="red">Red</option>
                                                            <option value="blue">Blue</option>
                                                            <option value="yellow">Yellow</option>
                                                            <option value="gray">Gray</option>
                                                            <option value="pink">Pink</option>
                                                            <option value="white">White</option>
                                                            <option value="pupple">Pupple</option>
                                                            <option value="black">Black</option>
                                                            <option value="orange">Orange</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">FontFamily</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <select class="form-control" id="font_name_captions">
                                                          <option value="Fantasy">Fantasy</option>
                                                          <option value="Agency FB">Agency FB</option>
                                                          <option value="Arial">Arial</option>
                                                          <option value="BankGothic">BankGothic</option>
                                                          <option value="Cursive">Cursive</option>
                                                          <option value="Impact">Impact</option>
                                                          <option value="Monospace">Monospace</option>
                                                          <option value="Tw Cen MT">Tw Cen MT</option>
                                                          <option value="Serif">Serif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--extra_captions end-->
                                    <button class="btn btn-default" type="button" id="more_op_captions">추가 옵션</button>
                                    <button class="btn btn-default input_effects" type="button" id="caption_make_effects">미리보기</button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-default" type="hidden" id="captions_copy" value="효과 복제"></input> <!--효과복제 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="captions_save" value="효과 저장"> </input> <!--효과저장/수정 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="captions_delete" value="효과 삭제"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="captions_modify_cancel" value="취소"> </input> <!--효과수정 취소 버튼-->
                                    <input type="hidden" id="captions_index" value="">
                                </form>


                            </div><!--section captions end-->
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12" id="section_captions_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">Effects View</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="example_class" id="caption_example_id" style="color:red; text-align:center; font-size: 50px">example</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <!--caption 효과탭 종료-->

                    <!--스티커 효과탭 시작-->
                    <div class="tab-pane" role="tabpanel" id="tab-3"> <!--세번째 탭-->
                        <div class="row">
                            <div class="col-md-12" id="section_stickers_input">
                                <form id = "stickers_set" role="form" data-toggle="validator"> <!--입력 폼-->
                                    <div class="row form-group">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_stickers" data-minlength="2" data-error="제목을 두글자 이상 입력하세요" placeholder="제목없음">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Stickers </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group"> <!--스티커 드롭다운-->
                                                <input type="text" class="form-control" id="option_name" value="" placeholder="스티커를 골라주세요" disabled>
                                                <input type="text" id="option_stickers" value="" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">고르기</button>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Animation</p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                              <select class="form-control" id="animation_stickers">
                                                <option value="none">Choose Animation!</option>
                                                <option value="animated infinite bounceOut">bounceOut</option>
                                                <option value="animated infinite fadeIn">fadeIn</option>
                                                <option value="animated infinite bounceIn">bounceIn</option>
                                                <option value="animated infinite rotateIn">rotateIn</option>
                                                <option value="animated infinite rotateInDownLeft">rotateInDownLeft</option>
                                                <option value="animated infinite rotateInDownRight">rotateInDownRight</option>
                                                <option value="animated infinite rotateInUpLeft">rotateInUpLeft</option>
                                                <option value="animated infinite rotateInUpRight">rotateInUpRight</option>
                                                <option value="animated infinite rotateOut">rotateOut</option>
                                                <option value="animated infinite shake">shake</option>
                                                <option value="animated infinite swing">swing</option>
                                                <option value="animated infinite rubberBand">rubberBand</option>
                                                <option value="animated infinite flash">flash</option>
                                                <option value="animated infinite bounce">bounce</option>
                                                <option value="animated infinite hinge">hinge</option>
                                                <option value="animated infinite zoomOutUP">zoomOutUP</option>
                                                <option value="animated infinite zoomOutRight">zoomOutRight</option>
                                                <option value="animated infinite zoomOutLeft">zoomOutLeft</option>
                                                <option value="animated infinite zoomOutDown">zoomOutDown</option>
                                                <option value="animated infinite zoomOut">zoomOut</option>
                                                <option value="animated infinite lightSpeenIn">lightSpeedIn</option>
                                                <option value="animated infinite jello">jello</option>
                                                <option value="animated infinite wobble">wobble</option>
                                                <option value="animated infinite tada">tada</option>
                                                <option value="animated infinite pulse">pulse</option>
                                                <option value="animated infinite flip">flip</option>
                                                <option value="animated infinite flipInX">flipInX</option>
                                                <option value="animated infinite flipInY">flipInY</option>
                                                <option value="animated infinite flipOutX">flipOutX</option>
                                                <option value="animated infinite flipOutY">flipOutY</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_start" id="startTime_stickers" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_end" id="endTime_stickers" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-md-12 help-block with-errors"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <p class="tab_title">Position </p>
                                            <div class="row">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_sticker_pos_x" class="form-control pos_x" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_sticker_pos_y" class="form-control pos_y" type="number" step="0.0001" min="0" data-error="위치를 입력하세요" placeholder="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="extra_stickers" style="display: none">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="tab_title">Size</p>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                            <p class="tab_cont">width</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <input class="form-control pos_x" type="text" id="width_stickers" value="20">
                                                        </div>
                                                        <div class="col-lg-2 col-md-12">
                                                            <p class="tab_cont">height</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <input class="form-control pos_y" type="text" id="height_stickers" value="20">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Delay</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input class="form-control" id="delay_stickers" type="number" data-error="0은 입력할수 없습니다." step="0.0001" min="1" value="1">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--div extra_stikers end-->
                                    <button class="btn btn-default" type="button" id="more_op_stickers">추가 옵션</button>
                                    <button class="btn btn-default input_effects" type="button" id="sticker_make_effects">미리보기</button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-default" type="hidden" id="stickers_copy" value="효과 복제"></input> <!--효과복제 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="stickers_save" value="효과 저장"></input> <!--효과저장 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="stickers_delete" value="효과 삭제"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="stickers_modify_cancel" value="취소"> </input> <!--효과수정 취소 버튼-->
                                    <input type="hidden" id="stickers_index" value="">
                                </form>

                            </div><!--section stickers input end-->

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-12" id="section_stcikers_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">Effects View</p>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="example_class"><img id="sticker_example_id" src="assets/img/user-photo.jpg"/></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <!--스티커 효과탭 종료-->
                </div> <!--tab_content 종료-->
            </div>
        </div> <!--우측 탭 영역 종료-->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">스티커 고르기</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="modal_row">
                        <!--modal contents-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div>

            </div>
        </div>


        <div id="div_third" class="section_lists"> <!--효과 리스트-->
            <div class="row">
                <div class="col-lg-10"><p class="tab_title">Effects List</p></div>
                <div class="col-lg-2">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" id="list_exit"></span>
                </div>
            </div>
            <div class="list-group" id="list_effects">
            </div>

        </div>

      </div>
      <div id = "icon">
              <button class="btn btn-primary" id="list_btn" data-step="7" data-position="left" data-intro="버튼을 눌러 임시 저장한 효과 목록을 열고 목록을 클릭하여 변경 할 수 있습니다">
                  Lists
                  <span class="badge">
                      <div class="bar_icon"></div>
                  <div class="bar_icon"></div>
                  <div class="bar_icon"></div>
                  </span>
              </button>
      </div>
    </div>
</body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/captions.js"></script>
    <script src="assets/js/stickers.js"></script>
    <script src="assets/js/session.js"></script>
    <script src="assets/js/effect_session_save.js"></script>
    <script src="assets/js/effect_session_modify.js"></script>
    <script src="assets/js/effect_session_delete.js"></script>
    <script src="assets/js/project_load.js"></script>
    <script src="assets/js/button.js"></script>
    <script src="assets/js/mouse_pointer.js"></script>
    <script src="assets/js/effect_default_value.js"></script>
    <script src="assets/js/effect_list.js"></script>
    <script src="assets/js/synchronize.js"></script>

    <script type="text/javascript">
    // introJs().setOption('showProgress', true).start();
      // introJs().start();

      $('form').submit(function (evt) {
          //prevents the default action
          evt.preventDefault();
      });
      $("#list_btn").click(function () {
         $("#list_btn").css("display", "none");
         $("#div_third").css("display", "block");
      });
      $("#list_exit").click(function () {
          $("#div_third").css("display", "none");
          $("#list_btn").css("display", "block");
      });
      var pictures = ["1.png","2.png","3.png","4.png","5.png","6.png",
                       "7.png","8.png","9.png","10.png","11.png","12.png",
                        "13.gif","14.png","15.png","god.png","speaker1.png",
                        "speaker2.png","speaker3.png"];
      var picAlt =["구름 말풍선", "뾰족 말풍선", "둥근 말풍선", "둥근 말풍선2",
      "물거품1","물거품2","물거품3","폭탄","음표1","폭팔","선율1","선율2","선율3","음표2",
      "음표3","해골","스피커1","스피커2","스피커3"];
      $(document).ready(function(){
          for(i=0;i<pictures.length;i++){
              $("#modal_row").append("<div class='col-md-3'>"+
                  "<div class='thumbnail'>"+
                  "<img id='"+pictures[i]+"' src='./assets/img/"+pictures[i]+"'  alt='"+(i+1)+"' name='"+picAlt[i]+"'>"+
                  "<div class='caption'>"+
                  "<p>"+picAlt[i]+"</p>"+
                  "</div>"+
                  "</div>"+
                  "</div>")
          }

          $(".modal-body img").click(function () {
              var name = $(this).attr("name");
              var src = $(this).attr("src");
              $("#myModal").modal('hide');
              $("#option_name").val(name);
              $("#option_stickers").val(src);
          });

        //test for session
        console.log(session.get('project_info_session'));
        console.log(session.get('waves_session'));
        console.log(session.get('captions_session'));
        console.log(session.get('stickers_session'));
        console.log(session.get('connect_proper'));

        // if(session.get('connect_proper')==null){
        //     console.log("wrong connect");
        //     alert("잘못된 접근입니다.");
        //     location.href="start.php";
        // }
        initEffectTabValue();
        showEffectList(); //페이지 최하단의 Effect List를 나타낸다. (in effect_list.js)
    });
      //버튼 onclick 구현
      $(document).ready(function(){
          setButtonOnClick();
          $("#btn_help").click(function(){
              introJs().start();
          });
        }
      );

    </script>
    <!-- Caption & Sticker 정보 -->
    <script type="text/javascript">

    //introJs().start();
    var project_info_session_data = session.get('project_info_session')['project_info_session'][0];
    var project_id = project_info_session_data['p_id'];

    //Waves & Caption & Sticker정보, 적용 video
    var waves_session_data = session.get('waves_session')['waves_session'];
    var captions_session_data = session.get('captions_session')['captions_session'];
    var stickers_session_data = session.get('stickers_session')['stickers_session'];

    var video = document.getElementById("media2");

    if(waves_session_data.length==0 && captions_session_data.length==0 && stickers_session_data.length==0){
      introJs().start();
    }

    video.addEventListener('timeupdate', function(){
        Make_caption_effect(); //caption 만드는 함수
        Make_sticker_effect(); //sticker 만드는 함수
    }, false);
    </script>

    <script>
    //<----------------waves 효과--------------->>
    //적용 video, wave가 만들어질 장소
    setWaveEffect("#media2", ".waves-box"); //in waves.js
    </script>

     <script>
     var video = document.getElementById("media2");
     var video_js1 = videojs('media1');
     var video_js2 = videojs('media2');

     //프로젝트 저장시 선택한 비디오로 바꿈
     video_js1.src(project_info_session_data['path']);
     video_js2.src(project_info_session_data['path']);

     //태그를 제대로 VIDEO로 가져왔을 때만 영상을 띄운다.
     $(document).on("sjs:allPlayersReady", function(event) {
       if(video.tagName=='VIDEO'){
          $("#div_first").css("visibility", "visible");
          addClickEvent(video);
         }
       });

    //<----------------영상 synchronize--------------->>
    $.synchronizeVideos(1, "media1","media2"); //in synchronize.js
    video_js1.userActive(false);
    </script>

</html>
