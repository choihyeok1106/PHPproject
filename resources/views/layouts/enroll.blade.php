<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
@include('.layouts.common.head')
@yield('style.plugins')
    <body class=" login">
@yield('content')
            <div class="content no-bg">
            </div>
     </body>

</html>
@include('layouts.common.script')
@yield('script.plugins')
