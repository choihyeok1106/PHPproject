<?php
if(empty($_SESSION['user'])){
?>

<script>
alert("카카오 로그인이 필요합니다. 첫페이지로 이동합니다.")
location.href='../index.php'
</script>;

<?php
}
?>