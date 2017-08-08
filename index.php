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
    <title>Web Editor ver0.2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/progress-bars1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/waves.css" />
    <link rel="stylesheet" href="assets/css/slide.css" />
    <link rel="stylesheet" href="assets/css/black_div.css" />

    <link rel="stylesheet" href="assets/css/text_captions.css">
    <!-- 병조 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- video JS -->
    <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Editor Ver0.2</a>
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
            <div class="col-lg-12 col-lg-offset-0" style="height: 45%;">
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
            <div class="col-md-12" id="separate">
                <hr>
            </div>
            <!--media2 박스 시작-->
            <div class="col-lg-12 col-lg-offset-0" style="height: 45%;">
                <div class="waves-effect">
<!--                    <div id="black_top"></div>-->
<!--                    <div id="black_bottom"></div>-->
                    <div id="captions_p"></div>
                    <div id="sticker_d"></div>

                    <video
                        id="media2"
                        class="video-js waves-box"
                        controls
                        preload="auto"
                        data-setup='{}'>
                    <source id="video_src" src="http://media.w3.org/2010/05/sintel/trailer.mp4" type="video/mp4"></source>
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
            </div>




<!--            <div class="col-md-12" id="progress"><!--프로그레스바 영역-->
<!--                <div class="row">-->
<!--                    <div class="col-md-4">-->
<!--                        <div class="container">-->
<!--                            <h2>Progress Bar<small>  context progress</small></h2>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col-xs-12">-->
<!--                                    <div class="range range-primary">-->
<!--                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangePrimary.value=value">-->
<!--                                        <output id="rangePrimary">50</output>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col-xs-12">-->
<!--                                    <div class="range range-info">-->
<!--                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangeInfo.value=value">-->
<!--                                        <output id="rangeInfo">50</output>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col-xs-12">-->
<!--                                    <div class="range range-danger">-->
<!--                                        <input type="range" name="range" min="1" max="100" value="50" onchange="rangeDanger.value=value">-->
<!--                                        <output id="rangeDanger">50</output>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div> <!--프로그레스바 종료-->
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
                                <form id = "waves_set" role="form" data-toggle="validator"> <!--입력 폼-->
                                    <div class="row form-group">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Title </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <input class="form-control" type="text" id="title_waves"
                                                    data-minlength="4" data-error="제목이 너무 짧습니다." placeholder="제목없음">
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

                                        <div class="col-lg-4 col-md-12">
                                            <input id="input_waves_start_time" class="form-control time_start" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">

                                        </div>
                                        <div class="col-lg-1 col-md-12">
                                            <p class="tab_cont">End </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <input id="input_waves_end_time" class="form-control time_end" type="number" step="0.0001" min="0" data-error="시간을 입력하세요" placeholder="number">
                                        </div>
                                        <div class="col-md-12 help-block with-errors"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                    <button class="btn btn-default" type="button" id="more_op_waves">more options</button>
                                    <button id="btn-make-effect" class="btn btn-default input_effects" type="button">make effects </button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="waves_save" value="saves"></input> <!--효과저장/수정 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="waves_delete" value="delete"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="waves_modify_cancel" value="cancel"> </input> <!--효과수정 취소 버튼-->
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
                                        <p class="tab_title">effects view</p>
                                    </div>
                                    <div class="col-md-12 ">
                                      <div class="waves-effect preview" style="margin:0px 40px; width:180px; height:160px;">
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
                                            <input class="form-control" type="text" id="title_captions" data-minlength="4" data-error="제목을 두글자 이상 입력하세요" placeholder="제목없음">
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
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Delay</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input class="form-control" id="delay_captions" type="number" step="0.0001" min="0" value="0">
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
                                    <button class="btn btn-default input_effects" type="button" id="caption_make_effects">make effects </button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="captions_save" value="saves"> </input> <!--효과저장/수정 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="captions_delete" value="delete"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="captions_modify_cancel" value="cancel"> </input> <!--효과수정 취소 버튼-->
                                    <input type="hidden" id="captions_index" value="">
                                </form>


                            </div><!--section captions end-->
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12" id="section_captions_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">effects view</p>
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
                                            <input class="form-control" type="text" id="title_stickers" data-minlength="4" data-error="제목을 두글자 이상 입력하세요" placeholder="제목없음">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="tab_title">Stickers </p>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group"> <!--스티커 드롭다운-->
                                                <select class="form-control" id="option_stickers">
                                                    <option value="http://cfile23.uf.tistory.com/image/1864EE3F50E62EA616460A">해골</option>
                                                    <option value="http://bizdesign.net/data/cheditor4/1304/7a7f255e9283673e933658413636862a_fSDT1uJnhvXaBalZODxtBFaM.jpg">아기</option>
                                                    <option value="https://s-media-cache-ak0.pinimg.com/originals/b2/56/15/b2561559644dc937bcca91b746cd9abe.png">사자</option>
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
                                              <select class="form-control" id="animation_stickers">
                                                <option value="none">Choose Animation!</option>
                                                <option value="animated infinite bounceOut">bounceOut</option>
                                                <option value="animated infinite fadeIn">fadeIn</option>
                                                <option value="animated infinite bounceIn">bounceIn</option>
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
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <p class="tab_title">Delay</p>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <input class="form-control" id="delay_stickers" type="number" step="0.0001" min="0" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--div extra_stikers end-->
                                    <button class="btn btn-default" type="button" id="more_op_stickers">more options</button>
                                    <button class="btn btn-default input_effects" type="button" id="sticker_make_effects">make effects</button> <!--효과넣기 버튼-->
                                    <input button class="btn btn-primary" type="submit" id="stickers_save" value="saves"></input> <!--효과저장 버튼-->
                                    <input button class="btn btn-danger" type="hidden" id="stickers_delete" value="delete"> </input> <!--효과삭제버튼-->
                                    <input button class="btn btn-info" type="hidden" id="stickers_modify_cancel" value="cancel"> </input> <!--효과수정 취소 버튼-->
                                    <input type="hidden" id="stickers_index" value="">
                                </form>

                            </div><!--section stickers input end-->

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-12" id="section_stcikers_view" style="margin-top:0.2em;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="tab_title">effects view</p>
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

        <div id="div_third" class="section_lists"> <!--효과 리스트-->
            <p class="tab_title">Effects List</p>
            <div class="list-group" id="list_effects">
            </div>
        </div>
      </div>
    </div>
