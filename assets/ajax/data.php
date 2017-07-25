<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';

function getDataList($req, $db) {
  $wave_query = 'SELECT * FROM waves';
  $caption_query = 'SELECT * FROM captions';
  $waves_result = queryForSelect($db, $wave_query);
  $caption_result = queryForSelect($db, $caption_query);

  $data = array();
  $data['waves']=$waves_result;
  $data['captions']=$caption_result;

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
