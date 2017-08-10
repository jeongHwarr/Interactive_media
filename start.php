<?php
include './assets/config/dbconn.php';
include './assets/util/queryUtil.php';
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

    <title>Project Start</title>
</head>
<body>
<!--
프로젝트 선택과 새로만드는 페이지
-->
    <div id="contents_wrapper">

        <button class="btn btn-default" id="new_project">new Project</button>
        <hr>
        <div id="project_list" style="width: 50%;">
            <ul id="ul_project_list">
            </ul>
        </div>
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
    </div>
</body>
<script src="assets/js/session.js"></script>
<script src="assets/js/project_load.js"></script>
<script>
    $(function() {
      $.ajax({
        url:'./assets/ajax/common.php',
        type:'get',
        dataType: 'json',
        data: {cmd:'loadProjectList',user_id:'1'},
        success:function(data){
          showProjectList(data.data);
        }
      })
    });

    $(document).ready(function(){
        $("#new_project").click(function(){
            $("#video_select").slideDown();
        });
    });

    function showProjectList(data){
      console.log(data);
      var ul_project_list = $('#ul_project_list');
      ul_project_list.empty();
      //프로젝트 리스트를 보여준다.
      for (var i=0; i<data.length; i++){
        var low = data[i];
        var html = '<a href="javascript:void(0);" onclick="loadProject(' +low['id']+')" class="list-group-item list-group-item-info">';
        html += '<span> 프로젝트 ['+(i+1)+'] : ' + low['name'] ;
        html += '</span></a>';
          html += '</a>';
        ul_project_list.append($(html));
      }

    }




</script>
</html>
