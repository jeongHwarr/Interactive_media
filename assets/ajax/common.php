<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';

//******************* <loadProject> : Projec 정보를 DB에서 불러오는 함수 *******************//
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
//***************************************************************************************//

//******************* <saveProject> : Project 세션 정보를 DB로 저장하는 함수 ***************//
function saveProject($req,$db){
  $waves=$_REQUEST['waves_session_data'];
  $captions=$_REQUEST['captions_session_data'];
  $stickers=$_REQUEST['stickers_session_data'];

  $insert_waves = array();
  $insert_captions = array();
  $insert_stickers = array();

  //id 값이 없는 wave 효과를 DB에 insert
    for ($i = 0; $i < sizeof($waves); $i++) {
      $row = $waves[$i];
      if (array_key_exists('id', $row)==false) {
        $query = "INSERT INTO waves (startTime, endTime, title, pos_x, pos_y, duration, delay, scale, trans_x, trans_y, color, p_id)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  // 총 12개, 이 자리엔 $insert_data_array의 값들이 들어간다.
        $insert_data_array = array($row['startTime'], $row['endTime'], $row['title'], $row['pos_x'], $row['pos_y'],
                           $row['duration'], $row['delay'], $row['scale'], $row['trans_x'], $row['trans_y'],
                           $row['color'], $row['p_id']);
        queryForExecute($db,$query,$insert_data_array);
        array_push($insert_waves,$row);
      }
  	}

  //id 값이 없는 caption 효과를 DB에 insert
    for ($i = 0; $i < sizeof($captions); $i++) {
      $row = $captions[$i];
      if (array_key_exists('id', $row)==false) {
        $query ="INSERT INTO captions (title, pos_x, pos_y, startTime, endTime, size, delay, color, font, contents, p_id, animation )
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // 총 12개, 이 자리엔 $insert_data_array의 값들이 들어간다.
        $insert_data_array = array($row['title'], $row['pos_x'], $row['pos_y'], $row['startTime'], $row['endTime'],
                             $row['size'], $row['delay'], $row['color'], $row['font'],
                             $row['contents'], $row['p_id'], $row['animation']);
        queryForExecute($db,$query,$insert_data_array);
        array_push($insert_captions,$row);
      }
    }

  // id 값이 없는 stickers 효과를 DB에 insert
  for ($i = 0; $i < sizeof($stickers); $i++) {
    $row = $stickers[$i];
    if (array_key_exists('id', $row)==false) {
      $query ="INSERT INTO stickers (title, pos_x, pos_y, startTime, endTime, width, height, delay, url, p_id, animation )
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // 총 11개, 이 자리엔 $insert_data_array의 값들이 들어간다.
      $insert_data_array = array($row['title'], $row['pos_x'], $row['pos_y'], $row['startTime'], $row['endTime'],
                           $row['width'], $row['height'], $row['delay'], $row['url'], $row['p_id'], $row['animation'] );
      queryForExecute($db,$query, $insert_data_array);
      array_push($insert_stickers,$row);
    }
  }

  //DB에 추가된 정보들을 Ajax로 write
  $data = array();
  $data['data']['waves']=$insert_waves;
  $data['data']['captions']=$insert_captions;
  $data['data']['stickers']=$insert_stickers;
  writeAjaxRes($data);
}
//************************************************************************************//


$cmd = $_REQUEST['cmd'];
if (empty($cmd)) {
	writeAjaxErrorRes(null, 'cmd is null!');
	exit;
} else {
	call_user_func($cmd, $_REQUEST, $db);
}
exit;
 ?>
