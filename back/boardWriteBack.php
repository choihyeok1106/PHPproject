<?php
include '../db/db.php';

$title = $_POST['title'];
$nickname = $_POST['nickname'];
$contents = $_POST['contents'];
$depart = $_POST['depart'];
$category = $_POST['category'];
$id = $_POST['id'];


$sql="insert into board(title,name,contents,department,category,id) values('".$title."','".$nickname."','".$contents."','".$depart."','".$category."','$id')";

$result = $conn->query($sql);

?>