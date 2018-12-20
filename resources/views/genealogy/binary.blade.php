@extends('layouts.app')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title" data-menu="my-business">Graphical genealogy
        <small>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>My business</span>
            <i class="fa fa-angle-right"></i>
            <span>Binary tree</span>
        </small>
    </h1>
    <div class="page-bar hidden">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Graphical Genealogy</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <select id="tree-select" class="bs-select form-control input-small default">
                <option value="binary">Binary tree</option>
                <option value="sponsor">Sponsor tree</option>
            </select>
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <div id="binary-tree" class="OrgChart"></div>

    @include('genealogy.side')
@endsection


@section('script.plugins')
    <script src="<?= js('/vendors/OrgChartJS/orgchart.js') ?>" type="text/javascript"></script>
    <script src="<?= js('/js/pages/genealogy.js') ?>" type="text/javascript"></script>
@endsection
