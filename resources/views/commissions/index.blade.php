@extends('layouts.app')
@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title"> Commissions
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Commissions</span>
        </small>
    </h1>

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
                    <td><a href="{{route('commissions.show',123456)}}">Week 32 2018 (7/31/2018 to 08/06/2018)</a></td>
                    <td>$0.00</td>
                    <td>
                        <a href="{{route('commissions.show',123456)}}">View Detail</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
@endsection