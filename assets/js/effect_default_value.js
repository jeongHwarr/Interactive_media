function initEffectTabValue(){

  //Waves 탭 기본값 설정
  $('#title_waves').prop('value', '');
  $('#input_waves_start_time').prop('value', '');
  $('#input_waves_end_time').prop('value', '');
  $('#input_waves_pos_x').prop('value', '');
  $('#input_waves_pos_y').prop('value', '');
  $('#input_waves_duration').prop('value', '3');
  $('#input_waves_delay').prop('value', '0.3');
  $('#input_waves_scale').prop('value', '0.03');
  $('#input_waves_translate_x').prop('value', '0');
  $('#input_waves_translate_y').prop('value', '0');
  $('#waves_index').prop('value', '');
  $('#waves_save').prop('value', '효과 저장');
  $('#waves_modify_cancel').prop('type', 'hidden');
  $('#waves_delete').prop('type', 'hidden');

  //Captions 탭 기본값 설정
  $('#title_captions').prop('value', '');
  $('#context_captions').prop('value', '');
  $('#animation_captions').prop('value', '');
  $('#startTime_captions').prop('value', '');
  $('#endTime_captions').prop('value', '');
  $('#input_caption_pos_x').prop('value', '');
  $('#input_caption_pos_y').prop('value', '');
  $('#font_size_captions').prop('value', '15');
  $('#delay_captions').prop('value', '1');
  $('#captions_index').prop('value', '');
  $('#captions_save').prop('value', '효과 저장');
  $('#captions_modify_cancel').prop('type', 'hidden');
  $('#captions_delete').prop('type', 'hidden');
  $('#Angle_captions').prop('value','0');
  $('#opacity_captions').prop('value','1');

  //Stickers 탭 기본값 설정
  $('#title_stickers').prop('value', '');
  $('option_stickers').prop('value', '');
  $('animation_stickers').prop('value', '');
  $('#startTime_stickers').prop('value', '');
  $('#endTime_stickers').prop('value', '');
  $('#input_sticker_pos_x').prop('value', '');
  $('#input_sticker_pos_y').prop('value', '');
  $('#width_stickers').prop('value', '70');
  $('#height_stickers').prop('value', '70');
  $('#delay_stickers').prop('value', '1');
  $('#stickers_index').prop('value', '');
  $('#stickers_save').prop('value', '효과 저장');
  $('#stickers_modify_cancel').prop('type', 'hidden');
  $('#stickers_delete').prop('type', 'hidden');
  $('#Angle_stickers').prop('value','0');
  $('#opacity_stickers').prop('value','1');

}
