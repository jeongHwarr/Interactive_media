function loadProject(project_id){
  console.log(project_id);
  $.ajax({
    url:'./assets/ajax/common.php',
    type:'get',
    dataType: 'json',
    data: {cmd:'loadProject', project_id : project_id},
    success:function(data){
      session.set('project_info_session', {['project_info_session'] : data.project_info});
      session.set('waves_session', {['waves_session'] : data.waves});
      session.set('captions_session', {['captions_session'] : data.captions});
      session.set('stickers_session', {['stickers_session'] : data.stickers});
      session.set('connect_proper',{['connect_proper']:['1']})
      location.href = 'index.php?p_id='+data.project_info[0]['p_id'];
    }
  })
};
