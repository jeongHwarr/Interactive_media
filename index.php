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
    <title>Web Editor ver0.1</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/progress-bars1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/waves.css" />
    <link rel="stylesheet" href="assets/css/slide.css" />

    <link rel="stylesheet" href="assets/css/text_captions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- video JS -->
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Editor Ver0.1</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li role="presentation"><button class="btn btn-success" id="btn_project_save" type="button">SAVE</button></li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="contents_wrapper" class="main div"> <!--전체를 감싸는 div-->

        <div id="div_first" class="section_media"><!--영상 섹션 div-->
            <!--media1 박스 시작-->
            <div class="col-lg-6 col-lg-offset-0 col-md-12" >
              <video
                  id="media1"
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
            <!--media1 박스 종료-->
            <!--media2 박스 시작-->
            <div class="col-lg-6 col-md-12">
              <div class="waves-effect">
                <div id="captions_p"></div>
              <video
                id="media2"
                class="video-js waves-box"
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
                <!--스티커 / 그림 인젝션 위치-->
                <div class="animation_1"><p id ="effect_1">으헤헤헤</p></div>
                <div class="animation_2" id ="effect_2"></div>
                <div class="animation_3"><img id="effect_3" alt="img3" src=""></img></div>
                <div class="animation_4" id ="effect_4"></div>
                <div class="sticker" id="stickers_div"></div>
            </div>


            <div class="col-md-12" id="separate">
              <hr>
            </div>

            <div class="col-md-12" id="progress"><!--프로그레스바 영역-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="container">
                            <h2>Progress Bar<small>  context progress</small></h2>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="range range-primary">
                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangePrimary.value=value">
                                        <output id="rangePrimary">50</output>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="range range-info">
                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangeInfo.value=value">
                                        <output id="rangeInfo">50</output>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="range range-danger">
                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangeDanger.value=value">
                                        <output id="rangeDanger">50</output>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--프로그레스바 종료-->
        </div>

        <div id="div_second" class="section_tab"><!--우측 탭 영역-->
            <div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Waves</a></li>
                    <li><a href="#tab-2" role="tab" data-toggle="tab">Captions</a></li>
                    <li><a href="#tab-3" role="tab" data-toggle="tab">Stickers</a></li>
                </ul>
                <div class="tab-content">

                    <!--waves 효과 탭 시작-->
                    <div class="tab-pane active" role="tabpanel" id="tab-1"> <!--첫번째 탭-->
                        <div class="row">
                            <div class="col-md-12" id="section_waves_input">
                                <form id = "waves_set"> <!--입력 폼-->
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_waves">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input id="input_waves_start_time" class="form-control time_start" type="text">
                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input id="input_waves_end_time" class="form-control time_end" type="text" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Position </p>
                                            <div class="row">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_waves_pos_x" class="form-control pos_x" type="text">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_waves_pos_y" class="form-control pos_y" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <!--waves추가옵션-->
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
                                <button class="btn btn-default" type="button" id="more_op_waves">more options</button>
                                <button class="btn btn-default input_effects" type="button">make effects </button> <!--효과넣기 버튼-->
                                <button class="btn btn-primary" type="button" id="waves_save">saves </button> <!--효과저장 버튼-->
                            </div><!--section waves_input end-->
                            <div class="col-md-12">
                              <hr>
                            </div>
                            <div class="col-md-12" id="section_waves_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">effects view</p>
                                    </div>
                                    <div class="col-md-12"><img src="assets/img/user-photo.jpg"></div>
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
                                <form id = "captions_set"> <!--입력 폼-->
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_captions">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Caption </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="context_captions">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Animation</p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" id="animation_captions">
                                                    <option value="">select please</option>
                                                    <option value="bounceOut">bounceOut</option>
                                                    <option value="fadeIn">fadeIn</option>
                                                    <option value="bounceIn">bounceIn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_start" type="text" id="startTime_captions">
                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_end" type="text" id="endTime_captions">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Position </p>
                                            <div class="row">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_caption_pos_x" class="form-control pos_x" type="text">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_caption_pos_y" class="form-control pos_y" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div id="extra_captions" style="display: none">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <p class="tab_title">Font Size</p>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <input class="form-control" type="text" id="font_size_captions">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <p class="tab_title">Delay</p>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <input class="form-control" type="text" id="delay_captions">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <p class="tab_title">Color</p>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" id="color_captions">
                                                        <option value="">select please</option>
                                                        <option value="red">빨강</option>
                                                        <option value="blue">파랑</option>
                                                        <option value="yellow">노랑</option>
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
                                                        <option value="">select please</option>
                                                        <option value="normal">normal</option>
                                                        <option value="italic">italic</option>
                                                        <option value="oblique">oblique</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--extra_captions end-->
                                <button class="btn btn-default" type="button" id="more_op_captions">more options</button>
                                <button class="btn btn-default input_effects" type="button">make effects </button> <!--효과넣기 버튼-->
                                <button class="btn btn-primary" type="button" id="captions_save">saves </button> <!--효과저장 버튼-->
                            </div><!--section captions end-->
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12" id="section_captions_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">effects view</p>
                                    </div>
                                    <div class="col-md-12"><img src="assets/img/user-photo.jpg"></div>
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
                                <form id = "stickers_set"> <!--입력 폼-->
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_stickers">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Stickers </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group"> <!--스티커 드롭다운-->
                                                <select class="form-control" id="">
                                                    <option value="">select please</option>
                                                    <option value="head_bone">해골</option>
                                                    <option value="baby">아기</option>
                                                    <option value="lion">사자</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Animation</p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" id="animation_stickes">
                                                    <option value="">select please</option>
                                                    <option value="bounceOut">bounceOut</option>
                                                    <option value="fadeIn">fadeIn</option>
                                                    <option value="bounceIn">bounceIn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Time </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-1 col-lg-offset-1 col-md-12">
                                            <p class="tab_cont">Start </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_start" type="text" id="startTime_stickers">
                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input class="form-control time_end" type="text" id="endTime_stickers" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="tab_title">Position </p>
                                            <div class="row">
                                                <div class="col-lg-2 col-lg-offset-2 col-md-12">
                                                    <p class="tab_cont">X</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_sticker_pos_x" class="form-control pos_x" type="text">
                                                </div>
                                                <div class="col-lg-2 col-md-12">
                                                    <p class="tab_cont">Y</p>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <input id="input_sticker_pos_y" class="form-control pos_y" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                                        <input class="form-control pos_x" type="text" id="width_stickers">
                                                    </div>
                                                    <div class="col-lg-2 col-md-12">
                                                        <p class="tab_cont">height</p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <input class="form-control pos_y" type="text" id="height_stickers">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <p class="tab_title">Delay</p>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <input class="form-control" type="text" id="delay_stickers">
                                            </div>
                                        </div>
