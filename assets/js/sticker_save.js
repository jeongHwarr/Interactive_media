function stickers_save()
{
$.ajax
({
  url: "./assets/ajax/stickers_save.php",
  type : "POST",
  cache : false,
  data : { "title" : $("#title_stickers").val(),
           "pos_x" : $("#input_sticker_pos_x").val(),
           "pos_y" : $("#input_sticker_pos_y").val(),
           "startTime" : $("#startTime_stickers").val(),
           "endTime" : $("#endTime_stickers").val(),
           "width" : $("#width_stickers").val(),
           "height" : $("#height_stickers").val(),
           "delay" : $("#delay_stickers").val(),
           "url" : $("#option_stickers").val(),
           "animation" : $("#animation_stickers").val(),
           "project_no" : "1"
  },
  success: function(response)
  {
    console.log(response);
  }
});
}
