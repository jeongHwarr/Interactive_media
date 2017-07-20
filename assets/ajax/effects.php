<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';

function getEffectList($req, $db) {
  $querystr = 'SELECT * FROM context_pj';
  $result = queryForSelect($db, $querystr);

  $data = array();
  $data['data']=$result;

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
