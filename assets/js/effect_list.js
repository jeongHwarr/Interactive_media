
//*******************<showEffectList> : Effect List를 나타내는 함수*******************//
function showEffectList(){

  var div_list_effects = $('#list_effects');
  div_list_effects.empty();
  //waves 효과 리스트를 보여준다.
  for (var i=0; i<waves_session_data.length; i++){
    var low = waves_session_data[i];
    var html = '<a href="javascript:void(0);" onclick="clickEffectList(`waves`,' +i+')" class="list-group-item list-group-item-success">';
    html += '<span> wave ['+(i+1)+'] : ' + low['title'] + ' (' + msToTime(low['startTime'])+ ')';
    html += '</span></a>';
    div_list_effects.append($(html));
  }

  //captions 효과 리스트를 보여준다.
  for (var i=0; i<captions_session_data.length; i++){
    var low = captions_session_data[i];
    var html = '<a href="javascript:void(0);" onclick="clickEffectList(`captions`,' +i+')" class="list-group-item list-group-item-info">';
    html += '<span> caption ['+(i+1)+'] : ' + low['title'] + ' (' + msToTime(low['startTime'])+ ')';
    html += '</span></a>';
    div_list_effects.append($(html));
  }

  //stickers 효과 리스트를 보여준다.
  for (var i=0; i<stickers_session_data.length; i++){
    var low = stickers_session_data[i];
    var html = '<a href="javascript:void(0);" onclick="clickEffectList(`stickers`,' +i+')" class="list-group-item list-group-item-warning">';
    html += '<span> sticker ['+(i+1)+'] : ' + low['title'] + ' (' + msToTime(low['startTime'])+ ')';
    html += '</span></a>';
    div_list_effects.append($(html));
  }
}
//***********************************<End - showEffectList>******************************//

