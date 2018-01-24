<ul class="nav navbar-nav kakao">
    <li class="nav-item nav-link">
        <?php 
        session_start();
        if (empty($_SESSION['user'])){ ?>
        <a id="kakao-login-btn"></a>
        <script type='text/javascript'>
            //<![CDATA[
            // 사용할 앱의 JavaScript 키를 설정해 주세요.
            Kakao.init('42d97cde42e9b8b602b9f7ad1bbd5d6f');
            // 카카오 로그인 버튼을 생성합니다.
            Kakao.Auth.createLoginButton({
                container: '#kakao-login-btn',
                success: function(authObj) {
                    // 로그인 성공시, API를 호출합니다.
                    Kakao.API.request({
                        url: '/v1/user/me',
                        success: function(res) {
                            var nickname = res.properties.nickname;
                            var id = res.id;
                            $.ajax({
                                type: 'POST',
                                url: 'back/user.php',
                                data: {
                                    id: id,
                                    nickname: nickname
                                },
                                success: function() {
                                    location.reload();
                                }
                            })
                        },
                        fail: function(error) {
                            alert(JSON.stringify(error));
                        }
                    });
                },
                fail: function(err) {
                    alert(JSON.stringify(err));
                }
            });
            //]]>

        </script>
        <?php }  else {?>
            <span style="color:#b1dae6;"><?php
                echo $_SESSION['nickname'];
                ?> 님 환영합니다.</span>
        <a href="../back/logout.php"><button id="logout" class="btn btn-warning btn-lg">
        LogOUT</button></a>
        <?php } ?>
    </li>
</ul>
