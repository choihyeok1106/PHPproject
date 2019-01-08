@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/profile-2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> Reports
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Reports</span>
        </small>
    </h1>
    <!-- END PAGE HEADER-->
    <div class="profile">
        <div class="row">
            <div class="col-md-2">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                            <i class="fa fa-briefcase"></i> My Commissions </a>
                        <span class="after"> </span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                            <i class="fa fa-group"></i> My Earnings </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_3" aria-expanded="false">
                            <i class="fa fa-leaf"></i> CarryOver Volume History </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                            <i class="fa fa-info-circle"></i> Rank Summary </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                            <i class="fa fa-tint"></i> AutoShip Week Reports </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_3" aria-expanded="true">
                            <i class="fa fa-plus"></i> Genealogy Reports </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th>
                            <i class="fa fa-briefcase"></i> Company
                        </th>
                        <th class="hidden-xs">
                            <i class="fa fa-question"></i> Descrition
                        </th>
                        <th>
                            <i class="fa fa-bookmark"></i> Amount
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a href="javascript:;"> Pixel Ltd </a>
                        </td>
                        <td class="hidden-xs"> Server hardware purchase</td>
                        <td> 52560.10$
                            <span class="label label-success label-sm"> Paid </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> Smart House </a>
                        </td>
                        <td class="hidden-xs"> Office furniture purchase</td>
                        <td> 5760.00$
                            <span class="label label-warning label-sm"> Pending </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> FoodMaster Ltd </a>
                        </td>
                        <td class="hidden-xs"> Company Anual Dinner Catering</td>
                        <td> 12400.00$
                            <span class="label label-success label-sm"> Paid </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> WaterPure Ltd </a>
                        </td>
                        <td class="hidden-xs"> Payment for Jan 2013</td>
                        <td> 610.50$
                            <span class="label label-danger label-sm"> Overdue </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> Pixel Ltd </a>
                        </td>
                        <td class="hidden-xs"> Server hardware purchase</td>
                        <td> 52560.10$
                            <span class="label label-success label-sm"> Paid </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> Smart House </a>
                        </td>
                        <td class="hidden-xs"> Office furniture purchase</td>
                        <td> 5760.00$
                            <span class="label label-warning label-sm"> Pending </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:;"> FoodMaster Ltd </a>
                        </td>
                        <td class="hidden-xs"> Company Anual Dinner Catering</td>
                        <td> 12400.00$
                            <span class="label label-success label-sm"> Paid </span>
                        </td>
                        <td>
                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection