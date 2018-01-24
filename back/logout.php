<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
    alert("로그아웃합니다.");
    Kakao.init('42d97cde42e9b8b602b9f7ad1bbd5d6f');
    Kakao.Auth.logout();
</script>
<?php
session_start();
session_destroy();
header('Location:/index.php');
?>
