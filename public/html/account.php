<?php include './common/head.php' ?>

<body class="horizontal-menu horizontal-app-menu account">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">

                <h3 class="page-title">Account</h3>

                <div class="card card-borderless">
                    <div class="card-body flex-row">
                        <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left full-height">
                            <li class="nav-item">
                                <a href="#" class="p-r-35 active" data-toggle="tab" data-target="#tab1">
                                    <i class="fa fa-user"></i> Personal Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  class="p-r-35" data-toggle="tab" data-target="#tab2">
                                    <i class="fa fa-image"></i> Change Avatar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="p-r-35" data-toggle="tab" data-target="#tab3">
                                    <i class="fa fa-lock"></i> Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  class="p-r-35" data-toggle="tab" data-target="#tab4">
                                    <i class="fa fa-map-pin"></i> Your Address
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  class="p-r-35" data-toggle="tab" data-target="#tab5">
                                    <i class="fa fa-cog"></i> Privacy Settings
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content full-height" style="min-height: 220px">
                            <div class="tab-pane active" id="tab1">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Your name</label>
                                        <input type="text" value="Brandy Costello" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" value="Brandy.Costello@aol.com" class="form-control" placeholder="ex: some@example.com"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="email" value="(985) 969-4418" class="form-control" placeholder="ex: some@example.com"
                                               required="">
                                    </div>
                                    <div class="form-actions">
                                        <button class="btn btn-success btn-cons" type="submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon
                                    officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </p>
                                <form role="form">
                                    <div class="form-group">
                                        <img src="/img/profiles/bd2x.jpg" class="avatar-upload">
                                    </div>
                                    <div class="form-group">
                                        <span class="small hint-text m-t-5">Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only</span>
                                    </div>
                                    <div class="form-actions">
                                        <button class="btn btn-default btn-cons" type="submit">Select Image</button>
                                        <button class="btn btn-success btn-cons" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon
                                    officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </p>
                                <form role="form">
                                    <div class="form-group">
                                        <img src="/img/profiles/bd2x.jpg" class="avatar-upload">
                                    </div>
                                    <div class="form-group">
                                        <span class="small hint-text m-t-5">Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only</span>
                                    </div>
                                    <div class="form-actions">
                                        <button class="btn btn-default btn-cons" type="submit">Select Image</button>
                                        <button class="btn btn-success btn-cons" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Re-type New Password</label>
                                        <input type="password" class="form-control" required>
                                    </div>
                                    <div class="form-actions">
                                        <button class="btn btn-success btn-cons" type="submit">Change Password</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <ul class="nav nav-tabs nav-tabs-fillup" role="tablist">
                                    <li class="nav-item">
                                        <a class="active show" data-toggle="tab" role="tab" data-target="#tab2hellowWorld" href="#"
                                           aria-selected="true">Shipping Addresses
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="tab" role="tab" data-target="#tab2FollowUs" class="" aria-selected="false">
                                            Billing Addresses
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab2hellowWorld">
                                        <div class="pull-right m-b-10">
                                            <button class="btn btn-complete btn-xs " type="button">
                                                <i class="fa fa-plus"></i> Add Address
                                            </button>
                                        </div>
                                        <table class="table card-table">
                                            <thead>
                                            <th class="text-left">Full name</th>
                                            <th class="text-left">Address</th>
                                            <th class="text-center">Phone number</th>
                                            <th class="text-right">Action</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-left">Brandy Costello</td>
                                                <td class="text-left">76085 3203 Deer Path Lane, Weatherford, TX , USA</td>
                                                <td class="text-center">(985) 969-4418</td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab2FollowUs">
                                        <div class="pull-right m-b-10">
                                            <button class="btn btn-complete btn-xs " type="button">
                                                <i class="fa fa-plus"></i> Add Address
                                            </button>
                                        </div>
                                        <table class="table card-table">
                                            <thead>
                                            <th class="text-left">Full name</th>
                                            <th class="text-left">Address</th>
                                            <th class="text-center">Phone number</th>
                                            <th class="text-right">Action</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-left">Brandy Costello</td>
                                                <td class="text-left">76085 3203 Deer Path Lane, Weatherford, TX , USA</td>
                                                <td class="text-center">(985) 969-4418</td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <h5>Notifications</h5>
                                <p>Control what information you are notified about and how you receive it</p>
                                <table class="table card-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Back Office</th>
                                        <th class="text-center">Text</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">
                                            Downline Levels
                                            <i title="" data-placement="right" data-toggle="tooltip" class="tip fa fa-info-circle m-l-5"
                                               data-original-title="Select how many levels in your downline you want to receive notifications for."></i>
                                        </th>
                                        <th class="text-center">
                                            Personally Enrolled
                                            <i title="" data-placement="right" data-toggle="tooltip" class="tip fa fa-info-circle m-l-5"
                                               data-original-title="Select to always receive notifications for those you've personally enrolled, regardless of downline level."></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Comment On Community Post</td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>Ambassador New Enrollments (US)</td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                <option>All</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option selected>4</option>
                                                <option>5</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5 class="m-t-30">Downline Activity Preferences</h5>
                                <p>Receive notifications for your downline's enrollments, orders and rank advancement</p>
                                <table class="table card-table">
                                    <tbody>
                                    <tr>
                                        <td>Select how many levels in your downline you want to receive notifications for</td>
                                        <td class="text-center">
                                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                <option>All</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option selected>4</option>
                                                <option>5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Receive notifications for Ambassadors you've personally enrolled, regardless of level</td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5 class="m-t-30">Offline Messages</h5>
                                <p>Choose how you want to receive messages when not online</p>
                                <table class="table card-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Text</th>
                                        <th class="text-center">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>When user is offline, send team messages via</td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox check-success  ">
                                                <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                                                <label for="checkbox-agree"></label>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                                <h5 class="m-t-30">Corporate Communication</h5>
                                <p>Control how you receive messages from corporate</p>
                                <table class="table card-table">
                                    <tbody>
                                    <tr>
                                        <td>Corporate can contact me through email</td>
                                        <td class="text-center">
                                            <input type="checkbox" data-init-plugin="switchery" checked="checked"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <?php include './common/footer.php' ?>
    </div>
</div>
<?php include './common/quickview.php' ?>
<?php include './common/script.php' ?>
<!-- PAGE SCRIPT -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/pages/js/pages.js?<?= v() ?>"></script>


</body>
</html>