//**************<clickEffectList> : Effect List 클릭을 처리하는 함수**********************//
function clickEffectList(list,index){

  $(document).trigger('sjs:setNewMaster', "media2");

  if(list=="waves"){
    var data = waves_session_data[index];
    //탭 input 출력
    $("#title_waves").val(data['title']);
    $('#input_waves_pos_x').val(data['pos_x']);
    $('#input_waves_pos_y').val(data['pos_y']);
    $("#input_waves_start_time").val(data['startTime']/1000);
    $("#input_waves_end_time").val(data['endTime']/1000);
    $("#input_waves_duration").val(data['duration']/1000);
    $("#input_waves_delay").val(data['delay']/1000);
    $("#input_waves_scale").val(data['scale']/1000);
    $("#input_waves_translate_x").val(data['trans_x']);
    $("#input_waves_translate_y").val(data['trans_y']);
    $("#color_waves").val(data['color']);
    $("#waves_index").val(index);

    //버튼값 수정
    $('#waves_copy').prop('type', 'submit');
    $('#waves_save').prop('value', '수정 완료');
    $('#waves_modify_cancel').prop('type', 'submit');
    $('#waves_delete').prop('type', 'submit');

    $(".section_tab a[href='#tab-1']").tab("show"); //waves tab으로 이동

    //효과 startTime값으로 플레이어 재생 위치 이동 후 정지
    video_js2.currentTime((data['startTime']/1000)-0.3);
    video_js2.play();
    // video_js2.pause();
    // video_js2.addClass('vjs-has-started'); //control bar 활성화 시키기 위해

  }else if(list=="captions"){
    var data = captions_session_data[index];
    //탭 input 출력
    $("#title_captions").val(data['title']);
    $("#context_captions").val(data['contents']);
    $('#input_caption_pos_x').val(data['pos_x']);
    $('#input_caption_pos_y').val(data['pos_y']);
    $("#startTime_captions").val(data['startTime']/1000);
    $("#endTime_captions").val(data['endTime']/1000);
    $("#font_size_captions").val(data['size']);
    $("#delay_captions").val(data['delay']);
    $("#color_captions").val(data['color']);
    $("#font_name_captions").val(data['font']);
    $("#animation_captions").val(data['animation']);
    $("#Angle_captions").val(data['angle']);
    $("#opacity_captions").val(date['opacity']);
    $("#captions_index").val(index);
    $("#caption_example_id").attr('class',data['animation']);

    //caption에 대한 effect list와 effect view연결
    var caption_context = $("#context_captions").val();
    var caption_font_size = $("#font_size_captions").val();
    var caption_delay = $("#delay_captions").val();
    var caption_color = $("#color_captions").val();
    var caption_font_family = $("#font_name_captions").val();
    var caption_angle = $("#Angle_captions").val();
    var caption_opacity = $("#opacity_captions").val();

    $("#caption_example_id").html(caption_context);
    $("#caption_example_id").css('fontSize',caption_font_size);
    $("#caption_example_id").css('animationDuration',caption_delay+'s');
    $("#caption_example_id").css('color',caption_color);
    $("#caption_example_id").css('font-family',caption_font_family);
    $("#caption_example_id").rotate(caption_angle);
    $("#caption_example_id").css('opacity',caption_opacity);

    //버튼값 수정
    $('#captions_copy').prop('type', 'submit');
    $('#captions_save').prop('value', '수정 완료');
    $('#captions_modify_cancel').prop('type', 'submit');
    $('#captions_delete').prop('type', 'submit');

    $(".section_tab a[href='#tab-2']").tab("show"); //captions tab으로 이동

    //효과 startTime값으로 플레이어 재생 위치 이동 후 정지
    video_js2.currentTime((data['startTime']/1000)-0.3);
    video_js2.play();
    // video_js2.pause();
    // video_js2.addClass('vjs-has-started'); //control bar 활성화 시키기 위해

  }else if(list=="stickers"){
    var data = stickers_session_data[index];
    //탭 input 출력
    $("#title_stickers").val(data['title']);
    $('#input_sticker_pos_x').val(data['pos_x']);
    $('#input_sticker_pos_y').val(data['pos_y']);
    $("#startTime_stickers").val(data['startTime']/1000);
    $("#endTime_stickers").val(data['endTime']/1000);
    $("#width_stickers").val(data['width']);
    $("#height_stickers").val(data['height']);
    $("#delay_stickers").val(data['delay']);
    $("#option_stickers").val(data['url']);
    $("#Angle_stickers").val(data['angle']);
    $("#opacity_stickers").val(date['opacity']);

    $("#animation_stickers").val(data['animation']);
    $("#stickers_index").val(index);
    $("#sticker_example_id").attr('class',data['animation']);

    //sticker에 대한 effect list와 effect view연결
    var sticker_img = $("#option_stickers").val();
    var sticker_width = $("#width_stickers").val();
    var sticker_height = $("#height_stickers").val();
    var sticker_delay = $("#delay_stickers").val();
    var sticker_angle = $("#Angle_stickers").val();
    var sticker_opacity = $("#opacity_stickers").val();

    $("#sticker_example_id").attr('src',sticker_img);
    $("#sticker_example_id").css('width',sticker_width +'px');
    $("#sticker_example_id").css('height',sticker_height + 'px');
    $("#sticker_example_id").css('animationDuration',sticker_delay+'s');
    $("#sticker_example_id").rotate(sticker_angle);
    $("#sticker_example_id").css('opacity',sticker_opacity);

    //버튼값 수정
    $('#stickers_copy').prop('type', 'submit');
    $('#stickers_save').prop('value', '수정 완료');
    $('#stickers_modify_cancel').prop('type', 'submit');
    $('#stickers_delete').prop('type', 'submit');

    //효과 startTime값으로 플레이어 재생 위치 이동 후 정지
    $(".section_tab a[href='#tab-3']").tab("show"); //stickers tab으로 이동
    video_js2.currentTime((data['startTime']/1000)-0.3);
    video_js2.play();
    // video_js2.pause();
    // video_js2.addClass('vjs-has-started'); //control bar 활성화 시키기 위해

  }

}
//********************************<End - clickEffectList>***************************//

//*********<msToTime> : milliseconds를 받아 HH:MM:SS.mm형태로 출력하는 함수**********//
function msToTime(duration) {
  var milliseconds = parseInt((duration%1000)/100)
      , seconds = parseInt((duration/1000)%60)
      , minutes = parseInt((duration/(1000*60))%60)
      , hours = parseInt((duration/(1000*60*60))%24);
  hours = (hours < 10) ? "0" + hours : hours;
  minutes = (minutes < 10) ? "0" + minutes : minutes;
  seconds = (seconds < 10) ? "0" + seconds : seconds;
  return hours + ":" + minutes + ":" + seconds + "." + milliseconds;
}
//***********************************<End - msToTimet>**************************//