</body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/text_captions.js"></script>
    <script src="assets/js/session.js"></script>
    <script src="assets/js/effect_session_save.js"></script>
    <script src="assets/js/effect_session_modify.js"></script>
    <script src="assets/js/effect_session_delete.js"></script>
    <script src="assets/js/project_load.js"></script>
    <script src="assets/js/black_div.js"></script>
    <script src="assets/js/button.js"></script>
    <script src="assets/js/mouse_pointer.js"></script>
    <script src="assets/js/effect_default_value.js"></script>
    <script src="assets/js/effect_list.js"></script>

    <script type="text/javascript">
      $('form').submit(function (evt) {
          //prevents the default action
          evt.preventDefault();
      });
      $(document).ready(function(){
        //test for session
        console.log(session.get('project_info_session'));
        console.log(session.get('waves_session'));
        console.log(session.get('captions_session'));
        console.log(session.get('stickers_session'));
        console.log(session.get('connect_proper'));

        if(session.get('connect_proper')==null){
            console.log("wrong connect");
            alert("잘못된 접근입니다.");
            location.href="start.php";
        }
        initEffectTabValue();
        showEffectList(); //페이지 최하단의 Effect List를 나타낸다. (in effect_list.js)
      });
      //버튼 onclick 구현
      $(document).ready(function(){
          setButtonOnClick();
        }
      );
      //검은화면 영상의 timeupdate와 bind
