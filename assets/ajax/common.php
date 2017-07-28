<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';

function loadProject($req,$db){
  $project_id = $_REQUEST['project_id'];

  //받은 id값을 가지는 프로젝트 정보 불러오기
    $query_project = 'SELECT * FROM projects WHERE id = ?';
    $project_result = queryForSelect($db,$query_project,array($project_id));

  //해당 프로젝트에 해당하는 waves 효과 가져오기
    $query_waves = 'SELECT * FROM waves WHERE p_id = ?';
    $waves_result = queryForSelect($db,$query_waves,array($project_id));

  // 해당 프로젝트에 해당하는 captions 효과 가져오기
    $query_captions= 'SELECT * FROM captions WHERE p_id = ?';
    $caption_result = queryForSelect($db,$query_captions,array($project_id));

  // 해당 프로젝트에 해당하는 stickers 효과 가져오기
    $query_stickers= 'SELECT * FROM stickers WHERE p_id = ?';
    $stickers_result = queryForSelect($db,$query_stickers,array($project_id));

  $data = array();
  $data['project_info']=$project_result;
  $data['waves']=$waves_result;
  $data['captions']=$caption_result;
  $data['stickers']=$stickers_result;

  writeAjaxRes($data);
}

$cmd = $_REQUEST['cmd'];
if (empty($cmd)) {
	writeAjaxErrorRes(null, 'cmd is null!');
	exit;
} else {
	call_user_func($cmd, $_REQUEST, $db);
}
exit;
 ?>
