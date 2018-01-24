<?php
include '../db/db.php';

$contents=$_POST['contents'];
$cmtNo=$_POST['cmtNo'];

$sql = "update comment set contents= '".$contents."' where no=".$cmtNo." ";
$result = $conn->query($sql);


?>