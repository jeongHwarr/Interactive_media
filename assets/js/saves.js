function save()
{
$.ajax
({
  url: "./assets/ajax/save.php",
  type : "POST",
  cache : false,
  data : { "title" : $("#title_waves").val(),
              "start_t" : $("#input_waves_start_time").val()*1000,
              "end_t" : $("#input_waves_end_time").val()*1000,
              "x":$("#input_waves_pos_x").val(),
              "y":$("#input_waves_pos_y").val(),
              "duration":$("#input_waves_duration").val()*1000,
              "delay":$("#input_waves_delay").val()*1000,
              "scale":$("#input_waves_scale").val()*1000,
              "trans_x":$("#input_waves_translate_x").val(),
              "trans_y":$("#input_waves_translate_y").val(),
              "color":$("#color_waves").val(),
              "project_no":"1"
  },
  success: function(response)
  {
    console.log(response);
  }
});
}
