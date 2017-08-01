<?php
	// DB 정보
	$host='192.168.187.74';
	$dbname='media1';
	$username='root';
	$password='mediaservice';

if($db==null){
	try {
	$db=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'DB Connection failed, : ' . $e->getMessage();
		exit;
	}
}
?>
