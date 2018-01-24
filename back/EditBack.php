<?php
include '../db/db.php';

$no= $_POST['no'];
$title = $_POST['title'];
$nickname = $_POST['nickname'];
$contents = $_POST['contents'];
$depart = $_POST['depart'];
$category = $_POST['category'];


$sql = "update board set title='".$title."',contents='".$contents."',department='".$depart."',category='".$category."'where no='$no' ";
$result = $conn->query($sql);


?>