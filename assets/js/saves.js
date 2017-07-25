function save()
{
$.ajax
({
  url: "./assets/ajax/save.php",
  type : "POST",
  cache : false,
  data : { "title" : $("#title_waves").val(),
              "start_t" : $("#input_waves_start_time").val(),
              "end_t" : $("#input_waves_end_time").val(),
              "x":$("#input_waves_pos_x").val(),
              "y":$("#input_waves_pos_y").val(),
              "duration":$("#input_waves_duration").val(),
              "delay":$("#input_waves_delay").val(),
              "scale":$("#input_waves_scale").val(),
              "trans_x":$("#input_waves_translate_x").val(),
              "trans_y":$("#input_waves_translate_y").val(),
              "color":"1",
              "project_no":"1"
  },
  success: function(response)
  {
    console.log(response);
  }
});
}
