<?php include './common/head.php' ?>
<link href="/css/pages/profile-2.css?<?= v() ?>" rel="stylesheet" type="text/css"/>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php include './common/header.php' ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include './common/sidebar.php' ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="account.php">Profile</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Settings</span>
                    </li>
                </ul>
            </div>

            <div class="portlet light profile">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> Edit Profile</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row profile-account">
                        <div class="col-md-3">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab_1-1" aria-expanded="true">
                                        <i class="la la-user"></i> Personal info </a>
                                    <span class="after"> </span>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_2-2" aria-expanded="true">
                                        <i class="la la-picture-o"></i> Change Avatar </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_3-3" aria-expanded="true">
                                        <i class="la la-lock"></i> Change Password </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_4-4" aria-expanded="true">
                                        <i class="la la-eye"></i> Privacity Settings </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div id="tab_1-1" class="tab-pane active">
                                    <form role="form" action="#">
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" placeholder="some@example.com" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Home</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Cell</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Work</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Fax</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Other</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Other</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control">
                                        </div>
                                        <div class="margiv-top-10">
                                            <a href="javascript:;" class="btn green"> Save Changes </a>
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab_2-2" class="tab-pane">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon
                                        officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                    <form action="#" role="form">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="..."> </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger"> NOTE! </span>
                                                <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <a href="javascript:;" class="btn green"> Submit </a>
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab_3-3" class="tab-pane">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" class="form-control"></div>
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" class="form-control"></div>
                                        <div class="form-group">
                                            <label class="control-label">Re-type New Password</label>
                                            <input type="password" class="form-control"></div>
                                        <div class="margin-top-10">
                                            <a href="javascript:;" class="btn green"> Change Password </a>
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab_4-4" class="tab-pane">
                                    <form action="#">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center">BACK OFFICE</th>
                                                <th class="text-center">TEXT</th>
                                                <th class="text-center">EMAIL</th>
                                                <th class="text-center">
                                                    DOWNLINE LEVELS
                                                    <i class="fa fa-info-circle tooltips"
                                                       data-original-title="Select how many levels in your downline you want to receive notifications for."
                                                       data-container="body"></i>
                                                </th>
                                                <th class="text-center">
                                                    PERSONALLY ENROLLED
                                                    <i class="fa fa-info-circle tooltips"
                                                       data-original-title="Select to always receive notifications for those you've personally enrolled, regardless of downline level."
                                                       data-container="body"></i>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> Comment On Community Post</td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td> Ambassador New Enrollments (US)</td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="bs-select input-xsmall default">
                                                        <option>All</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option selected>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--end profile-settings-->
                                        <div class="margin-top-10">
                                            <a href="javascript:;" class="btn green"> Save Changes </a>
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end col-md-9-->
                    </div>
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
<script src="<?= STATIC_SERVER ?>/vendors/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
</body>
</html>