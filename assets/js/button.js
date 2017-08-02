function setButtonOnClick(){
    //more options 토글 스크립트
    $("#more_op_waves").click(function(){
        $("#extra_waves").slideToggle();
    });
    $("#more_op_captions").click(function(){
        $("#extra_captions").slideToggle();
    });
    $("#more_op_stickers").click(function(){
        $("#extra_stickers").slideToggle();
    });

    //세션 저장(파란색 saves버튼)
    $("#waves_save").click(function(){
        if($("#title_waves").val()==""){
            $("#title_waves").val("제목없음");
            console.log("wave 제목없음");
        }
        waves_session_data = waves_save();
    });
    $("#captions_save").click(function(){
        if($("#title_captions").val()==""){
            $("#title_captions").val("제목없음");
        }
        captions_session_data = captions_save();
    });
    $("#stickers_save").click(function(){
        if($("#title_stickers").val()==""){
            $("#title_stickers").val("제목없음");
        }
        stickers_session_data = stickers_save();
    });

    //전체 프로젝트 db저장(초록색 save 버튼)
    $("#btn_project_save").click(function(){
      $.ajax({
        url:'./assets/ajax/common.php',
        type:'get',
        dataType: 'json',
        data: {cmd:'saveProject',waves_session_data:waves_session_data, captions_session_data:captions_session_data, stickers_session_data:stickers_session_data},
        success:function(data){
          alert("프로젝트가 성공적으로 저장되었습니다.");
          loadProject(1); // in assets/js/project_load.js
        }
      })
    });
}
