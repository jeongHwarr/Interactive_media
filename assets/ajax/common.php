<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';

//************* <loadMediaList> : Media list를 DB에서 불러오는 함수 *****************//
function loadMediaList($req,$db){
    //$user_index = $_REQUEST['user_id'];
    $query  = 'SELECT * from medias';
    $query_result = queryForSelect($db,$query,array());

    $data = array();
    $data['data']=$query_result;

    writeAjaxRes($data);
}
//***************************************************************************************//


//************* <loadProjectList> : Projec list를 DB에서 불러오는 함수 *****************//
function loadProjectList($req,$db){
    //$user_index = $_REQUEST['user_id'];
    $user_id = $_REQUEST['user_id'];
    $query_project  = 'SELECT A.id as p_id , A.name as p_name, B.name as u_name, B.id as user_id, C.name as m_name , C.runningTime, C.path
                      FROM  projects  A LEFT JOIN users B ON A.u_id = B.id
                      LEFT JOIN medias C ON A.m_id = C.id WHERE B.id=?';
    $project_result = queryForSelect($db,$query_project,array($user_id));

    $data = array();
    $data['data']=$project_result;

    writeAjaxRes($data);
}
//***************************************************************************************//

//************* <makeProjectList> : 새로운 Projec를 만드는 함수 *****************//
function makeNewProject($req,$db){
    //$user_index = $_REQUEST['user_id'];
    $user_id = $_REQUEST['user_id'];
    $project_title = $_REQUEST['project_title'];
    $media_id = $_REQUEST['media_id'];

    $query  = 'INSERT INTO projects (name,m_id,u_id) VALUES (?,?,?)';
    $query_result = queryForExecute($db,$query,array($project_title, $media_id, $user_id));

    $data = array();
    $data['data']=$query_result;
    $data['data']['user_id']=$user_id;
    $data['data']['project_title'] = $project_title;
    $data['data']['$media_id '] = $media_id;

    writeAjaxRes($data);
}
//***************************************************************************************//

//******************* <loadProject> : Projec 정보를 DB에서 불러오는 함수 *******************//
function loadProject($req,$db){
    $project_id = $_REQUEST['project_id'];

  //받은 id값을 가지는 프로젝트 정보 불러오기
    $query_project  = 'SELECT A.id as p_id , A.name as p_name, B.name as u_name, B.id as user_id, C.name as m_name , C.runningTime, C.path
                    FROM  projects  A LEFT JOIN users B ON A.u_id = B.id
                    LEFT JOIN medias C ON A.m_id = C.id WHERE A.id=?';
    $project_result = queryForSelect($db,$query_project,array($project_id));

  //해당 프로젝트에 해당하는 waves 효과 가져오기 (id 제외)
    $query_waves = 'SELECT startTime, endTime, title, pos_x, pos_y, duration, delay, scale, trans_x, trans_y, color, p_id FROM waves WHERE p_id = ?';
    $waves_result = queryForSelect($db,$query_waves,array($project_id));

  // 해당 프로젝트에 해당하는 captions 효과 가져오기 (id 제외)
    $query_captions= 'SELECT title, pos_x, pos_y, startTime, endTime, size, delay, color, font, contents, p_id, animation FROM captions WHERE p_id = ?';
    $caption_result = queryForSelect($db,$query_captions,array($project_id));

  // 해당 프로젝트에 해당하는 stickers 효과 가져오기 (id 제외)
    $query_stickers= 'SELECT title, pos_x, pos_y, startTime, endTime, width, height, delay, url, p_id, animation FROM stickers WHERE p_id = ?';
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
  $p_id =$_REQUEST['project_id'];
  $waves=$_REQUEST['waves_session_data'];
  $captions=$_REQUEST['captions_session_data'];
  $stickers=$_REQUEST['stickers_session_data'];

  //<-----해당 프로젝트에 대한 효과 정보를 삭제하여 초기화------>
  $query = "DELETE FROM waves where p_id = ?";
  queryForExecute($db,$query,array($p_id));

  $query = "DELETE FROM captions where p_id = ?";
  queryForExecute($db,$query,array($p_id));

  $query = "DELETE FROM stickers where p_id = ?";
  queryForExecute($db,$query,array($p_id));
  ////<----------------------------------------------------->

  //wave 효과를 DB에 insert
    for ($i = 0; $i < sizeof($waves); $i++) {
      $row = $waves[$i];
      $query = "INSERT INTO waves (startTime, endTime, title, pos_x, pos_y, duration, delay, scale, trans_x, trans_y, color, p_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  // 총 12개, 이 자리엔 $insert_data_array의 값들이 들어간다.
      $insert_data_array = array($row['startTime'], $row['endTime'], $row['title'], $row['pos_x'], $row['pos_y'],
                         $row['duration'], $row['delay'], $row['scale'], $row['trans_x'], $row['trans_y'],
                         $row['color'], $row['p_id']);
      queryForExecute($db,$query,$insert_data_array);
  	}

  //caption 효과를 DB에 insert
    for ($i = 0; $i < sizeof($captions); $i++) {
      $row = $captions[$i];
      $query ="INSERT INTO captions (title, pos_x, pos_y, startTime, endTime, size, delay, color, font, contents, p_id, animation )
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // 총 12개, 이 자리엔 $insert_data_array의 값들이 들어간다.
      $insert_data_array = array($row['title'], $row['pos_x'], $row['pos_y'], $row['startTime'], $row['endTime'],
                           $row['size'], $row['delay'], $row['color'], $row['font'],
                           $row['contents'], $row['p_id'], $row['animation']);
      queryForExecute($db,$query,$insert_data_array);
    }

  //stickers 효과를 DB에 insert
  for ($i = 0; $i < sizeof($stickers); $i++) {
    $row = $stickers[$i];
    $query ="INSERT INTO stickers (title, pos_x, pos_y, startTime, endTime, width, height, delay, url, p_id, animation )
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // 총 11개, 이 자리엔 $insert_data_array의 값들이 들어간다.
    $insert_data_array = array($row['title'], $row['pos_x'], $row['pos_y'], $row['startTime'], $row['endTime'],
                         $row['width'], $row['height'], $row['delay'], $row['url'], $row['p_id'], $row['animation'] );
    queryForExecute($db,$query, $insert_data_array);
  }

  //DB에 추가된 정보들을 Ajax로 write
  $data = array();
  $data['data']['waves']=$waves;
  $data['data']['captions']=$captions;
  $data['data']['stickers']=$stickers;
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
