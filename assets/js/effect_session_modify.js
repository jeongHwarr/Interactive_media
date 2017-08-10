//waves 효과 저장하여 세선에 추가하는 함수
function waves_modify(){
  const index = $("#waves_index").val();
  const title =  $("#title_waves").val();
  const startTime = $("#input_waves_start_time").val()*1000;
  const endTime = $("#input_waves_end_time").val()*1000;
  const pos_x = $("#input_waves_pos_x").val();
  const pos_y = $("#input_waves_pos_y").val();
  const duration = $("#input_waves_duration").val()*1000;
  const delay = $("#input_waves_delay").val()*1000;
  const scale = $("#input_waves_scale").val()*1000;
  const trans_x = $("#input_waves_translate_x").val();
  const trans_y = $("#input_waves_translate_y").val();
  const color = $("#color_waves").val();
  const p_id = project_id;
  const id = waves_session_data[index]['id'];
  const is_modify = "1";


  // if ( !startTime || !endTime || !pos_x || !pos_y ){
  //   alert("필수 정보를 입력하세요.");
  //   return;
  // }

  var push_value = {title:title, startTime:startTime, endTime:endTime, pos_x:pos_x, pos_y:pos_y,
                    duration:duration, delay:delay, scale:scale, trans_x:trans_x, trans_y:trans_y,
                    color:color, p_id:p_id, id:id, is_modify:is_modify};

  session.modify("waves_session",index,push_value);
  console.log(session.get("waves_session"));
  return waves_session_data = session.get('waves_session')['waves_session'];
}


//captions 효과 저장하여 세선에 추가하는 함수
function captions_modify(){
  const index = $("#captions_index").val();
  console.log("captions_index : " + index);
  const title =  $("#title_captions").val();
  const contents = $("#context_captions").val();
  const pos_x = $("#input_caption_pos_x").val();
  const pos_y = $("#input_caption_pos_y").val();
  const startTime = $("#startTime_captions").val()*1000;
  const endTime = $("#endTime_captions").val()*1000;
  const size = $("#font_size_captions").val();
  const delay = $("#delay_captions").val();
  const color = $("#color_captions").val();
  const font = $("#font_name_captions").val();
  const animation = $("#animation_captions").val();
  const p_id = project_id;

  var push_value = {title:title, contents:contents, pos_x:pos_x, pos_y:pos_y, startTime:startTime, endTime:endTime,
                    size:size, delay:delay, color:color, font:font, animation:animation, p_id:p_id};

  session.modify("captions_session",index,push_value);
  console.log(session.get("captions_session"));
  return captions_session_data = session.get('captions_session')['captions_session'];
}

//stickers 효과 저장하여 세선에 추가하는 함수
function stickers_modify(){
  const index = $("#stickers_index").val();
  const title =  $("#title_stickers").val();
  const pos_x = $("#input_sticker_pos_x").val();
  const pos_y = $("#input_sticker_pos_y").val();
  const startTime = $("#startTime_stickers").val()*1000;
  const endTime = $("#endTime_stickers").val()*1000;
  const width= $("#width_stickers").val();
  const height = $("#height_stickers").val();
  const delay = $("#delay_stickers").val();
  const url = $("#option_stickers").val();
  const animation = $("#animation_stickers").val();
  const p_id = project_id;

  var push_value = {title:title, pos_x:pos_x, pos_y:pos_y, startTime:startTime, endTime:endTime,
                    width:width, height:height, delay:delay, url:url, animation:animation, p_id:p_id};
  session.modify("stickers_session",index,push_value);
  console.log(session.get("stickers_session"));
  return stickers_session_data = session.get('stickers_session')['stickers_session'];
}
