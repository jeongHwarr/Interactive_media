<?php
include './assets/config/dbconn.php';
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->


    </script>
    <title>Project Start</title>
</head>
<body>
<!--
프로젝트 선택과 새로만드는 페이지
-->
    <div id="contents_wrapper">

        <button class="btn btn-default" id="new_project">new Project</button>
        <div id="project_list">
            <ul>
                <!--프로젝트 목록 추가-->
                <li><a id="li_project_1">프로젝트 1</a></li>
                <li><a href="" target="_self">프로젝트 2</a></li><a href="" target="_self">
                </a><li><a href="" target="_self"></a><a href="" target="_self">프로젝트 3</a></li><a href="" target="_self">
            </a></ul><a href="" target="_self">

        </a></div><a href="" target="_self">
        <div class="panel panel-default" id="video_select" style="display: none">
            <div class="panel-heading">
                <h3 class="panel-title">영상을 고르세요</h3>
                <div class="panel-body">
                    <!--영상목록 추가
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsvideo" id={변수} value={변수}>
                            {영상 이름}
                        </label>
                    </div>
                    -->
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsvideo" id="optionsvideo1" value="video1">
                            영상 1번
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsvideo" id="optionsvideo2" value="video2">
                            영상 2번
                        </label>
                    </div>

                    <button class="btn btn-success">createProject</button>
                </div>

            </div>
    </div>


<script src="assets/js/session.js"></script>
<script src="assets/js/project_load.js"></script>
<script>
    $(document).ready(function(){
        $("#new_project").click(function(){
            $("#video_select").slideDown();
        });
    });

    $(document).ready(function(){
        $("#li_project_1").click(function(){
            loadProject(1); // in assets/js/project_load.js
        });
    });


</script>

</a></div></body></html>
