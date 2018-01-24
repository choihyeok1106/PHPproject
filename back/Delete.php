<?php
$no=$_POST['no'];
include '../db/db.php';

$sql="update board set del_y='Y' where no='$no'";
$result = $conn->query($sql);
?>