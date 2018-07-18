<?php include './common/head.php' ?>
<!-- PAGE::STYLE -->
<link href="/html2/vendors/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/html2/vendors/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />
<link href="/html2/vendors/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
<link href="/html2/vendors/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
<link href="/html2/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
<link href="/html2/vendors/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/html2/vendors/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
<link href="/html2/vendors/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/html2/css/dashboard.widgets.css" rel="stylesheet" type="text/css" media="screen" />

<body class="horizontal-menu horizontal-app-menu ">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper ">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">
                <?php include 'dashboard.php' ?>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <?php include './common/footer.php' ?>
    </div>
</div>
<?php include './common/quickview.php' ?>
<?php include './common/script.php' ?>
<!-- PAGE SCRIPT -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/lib/d3.v3.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/nv.d3.min.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/utils.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/tooltip.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/models/axis.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/models/line.js" type="text/javascript"></script>
<script src="/html2/vendors/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
<script src="/html2/vendors/mapplic/js/hammer.min.js"></script>
<script src="/html2/vendors/mapplic/js/jquery.mousewheel.js"></script>
<script src="/html2/vendors/mapplic/js/mapplic.js"></script>
<script src="/html2/vendors/rickshaw/rickshaw.min.js"></script>
<script src="/html2/vendors/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
<script src="/html2/vendors/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/html2/vendors/skycons/skycons.js" type="text/javascript"></script>
<script src="/html2/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/html2/vendors/moment/moment.min.js"></script>
<script src="/html2/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/html2/vendors/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/html2/vendors/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="/html2/vendors/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="/html2/vendors/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="/html2/vendors/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="/html2/vendors/datatables-responsive/js/lodash.min.js"></script>
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/html2/pages/js/pages.js?<?=v()?>"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="/html2/js/dashboard.js" type="text/javascript"></script>
<!--<script src="/js/scripts.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL JS -->

</body>
</html>

