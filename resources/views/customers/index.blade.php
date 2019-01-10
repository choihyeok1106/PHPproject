@extends('layouts.app')
@section('style.plugins')

    <style>

        .customers-warning li span {
            display: inline-block;
            vertical-align: top;
        }

        .customer-caption-button > div {
            float: left;
        }

        .customer-caption-button i {
            margin-right: 5px;
        }

        .customer-caption-button button {
            margin-left: 5px;
        }

        .customers-form {
            display: flex;
            justify-content: space-between;
        }

        .customers-form > div:first-child {
            flex: 1;
        }

        .customer-form > div:last-child {
            flex: 1;
        }

        .customers-form > div:first-child > div {
            display: inline-block;
        }

        .customers-form > div:first-child > div:first-child, .customers-form > div:first-child > div:last-child {
            width: 20%;
            min-width: 230px;
            margin-right: 20px;
        }

        .customers-border {
            border: 1px solid #aaaaaa;
            border-radius: 5px;
            padding: 8px;
        }

        .customers-sch {
            position: relative;
        }

        .customers-sch i {
            position: absolute;
            top: 13px;
            left: 13px;
            zoom: 0.95;
            color: #aaaaaa;
        }

        input::-ms-input-placeholder {
            color: #aaaaaa;
        }

        input::-webkit-input-placeholder {
            color: #aaaaaa;
        }

        input::-moz-placeholder {
            color: #aaaaaa;
        }

        .customers-sch input {
            padding-left: 25px;
        }

        table tr td {
            padding: 10px 15px;
        }

        table tr td:first-child {
            padding: 10px 5px;
        }

        .m-datatable__head > tr > td a {
            float: right;
            color: #bebebe;
        }

        .m-datatable__head > tr > td i {
            padding: 3px 7px;
            background-color: #fff;
        }

        .m-datatable__pager-nav {
            font-size: 0;
        }

        .m-datatable__pager-nav > a > li {
            display: inline-block;
            font-size: 12px;
            padding: 3px 10px;
            border: 1px solid #ccc;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title">Customers
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>My business</span>
            <i class="fa fa-angle-right"></i>
            <span>Customers</span>
        </small>
    </h1>

    <!-- END PAGE HEADER-->

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">My Customers</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-outline green btn-sm" href="javascript:;">
                            <i class="fa fa-plus" style="vertical-align: middle;"></i> <span> NEW CUSTOMER</span>
                        </a>
                        <div class="btn-group" style="position:relative;">
                            <a class="btn btn-circle btn-outline grey-mint btn-sm dropdown" href="javascript:;"
                               data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-align-left" style="vertical-align: middle;"></i><span> EXPORT</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default pull-left" style="right: 0;left: auto">
                                <li><a href="javascript:;"><i class="fa fa-print"></i> Print</a></li>
                                <li><a href="javascript:;"><i class="fa fa-file-pdf-o"></i> Save as PDF</a></li>
                                <li><a href="javascript:;"><i class="fa fa-file-excel-o"></i> Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="customers-form">
                        <div>
                            <div class="customers-border customers-sch">
                                <input type="text" value="" class="" placeholder="Search..." id=""
                                       style="font-family:'Roboto-Regular';border:none;outline: none;widht:100%;"/>
                                <i class="icon-magnifier"></i>
                            </div>
                            <div>
                                <span style="font-family:Roboto-Regular;margin-right:10px;color:#aaaaaa">Type : </span>
                            </div>
                            <div>
                                <div class="customers-border">
                                    <select name="" id="#"
                                            style="border:none;outline:none;width:100%;color:#aaaaaa;background: #ffffff">
                                        <option selected>All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="padding:5px 0;">
                            <select name="" id="#"
                                    style="border:none;outline:none;padding:5px 20px 5px 5px;color:#aaaaaa;border:1px solid #aaaaaa;margin-right:5px;">
                                <option selected>10</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </form>
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"
                         id="auto_column_hide" style="">
                        <table data-toggle="table" class="m-datatable__table"
                               style="width:100%; overflow-x: auto; margin-top:20px;">
                            <thead class="m-datatable__head" style="background-color:#faf9fc;font-size:13px;">
                            <tr class="m-datatable__row" style="left: 0px;">
                                <td data-field=""
                                    class="m-datatable__cell m-datatable__toggle-detail m-datatable__cell--sort"></td>
                                <td data-field="">Level <a href="#" style="float:right;"><i
                                                class="glyphicon glyphicon-sort-by-attributes-alt"></i></a></td>
                                <td data-field="">Cust # <a href="#"><i class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Name<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Phone<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Join Date<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Type<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Email<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="">Referrer #<a href="#" style="float:right;"><i
                                                class="fa fa-arrows-v"></i></a></td>
                                <td data-field="" style="text-align: center;">Actions</td>
                            </tr>
                            </thead>
                            <tbody class="m-datatable__body" style="font-size:12px;font-weight:200;">
                            <tr data-row="0" class="m-datatable__row" style="left: 0px;">
                                <td class="m-datatable__cell m-datatable__toggle--detail" style="text-align: center;"><a href="#" class="font-green" data-toggle="icon_tr"><i
                                                class="fa fa-caret-right"
                                                style="zoom:1.5;"></i></a></td>
                                <td class="m-datatable__cell">1</td>
                                <td class="m-datatable__cell">100095091</td>
                                <td class="m-datatable__cell">Carroll Maharrty</td>
                                <td class="m-datatable__cell">4209350970</td>
                                <td class="m-datatable__cell">1/18/2018</td>
                                <td class="m-datatable__cell">Preferred</td>
                                <td class="m-datatable__cell">mahally1234@gmail.com</td>
                                <td class="m-datatable__cell">kr1097118</td>
                                <td class="m-datatable__cell" style="text-align: right;">
                                    <div class="btn-group">
                                        <a href="" data-toggle="dropdown"><i class="la la-ellipsis-h"
                                                                             style="zoom:1.5;margin-right:5px;"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-default pull-left"
                                            style="right: 0;left: auto;" data-toggle="dropdown" aria-haspopup="false"
                                            aria-expanded="false">
                                            <li><a href="javascript:;"><i class="fa fa-user"></i> Edit Profile</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i> View
                                                    Orders</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-envelope"></i> Send Email</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group open">
                                        <a href="#"><i class="la la-cart-arrow-down"
                                                       style="zoom:1.5;margin-right:5px;;"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="m-datatable__row-detail">
                                <td class="m-datatable__detail" ></td>
                                <td class="m-datatable__detail" colspan="13">
                                    <table style="width:80%;border-top:1px solid #eee;border-bottom: 1px solid #eee;">
                                        <tr class="m-datatable__row" style="border-left:1px solid #eee;border-right:1px solid #eee;border-bottom:1px solid #eee;">
                                            <td class="m-datatable__cell" style="padding-left:15px;">Subject</td>
                                            <td class="m-datatable__cell">Products Recommendation</td>
                                            <td class="m-datatable__cell" style="border-left:1px solid #eee;">Created</td>
                                            <td class="m-datatable__cell">2/31/2018 10:30:48 PM</td>
                                        </tr>
                                        <tr class="m-datatable__row" style="border-left:1px solid #eee;border-right:1px solid #eee;border-bottom:1px solid #eee;">
                                            <td class="m-datatable__cell" style="padding-left:15px;">Notes</td>
                                            <td class="m-datatable__cell" colspan="3">Mr. Maharrty and his wife are interested in weight loss. I
                                                have recommended them to the Rally28 family for their products of
                                                interest.
                                            </td>
                                        </tr>
                                        <tr class="m-datatable__row" style="border-left:1px solid #eee;border-right:1px solid #eee;">
                                            <td class="m-datatable__cell" style="padding-left:15px;">Actions</td>
                                            <td class="m-datatable__cell" colspan="3">
                                                <button class="btn btn-circle btn-xs blue-madison" type="button"
                                                        data-toggle="modal" data-target="#modal-edit">Edit Note
                                                </button>
                                                <button class="btn btn-circle btn-xs green" type="button"
                                                        data-toggle="modal" data-target="#modal-new">New Note
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                        <div class="m-datatable__pager-info" style="float:left;">
                            <span style="line-height: 2;"><small>Showing 1 to 4 of 12 records</small></span>
                        </div>
                        <ul class="m-datatable__pager-nav" style="float:right;">
                            <a href="#">
                                <li title="Previous"
                                    class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled"
                                    style="border-right:none;"><i class="la la-angle-left"></i></li>
                            </a>
                            <a href="#">
                                <li class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">
                                    1
                                </li>
                            </a>
                            <a href="#">
                                <li title="Previous"
                                    class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled"
                                    style="border-left:none;"><i class="la la-angle-right"></i></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            {{--modal click : Edit Note --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
                <div class="modal-dialog" role="document" style="width:30%;font-size:12px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="float:left;">Edit Note</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="line-height: 3;">
                                <span>Date Created: </span>
                                <span>1/02/2019 11:12:56 AM</span>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Subject:</label>
                                    <input type="text" class="form-control" id="recipient-name"
                                           value="Products Recommendation" style="font-size:12px;">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Message:</label>
                                    <textarea class="form-control" id="message-text"
                                              style="height:80px;font-size:12px;">Mr. Maharrty and his wife are interested in weight loss. I have recommended them to the Rally28 family for their products of interest.</textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-circle btn-default" data-dismiss="modal">Cancel
                            </button>
                            <button type="button" class="btn btn-circle green">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--modal//--}}

            {{--modal click : New Note --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-new">
                <div class="modal-dialog" role="document" style="width:30%;font-size:12px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="float:left;">New Note</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="line-height: 3;">
                                <span>Date Created: </span>
                                <span>1/02/2019 11:12:56 AM</span>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Subject:</label>
                                    <input type="text" class="form-control" id="recipient-name" style="font-size:12px;">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Message:</label>
                                    <textarea class="form-control" id="message-text"
                                              style="height:80px;font-size:12px;"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-circle btn-default" data-dismiss="modal">Cancel
                            </button>
                            <button type="button" class="btn btn-circle green">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--modal//--}}
        </div>
    </div>


@endsection
