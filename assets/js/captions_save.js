function captions_save()
{
$.ajax
({
  url: "./assets/ajax/captions_save.php",
  type : "POST",
  cache : false,
  data : { "title" : $("#title_captions").val(),
            "contents" : $("#context_captions").val(),
            "pos_x" : $("#input_caption_pos_x").val(),
            "pos_y" : $("#input_caption_pos_y").val(),
            "startTime" : $("#startTime_captions").val()*1000,
            "endTime" : $("#endTime_captions").val()*1000,
            "size" : $("#font_size_captions").val(),
            "delay" : $("#delay_captions").val(),
            "color" : $("#color_captions").val(),
            "font" : $("#font_name_captions").val(),
            "animation" : $("#animation_captions").val(),
            "project_no" : "1"
  },
  success: function(response)
  {
    console.log(response);
  }
});
}
