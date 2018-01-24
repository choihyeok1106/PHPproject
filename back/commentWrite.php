
<?php 

include '../db/db.php';

$boardid=$_POST['boardid'];
$kakaoid=$_POST['kakaoid'];
$name=$_POST['name'];
$contents=$_POST['contents'];

$sql = 'insert into comment(boardid,kakaoid,name,contents)values('.$boardid.','.$kakaoid.',"'.$name.'","'.$contents.'")';
$result=$conn->query($sql);


?>