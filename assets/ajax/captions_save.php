<?php
include '../config/dbconn.php';
include '../util/queryUtil.php';
include '../util/ajaxUtil.php';


 $title = $_POST['title'];
 $contents = $_POST['contents'];
 $pos_x = $_POST['pos_x'];
 $pos_y = $_POST['pos_y'];
 $startTime = $_POST['startTime'];
 $endTime = $_POST['endTime'];
 $size = $_POST['size'];
 $delay = $_POST['delay'];
 $color = $_POST['color'];
 $font = $_POST['font'];
 $animation = $_POST['animation'];
 $project_no = $_POST['project_no'];

 /* Modify id for the system  */
 $query ="INSERT INTO captions (title, pos_x, pos_y, startTime, endTime, size, delay, color, font, contents, p_id, animation )
                     VALUES ('$title', '$pos_x', '$pos_y', '$startTime', '$endTime', '$size', '$delay', '$color', '$font', '$contents','$project_no','$animation' )";
 queryForExecute($db,$query);
 ?>
