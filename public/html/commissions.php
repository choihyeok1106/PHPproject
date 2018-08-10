<?php include './common/head.php' ?>
<link href="/vendors/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
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
            <!-- BEGIN PAGE HEADER-->
            <h1 class="page-title"> Commissions
                <small></small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Commissions</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Commission History</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table data-toggle="table">
                        <thead>
                        <tr>
                            <th data-field="id">Period</th>
                            <th data-field="amount">Amount</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <tr>
                                <td><a href="#">Week 32 2018 (7/31/2018 to 08/06/2018)</a></td>
                                <td>$0.00</td>
                                <td>
                                    <a href="#">View Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

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
<script src="/vendors/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
</body>
</html>