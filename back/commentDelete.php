<?php

include '../db/db.php';

$cmtNo = $_POST['cmtNo'];

$sql='update comment set del_y="Y" where no='.$cmtNo;
$result = $conn->query($sql);
?>