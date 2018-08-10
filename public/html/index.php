<?php include './common/head.php' ?>
<link href="/vendors/flexslider/flexslider.css" rel="stylesheet" type="text/css"/>
<link href="/vendors/circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css"/>
<link href="/vendors/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGINS -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php include './common/header.php' ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include './common/sidebar.php' ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <?php include 'dashboard.php' ?>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <?php include './common/quick-sidebar.php' ?>
</div>
<!-- END CONTAINER -->
<?php include './common/footer.php' ?>
<?php include './common/script.php' ?>
<!-- END PAGE LEVEL PLUGINS -->
<script src="/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/vendors/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/vendors/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/vendors/flexslider/jquery.flexslider.js?<?= v() ?>" type="text/javascript"></script>
<script src="/vendors/circliful/js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="/vendors/moment.min.js" type="text/javascript"></script>
<script src="/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/vendors/muuri/dist/web-animations-2.3.1.min.js"></script>
<script src="/vendors/muuri/dist/hammer-2.0.8.min.js"></script>
<script src="/vendors/muuri/dist/muuri.js"></script>
<script src="/vendors/horizontal-timeline/horizontal-timeline.js?<?= v() ?>" type="text/javascript"></script>
<script src="/js/pages/dashboard.js?<?= v() ?>" type="text/javascript"></script>
</body>
</html>