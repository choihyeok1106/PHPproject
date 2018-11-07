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
                    <div class="login-form">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                                       autocomplete="off"
                                       placeholder="Username" id="id" required/></div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group"
                                       type="password" autocomplete="off"
                                       placeholder="Password" id="pwd" required/></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="rem-password">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="remember" value="1"/> Remember me
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="forgot-password">
                                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot
                                        Password?</a>
                                </div>
                                <button class="btn blue" id="login" type="button">Sign In</button>
                            </div>
                        </div>
                        <div class="login-block">
                        <span>
                            Don't have an account? &nbsp; <a href="{{route('enrollment.index')}}">Join Live PURE</a>
                        </span>
                        </div>
                    </div>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <div class="forget-form">
                        <h3 class="font-green">Forgot Password ?</h3>
                        <p> Enter your e-mail address below to reset your password. </p>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off"
                                   placeholder="Email" id="email"/>
                        </div>
                        <div class="form-actions">
                            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                            <button type="button" id="submit" class="btn btn-success uppercase pull-right">Submit
                            </button>
                        </div>
                    </div>
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

    <script src="<?= STATIC_SERVER ?>/vendors/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>

    <script>
        var backstretch = [
            "https://livepure.com/img/vidthumb.jpg",
            "/img/bg/bg1.jpg",
            "/img/bg/bg2.jpg",
            "/img/bg/bg3.jpg",
            "/img/bg/bg4.jpg"
        ];

    </script>

    <script src="<?= js('/js/pages/login.js') ?>" type="text/javascript"></script>
@endsection