//      $(document).ready(
//        //동영상에서 검은색화면에는 효과가 보이지 않도록 div를 만들고 그 크기를 영상의 시간에 대해서 동적 크기 제어
//        setBlackDiv()
//      );
    </script>
    <script type="text/javascript">
    var project_info_session_data = session.get('project_info_session')['project_info_session'];

    //caption effect 적용
    var video = document.getElementById("media2");
    var captions_session_data = session.get('captions_session')['captions_session'];
    video.addEventListener('timeupdate', function(){
      for (var i = 0; i<captions_session_data.length; i++){

         var c_start_t = captions_session_data[i]['startTime']/1000;
         var c_end_t = captions_session_data[i]['endTime']/1000;
         var c_x = captions_session_data[i]['pos_x'];
         var c_y = captions_session_data[i]['pos_y'];
         var c_animation = captions_session_data[i]['animation'];
         var c_size = captions_session_data[i]['size'];
         var c_delay = captions_session_data[i]['delay'];
         var c_color = captions_session_data[i]['color'];
         var c_font = captions_session_data[i]['font'];
         var c_contents = captions_session_data[i]['contents'];
         var c_id = i + "caption";

         var scaleX = video.videoWidth / $("#media2").outerWidth();
         var scaleY = video.videoHeight / $("#media2").outerHeight();

         caption_x = (c_x - 0.5)/scaleX;
         caption_y = (c_y - 0.5)/scaleY;

         if(video.currentTime < c_start_t || video.currentTime > c_end_t){
             captionEffect.myfunction_c_id(c_id);
             captionEffect.caption_hide();
             }
         else if(video.currentTime >= c_start_t && video.currentTime <= c_end_t){
            captionEffect.myfunction_c_basic(c_start_t, c_end_t, caption_x, caption_y, c_animation);
            captionEffect.myfunction_c_size(c_size);
            captionEffect.myfunction_c_delay(c_delay);
            captionEffect.myfunction_c_color(c_color);
            captionEffect.myfunction_c_font(c_font);
            captionEffect.myfunction_c_contents(c_contents);
            captionEffect.myfunction_c_id(c_id);

            captionEffect.caption_id_check();
            captionEffect.caption_show();

            if(!video.paused){
              captionEffect.caption_reveal();
            }else{
              captionEffect.caption_borrow();
            }
       }
     }

      }, false);

     //sticker effect 적용
     var video = document.getElementById("media2");
     var stickers_session_data = session.get('stickers_session')['stickers_session'];

     video.addEventListener('timeupdate', function(){
       for (var i = 0; i < stickers_session_data.length; i++){
         var s_start_t = stickers_session_data[i]['startTime']/1000;
         var s_end_t = stickers_session_data[i]['endTime']/1000;
         var s_x = stickers_session_data[i]['pos_x'];
         var s_y = stickers_session_data[i]['pos_y'];
         var s_animation = stickers_session_data[i]['animation'];
         var s_width = stickers_session_data[i]['width'];
         var s_height = stickers_session_data[i]['height'];
         var s_delay = stickers_session_data[i]['delay'];
         var s_url = stickers_session_data[i]['url'];
         var s_id = i + "sticker";

         var scaleX = video.videoWidth / $("#media2").outerWidth();
         var scaleY = video.videoHeight / $("#media2").outerHeight();

         sticker_x = (s_x - 0.5)/scaleX;
         sticker_y = (s_y - 0.5)/scaleY;

          if(video.currentTime < s_start_t || video.currentTime > s_end_t){
            stickerEffect.myfunction_s_id(s_id);
            stickerEffect.sticker_hide();
          }
          else if(video.currentTime >= s_start_t && video.currentTime <= s_end_t){
              stickerEffect.myfunction_s_basic(s_start_t, s_end_t, sticker_x, sticker_y , s_animation);
              stickerEffect.myfunction_s_width(s_width);
              stickerEffect.myfunction_s_height(s_height);
              stickerEffect.myfunction_s_delay(s_delay);
              stickerEffect.myfunction_s_url(s_url);
              stickerEffect.myfunction_s_id(s_id);

              stickerEffect.sticker_id_check();
              stickerEffect.sticker_show();

              if(!video.paused){
                stickerEffect.sticker_reveal();
              }else{
                stickerEffect.sticker_borrow();
              }
              }
              }

      }, false);
      </script>

      <!-- waves session 정보 -->
     <script>
      var waves_session_data = session.get('waves_session')['waves_session'];
      //waves정보, 적용 video, wave가 만들어질 장소
      setWaveEffect("#media2", ".waves-box");
      $("#btn-make-effect").bind("click",function(){
        WaveEffect.setLocation(90,80);
        WaveEffect.setColor($("#color_waves").val());
        WaveEffect.setScale($("#input_waves_scale").val());
        WaveEffect.setDuration($("#input_waves_duration").val()*1000);
        WaveEffect.setDelay($("#input_waves_delay").val()*1000);
        WaveEffect.setTransition($("#input_waves_translate_x").val(), $("#input_waves_translate_y").val());
        makeWaveEffect($(".test-box")[0]);
      })
     </script>

     <script>
       var video = document.getElementById("media2");
       var video_src = document.getElementById('video_src');
       video_js = videojs('media2');
       //in assets/js/mouse_pointer.js
       addClickEvent(video,video_js);
    </script>

<script>//syncro current time
    var video1 = document.getElementById("media1");
    $(document).ready(
        video1.addEventListener('timeupdate', function () {
            var c_time1 = video1.currentTime;
            var c_time2 = video.currentTime;
            console.log("1번 : "+c_time1);
            console.log("2번 : "+c_time2);
            var time_diff = Math.abs(c_time1 - c_time2);
            if(time_diff>0.05){
                video.currentTime=c_time1+0.02;
            }else{
                console.log("nothing");
            }
        })
    );

</script>
</html>