<!--                                        <div class="row">-->
<!--                                            <div class="col-lg-4 col-md-12">-->
<!--                                                <p class="tab_title">Url</p>-->
<!--                                            </div>-->
<!--                                            <div class="col-lg-8 col-md-12">-->
<!--                                                <div class="form-group">-->
<!--                                                    <select class="form-control" id="option_stickers">-->
<!--                                                        <option value="">select please</option>-->
<!--                                                        <option value="head_bone">해골</option>-->
<!--                                                        <option value="B">B</option>-->
<!--                                                        <option value="C">C</option>-->
<!--                                                    </select>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                </div><!--div extra_stikers end-->
                                <button class="btn btn-default" type="button" id="more_op_stickers">more options</button>
                                <button class="btn btn-default input_effects" type="button">make effects</button> <!--효과넣기 버튼-->
                                <button class="btn btn-primary" type="button" id="stickers_save">saves</button> <!--효과저장 버튼-->
                            </div><!--section stickers input end-->

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-12" id="section_stcikers_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">effects view</p>
                                    </div>
                                    <div class="col-md-12"><img src="assets/img/user-photo.jpg"></div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <!--스티커 효과탭 종료-->
                </div> <!--tab_content 종료-->
            </div>
        </div> <!--우측 탭 영역 종료-->

        <div id="div_third" class="section_lists"> <!--효과 리스트-->
            <p class="tab_title">Effects List</p>
            <ul class="list-group" id="list_effects">
                <li class="list-group-item"><span>List Group Item 1</span></li>
                <li class="list-group-item"><span>List Group Item 2</span></li>
                <li class="list-group-item"><span>List Group Item 3</span></li>
            </ul>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/saves.js"></script>
    <script src="assets/js/text_captions.js"></script>
    <script src="assets/js/captions_save.js"></script>
    <script src="assets/js/sticker_save.js"></script>
    <script src="assets/js/session.js"></script>
    <script type="text/javascript">

      var result;

      $(document).ready(function(){
        //for session test
        console.log(session.get('project_info_session'));
        console.log(session.get('waves_session'));
        console.log(session.get('captions_session'));
        console.log(session.get('stickers_session'));

        $.get('./assets/ajax/data.php', {cmd: 'getDataList'});
        $( document ).ajaxSend(function() {
        }).ajaxError(function(){
          console.log("Ajax Request Error!");
        }).ajaxSuccess(function(e,xhr,options,data){
          console.log("Ajax Request Success");
          result = data;
        });
      });
    </script>
    <script>
        //more options 토글 스크립트
        $(document).ready(function(){
            $("#more_op_waves").click(function(){
                $("#extra_waves").slideToggle();
            });
        });

        $(document).ready(function(){
            $("#more_op_captions").click(function(){
                $("#extra_captions").slideToggle();
            });
        });

        $(document).ready(function(){
            $("#more_op_stickers").click(function(){
                $("#extra_stickers").slideToggle();
            });
        });

        $(document).ready(function(){
            $("#waves_save").click(function(){
              save();
            });
        });

        $(document).ready(function(){
          $("#captions_save").click(function(){
            captions_save();
          })
        });

        $(document).ready(function(){
          $("#stickers_save").click(function(){
            stickers_save();
          })
        });

    </script>
    <script type="text/javascript">

    //caption effect 적용
    var video = document.getElementById("media2");
    var temp_id = 99999;
    video.addEventListener('timeupdate', function(){
      for (var i = 0; i<result.captions.length; i++){

         //************* DB로부터 가져온 데이터 저장하는 변수 **************//
         var c_start_t = result.captions[i]['startTime']/1000;
         var c_end_t = result.captions[i]['endTime']/1000;
         var c_x = result.captions[i]['pos_x'];
         var c_y = result.captions[i]['pos_y'];
         var c_animation = result.captions[i]['animation'];
         var c_size = result.captions[i]['size'];
         var c_delay = result.captions[i]['delay'];
         var c_color = result.captions[i]['color'];
         var c_font = result.captions[i]['font'];
         var c_contents = result.captions[i]['contents'];
         var c_id = result.captions[i]['id'];

         if(video.currentTime >= c_start_t && video.currentTime < c_end_t && !video.paused){
           captionEffect.myfunction_c_basic(c_start_t, c_end_t, c_x, c_y, c_animation);
           captionEffect.myfunction_c_size(c_size);
           captionEffect.myfunction_c_delay(c_delay);
           captionEffect.myfunction_c_color(c_color);
           captionEffect.myfunction_c_font(c_font);
           captionEffect.myfunction_c_contents(c_contents);

           if(temp_id!=c_id){
             temp_id=c_id;
             captionEffect.caption_make();
           }
          captionEffect.caption_show();
          }else{
          captionEffect.caption_hide();
          }
        }

     }, false);

     //sticker effect 적용
     var video = document.getElementById("media2");
     video.addEventListener('timeupdate', function(){
       for (var i = 0; i<result.stickers.length; i++){

          //************* DB로부터 가져온 데이터 저장하는 변수 **************//
          var s_start_t = result.stickers[i]['startTime']/1000;
          var s_end_t = result.stickers[i]['endTime']/1000;
          var s_x = result.stickers[i]['pos_x'];
          var s_y = result.stickers[i]['pos_y'];
          var s_animation = result.stickers[i]['animation'];
          var s_width = result.stickers[i]['width'];
          var s_height = result.stickers[i]['height'];
          var s_delay = result.stickers[i]['delay'];
          var s_url = result.stickers[i]['url'];

          if(video.currentTime >= s_start_t && video.currentTime < s_end_t && !video.paused){
              stickerEffect.myfunction_s_basic(s_start_t, s_end_t, s_x, s_y, s_animation);
              stickerEffect.myfunction_s_width(s_width);
              stickerEffect.myfunction_s_height(s_height);
              stickerEffect.myfunction_s_delay(s_delay);
              stickerEffect.myfunction_s_url(s_url);
              stickerEffect.sticker_show();
            }else {
              stickerEffect.sticker_hide();
            }
         }
      }, false);

        //wave effectl 적용
        var video = document.getElementById("media2");
        video.addEventListener('timeupdate', function(){
          for (var i = 0; i<result.waves.length; i++){

             //************* DB정보 저장하는 변수 **************//
             var start_t = result.waves[i]['startTime']/1000;
             var end_t = result.waves[i]['endTime']/1000;
             var x = result.waves[i]['pos_x'];
             var y = result.waves[i]['pos_y'];
             var duration = result.waves[i]['duration'];
             var delay = result.waves[i]['delay'];
             var scale = result.waves[i]['scale']/1000;
             var trans_x = result.waves[i]['trans_x'];
             var trans_y = result.waves[i]['trans_y'];
             var color = result.waves[i]['color'];

             //좌표변환
             var size = getElementCSSSize(video);
             var scaleX = video.videoWidth / size.width;
             var scaleY = video.videoHeight / size.height;
             var rect = video.getBoundingClientRect();  // absolute position of element
             x = (x - 0.5)/scaleX;
             y = (y - 0.5)/scaleY;

             if(video.currentTime >= start_t && video.currentTime<end_t){
                WaveEffect.setLocation(x,y);
                WaveEffect.setColor(color);
                WaveEffect.setScale(scale);
                WaveEffect.setTransition(trans_x,trans_y);
                makeWaveEffect($(".waves-box")[0]);
              }
            }
         }, false);
       </script>

       <script>
       var video = document.getElementById("media2");
       video_js = videojs('media2');
       video.addEventListener("mousedown", mouseHandler, false);

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
         if(video_js.paused()){
           video_js.play();
         }else{
           video_js.pause();
         }

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

       }
    </script>
</body>
</html>
