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
        if($("#waves_save").hasClass("disabled")) {
            console.log("button disabled");
        }else{
            if ($("#title_waves").val() == "") {
                $("#title_waves").val("제목없음");
                console.log("wave 제목없음");
            }
            var button_value=$("#waves_save").val();
            if(button_value=="효과 저장"){
                waves_session_data = waves_save();
            }else if(button_value=="수정 완료"){
                waves_session_data = waves_modify();
            }
            initEffectTabValue();
            showEffectList();
        }


    });

    $("#captions_save").click(function(){
        if($("#captions_save").hasClass("disabled")) {
            console.log("button disabled");
        }else{
            if ($("#title_captions").val() == "") {
                $("#title_captions").val("제목없음");
                console.log("captions 제목없음");
            }
            var button_value=$("#captions_save").val();
            if(button_value=="효과 저장"){
                captions_session_data = captions_save();
            }else if(button_value=="수정 완료"){
                captions_session_data = captions_modify();
            }
            initEffectTabValue();
            showEffectList();
        }


    });

    $("#stickers_save").click(function(){
        if($("#stickers_save").hasClass("disabled")) {
            console.log("button disabled");
        }else{
            if ($("#title_stickers").val() == "") {
                $("#title_stickers").val("제목없음");
                console.log("stickers 제목없음");
            }
            var button_value=$("#stickers_save").val();
            if(button_value=="효과 저장"){
                stickers_session_data = stickers_save();
            }else if(button_value=="수정 완료"){
                stickers_session_data = stickers_modify();
            }
            initEffectTabValue();
            showEffectList();
        }


    });

    $("#waves_delete").click(function(){
        if (confirm('이 효과를 정말로 삭제하시겠습니까?')) {
          var index = $("#waves_index").val();
          waves_session_data = waves_delete(index);
          initEffectTabValue();
          showEffectList();
        }
    });

    $("#captions_delete").click(function(){
        if (confirm('이 효과를 정말로 삭제하시겠습니까?')) {
          var index = $("#captions_index").val();
          //이미 만들어진 caption div 삭제 (초기화)
          for(var i=0; i<captions_session_data.length; i++){
                s_id = i + "caption";
                $('#'+s_id).remove();
          }
          captions_session_data = captions_delete(index);
          initEffectTabValue();
          showEffectList();
        }
    });

    $("#stickers_delete").click(function(){
        if (confirm('이 효과를 정말로 삭제하시겠습니까?')) {
          var index = $("#stickers_index").val();
          //이미 만들어진 sticker div 삭제 (초기화)
          for(var i=0; i<stickers_session_data.length; i++){
                s_id = i + "sticker";
                $('#'+s_id).remove();
          }
          stickers_session_data = stickers_delete(index);
          initEffectTabValue();
          showEffectList();
        }
    });

    $("#waves_modify_cancel").click(function(){
        initEffectTabValue();
    });

    $("#captions_modify_cancel").click(function(){
        initEffectTabValue();
    });

    $("#stickers_modify_cancel").click(function(){
        initEffectTabValue();
    });


    //전체 프로젝트 db저장(초록색 save 버튼)
    $("#btn_project_save").click(function(){
      //query string 정보 가져오기 (?p_id=..)
      const urlParams = new URLSearchParams(window.location.search);
      const project_id = urlParams.get('p_id');

      $.ajax({
        url:'./assets/ajax/common.php',
        type:'get',
        dataType: 'json',
        data: {cmd:'saveProject', project_id:project_id, waves_session_data:waves_session_data, captions_session_data:captions_session_data, stickers_session_data:stickers_session_data},
        success:function(data){
          alert("프로젝트가 성공적으로 저장되었습니다.");
          loadProject(project_id); // in assets/js/project_load.js
        }
      })
    });
}
