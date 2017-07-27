<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';


 $title = $_POST['title'];
 $pos_x = $_POST['pos_x'];
 $pos_y = $_POST['pos_y'];
 $startTime = $_POST['startTime'];
 $endTime = $_POST['endTime'];
 $width = $_POST['width'];
 $height = $_POST['height'];
 $delay = $_POST['delay'];
 $url = $_POST['url'];
 $project_no = $_POST['project_no'];
 $animation = $_POST['animation'];

 /* Modify id for the system  */
 $query ="INSERT INTO stickers (title, pos_x, pos_y, startTime, endTime, width, height, delay, url, p_id, animation )
                     VALUES ('$title', '$pos_x', '$pos_y', '$startTime', '$endTime', '$width', '$height', '$delay', '$url','$project_no','$animation')";
 queryForExecute($db,$query);
 ?>
