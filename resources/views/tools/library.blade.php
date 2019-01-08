@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/profile-2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title"> Library
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Tools</span>
            <i class="fa fa-angle-right"></i>
            <span>Library</span>
        </small>
    </h1>
    <!-- END PAGE HEADER-->
    <div class="profile">
        <div class="row">
            <div class="col-md-2">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                            <i class="fa fa-briefcase"></i> General Questions </a>
                        <span class="after"> </span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                            <i class="fa fa-group"></i> Membership </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_3" aria-expanded="false">
                            <i class="fa fa-leaf"></i> Terms Of Service </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                            <i class="fa fa-info-circle"></i> License Terms </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                            <i class="fa fa-tint"></i> Payment Rules </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_3" aria-expanded="true">
                            <i class="fa fa-plus"></i> Other Questions </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="mt-comments libs">
                    <div class="mt-comment">
                        <div class="mt-comment-img">
                            <img src="/img/files/mp4.svg" class="file-icon">
                        </div>
                        <div class="mt-comment-body">
                            <div class="mt-comment-info">
                                        <span class="mt-comment-author">
                                            <a href="#">Michael Baker</a>
                                        </span>
                                <span class="mt-comment-date">26 Feb, 10:30AM</span>
                            </div>
                            <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.
                            </div>
                            <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                    <li>
                                        <a href="#"> <i class="icon-eye"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-link"></i> Copy link </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-envelope"></i> Send to Email </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-share-alt"></i> Share </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-comment">
                        <div class="mt-comment-img">
                            <img src="/img/files/zip.svg" class="file-icon">
                        </div>
                        <div class="mt-comment-body">
                            <div class="mt-comment-info">
                                        <span class="mt-comment-author">
                                            <a href="#">Larisa Maskalyova</a>
                                        </span>
                                <span class="mt-comment-date">12 Feb, 08:30AM</span>
                            </div>
                            <div class="mt-comment-text"> It is a long established fact that a reader will be
                                distracted.
                            </div>
                            <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                    <li>
                                        <a href="#"> <i class="icon-eye"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-link"></i> Copy link </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-envelope"></i> Send to Email </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-share-alt"></i> Share </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-comment">
                        <div class="mt-comment-img">
                            <img src="/img/files/jpg.svg" class="file-icon">
                        </div>
                        <div class="mt-comment-body">
                            <div class="mt-comment-info">
                                        <span class="mt-comment-author">
                                            <a href="#">Natasha Kim</a>
                                        </span>
                                <span class="mt-comment-date">19 Dec,09:50 AM</span>
                            </div>
                            <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore
                                or
                                non-characteristic.
                            </div>
                            <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                    <li>
                                        <a href="#"> <i class="icon-eye"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-link"></i> Copy link </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-envelope"></i> Send to Email </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-share-alt"></i> Share </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-comment">
                        <div class="mt-comment-img">
                            <img src="/img/files/pdf.svg" class="file-icon">
                        </div>
                        <div class="mt-comment-body">
                            <div class="mt-comment-info">
                                        <span class="mt-comment-author">
                                            <a href="#">Sebastian Davidson</a>
                                        </span>
                                <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                            </div>
                            <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used
                                since the 1500s or
                                non-characteristic.
                            </div>
                            <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                    <li>
                                        <a href="#"> <i class="icon-eye"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-link"></i> Copy link </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-envelope"></i> Send to Email </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="icon-share-alt"></i> Share </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection