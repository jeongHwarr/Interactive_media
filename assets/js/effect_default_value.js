function initEffectTabValue(){

  //Waves 탭 기본값 설정
  $('#title_waves').prop('value', '');
  $('#input_waves_start_time').prop('value', '');
  $('#input_waves_end_time').prop('value', '');
  $('#input_waves_pos_x').prop('value', '');
  $('#input_waves_pos_y').prop('value', '');
  $('#input_waves_duration').prop('value', '1');
  $('#input_waves_delay').prop('value', '0.3');
  $('#input_waves_scale').prop('value', '0.05');
  $('#input_waves_translate_x').prop('value', '0');
  $('#input_waves_translate_y').prop('value', '0');
  $('#waves_index').prop('value', '');
  $('#waves_save').prop('value', 'saves');
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
  $('#delay_captions').prop('value', '0');
  $('#captions_index').prop('value', '');
  $('#captions_save').prop('value', 'saves');
  $('#captions_modify_cancel').prop('type', 'hidden');
  $('#captions_delete').prop('type', 'hidden');

  //Stickers 탭 기본값 설정
  $('#title_stickers').prop('value', '');
  $('option_stickers').prop('value', '');
  $('animation_stickers').prop('value', '');
  $('#startTime_stickers').prop('value', '');
  $('#endTime_stickers').prop('value', '');
  $('#input_sticker_pos_x').prop('value', '');
  $('#input_sticker_pos_y').prop('value', '');
  $('#width_stickers').prop('value', '20');
  $('#height_stickers').prop('value', '20');
  $('#delay_stickers').prop('value', '0');
  $('#stickers_index').prop('value', '');
  $('#stickers_save').prop('value', 'saves');
  $('#stickers_modify_cancel').prop('type', 'hidden');
  $('#stickers_delete').prop('type', 'hidden');

}
