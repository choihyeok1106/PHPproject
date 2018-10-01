@extends('layouts.auth')

@section('content')
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset mt-login-5-bsfix">
                <div class="login-bg" style="background-image:url('https://livepure.com/img/vidthumb.jpg')">
                    <a href="/html"><img class="login-logo" src="/img/logo_white.png"/></a>
                </div>
            </div>
            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                <div class="login-content">
                    <h1>Virtual Back Office Login</h1>
                    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam
                        erat volutpat. Lorem ipsum dolor
                        sit amet, coectetuer adipiscing. </p>
                    <form action="javascript:;" class="login-form" method="post">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span>Enter any username and password. </span>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                                       autocomplete="off"
                                       placeholder="Username" name="username" required/></div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group"
                                       type="password" autocomplete="off"
                                       placeholder="Password" name="password" required/></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="rem-password">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" name="remember" value="1"/> Remember me
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="forgot-password">
                                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot
                                        Password?</a>
                                </div>
                                <button class="btn blue" type="submit">Sign In</button>
                            </div>
                        </div>
                        <div class="login-block">
                        <span>
                            Don't have an account? &nbsp; <a href="{{route('enrollment.index')}}">Join Live PURE</a>
                        </span>
                        </div>
                    </form>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" action="javascript:;" method="post">
                        <h3 class="font-green">Forgot Password ?</h3>
                        <p> Enter your e-mail address below to reset your password. </p>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off"
                                   placeholder="Email" name="email"/>
                        </div>
                        <div class="form-actions">
                            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
                <div class="login-footer">
                    <ul class="login-social">
                        <li>
                            <select id="locale">
                                <option>English</option>
                                <option>Korean</option>
                            </select>
                        </li>
                    </ul>
                    <div class="login-copyright margin-top-5">
                        <p>&copy; PURE, Inc. 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-validation/js/additional-methods.min.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>

    <script>
        var backstretch = [
            "https://livepure.com/img/vidthumb.jpg",
            "/assets/pages/img/login/bg1.jpg",
            "/assets/pages/img/login/bg2.jpg",
            "/assets/pages/img/login/bg3.jpg"
        ];
    </script>

    <script src="/js/pages/login.js?<?= v() ?>" type="text/javascript"></script>
@endsection