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
    <style>
        #new_project{
            margin: 1em;
        }
    </style>
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
                <input type="text" id = "input_project_title" name="" value="" placeholder="프로젝트명"></input>
                <hr>
                <h3 class="panel-title">영상을 고르세요</h3>
                <div class="panel-body" id="body_video_select">
                </div>
                <button class="btn btn-success" id="button_make_project">프로젝트 생성</button>
                <button class="btn btn-default" id="button_cancel_project">취소</button>
            </div>
    </div>
    </div>
</body>
<script src="assets/js/session.js"></script>
<script src="assets/js/project_load.js"></script>
<script>

    loadProjectList(1); //프로젝트 리스트를 불러온다 (by user_id)
    loadMediaList();  //미디어 리스트를 불러온다

    //Trigger Ajax call back function
    $(document).ready(function(){
      $( document ).ajaxSend(function() {
      }).ajaxError(function(){
        console.log("Ajax Request Error!");
      }).ajaxSuccess(function(e,xhr,options,data){
        var methodName = data.cmd + 'Success';
        if (self[methodName]){
          console.log("Ajax call back : "+ methodName);
          console.log(data);
          self[methodName](data.data);
        }
      });
    });


    $(document).ready(function(){
        $("#new_project").click(function(){
            $("#video_select").slideDown();
        });
        $("#button_cancel_project").click(function(){
            $("#video_select").slideUp();
        });
    });

    //프로젝스 생성 버튼 관련 처리
    $(document).ready(function(){
      var user_id =1 ; // 나중에 다중 사용자 고려시 수정
      session.set('user_id',{['user_id'] : user_id}); //로그인 성공시 user_id 세션 저장

        $("#button_make_project").click(function(){
          var radio = document.querySelector('input[name="optionsvideo"]:checked');
          var project_title = $("#input_project_title").val();

          if (!radio || !project_title){
            alert("정보를 모두 입력해주세요");
          }
          else {
            var radio_value=radio.value;
              makeNewProject(project_title, radio_value, user_id);
          }
        });
    });

    function loadProjectList(user_id){
      $.get('./assets/ajax/common.php', {cmd:'loadProjectList',user_id:user_id});
    }
    function loadProjectListSuccess(data){
      // console.log(data);
      var ul_project_list = $('#ul_project_list');
      ul_project_list.empty();
      //프로젝트 리스트를 보여준다.
      for (var i=0; i<data.length; i++){
        var low = data[i];
        var html = '<a href="javascript:void(0);" onclick="loadProject('+low['p_id']+')" class="list-group-item list-group-item-info">';
        html += '<span> 프로젝트 ['+(i+1)+'] : ' + low['p_name'] + ' (영상 : ' + low['m_name'] + ')' ;
        html += '</span></a>';
        ul_project_list.append($(html));
      }
    }

    function loadMediaList(){
        $.get('./assets/ajax/common.php', {cmd:'loadMediaList'});
    }

    function loadMediaListSuccess(data){
      var body_video_select = $('#body_video_select');
      body_video_select.empty();

      //영상 리스트를 보여준다.
      for (var i=0; i<data.length; i++){
        var low = data[i];
        var html ='<div class="radio">'
        html+='<input type="radio" name="optionsvideo" id="optionsvideo'+low['id']+'" value="'+low['id']+'">'+low['name']+' </input>'
        html+='</div>'
        body_video_select.append($(html));
      }
    }

    function makeNewProject(project_title, radio_value, user_id){
      $.get('./assets/ajax/common.php', {cmd:'makeNewProject', project_title:project_title, media_id:radio_value, user_id:user_id });
    }

    function makeNewProjectSuccess(data){
      alert("프로젝트가 성공적으로 만들어졌습니다.");
      loadProjectList(data.user_id);
    }

</script>
</html>
