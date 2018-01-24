<?php
include '../db/db.php';


 $id=$_POST['id'];
 $nickname=$_POST['nickname']; 

$sql = "select*from kakao where id =". $id; // id 받아서 insert
$result = $conn->query($sql); // 쿼리문실행

// 없을때
if ($result->num_rows == 0) {
    $sql = "insert into kakao (id, nickname) values ('$id', '$nickname')";
    $result = $conn->query($sql);
}


//세션시작
 session_start();
 $_SESSION['user'] = $id;
 $_SESSION['nickname'] = $nickname;
 echo '로그인 ok';
?>