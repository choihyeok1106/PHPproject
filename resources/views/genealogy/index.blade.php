@extends('layouts.app')
@section('style.plugins')
    <style>
        /*html, body {*/
        /*margin: 0px;*/
        /*padding: 0px;*/
        /*width: 100%;*/
        /*height: 100%;*/
        /*overflow: hidden;*/
        /*text-align: center;*/
        /*font-family: Helvetica;*/
        /*}*/

        /*#tree {*/
        /*width: 100%;*/
        /*height: 100%;*/
        /*position: relative;*/
        /*}*/

        /*[node-id] rect {*/
        /*fill: #fff;*/
        /*border-top: 1px solid #ff0000;*/
        /*border-radius: 0;*/
        /*box-shadow: none;*/
        /*}*/

        /*[node-id='1'] rect {*/
        /*fill: #fff;*/
        /*}*/

        /*.field_0 {*/
        /*font-family: Impact;*/
        /*text-transform: uppercase;*/
        /*fill: #a3a3a3;*/
        /*}*/

        /*.field_1 {*/
        /*fill: #a3a3a3;*/
        /*}*/

        /*[link-id] path {*/
        /*stroke: #750000;*/
        /*}*/

        /*[link-id='[3][4]'] path {*/
        /*stroke: #016e25;*/
        /*}*/

        /*[control-expcoll-id] circle {*/
        /*fill: #750000;*/
        /*}*/

        /*[control-expcoll-id='3'] circle {*/
        /*fill: #016e25;*/
        /*}*/

        /*[control-node-menu-id] circle {*/
        /*fill: #bfbfbf;*/
        /*}*/

        #tree > svg {
            background-color: transparent !important;
        }

        .bg-search-table {
            /*background-color: transparent !important;*/
        }

        .bg-search-table input {
            /*background-color: transparent !important;*/
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title">Genealogy
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
                <span>Genealogy</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                        data-hover="dropdown"
                        data-delay="1000" data-close-others="true"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <div style="width:100%; height:760px" id="tree"/>


@endsection


@section('script.plugins')
    <script src="<?= js('/vendors/OrgChartJS/orgchart.js') ?>" type="text/javascript"></script>
    <script>
        function theme1() {
            var parentNodeId = null;

            function showTemplatePicker(nodeId) {
                parentNodeId = nodeId;

                document.getElementById("bg").style.display = "block";
                document.getElementById("title").style.display = "block";

                var templatePicker = document.getElementById("templatePicker");
                templatePicker.style.opacity = 0;
                templatePicker.style.left = "-10px";

                templatePicker.style.display = "initial";
                BALKANGraph.animate(
                    templatePicker,
                    {opacity: 0, left: -10},
                    {opacity: 1, left: 0},
                    300, BALKANGraph.animate.inOutPow);
            }

            function hideTemplatePicker() {
                document.getElementById("bg").style.display = "none";
                document.getElementById("title").style.display = "none";
                document.getElementById("templatePicker").style.display = "none";
            }


            var chart = new OrgChart(document.getElementById("tree"), {
                template: "ula",
                enableDragDrop: true,
                mouseScroolBehaviour: BALKANGraph.action.zoom,
                scaleInitial: BALKANGraph.match.boundary,
                nodeMenu: {
                    add: {
                        text: "Add New",
                        onClick: showTemplatePicker
                    }
                },
                nodeBinding: {
                    field_0: "name",
                    field_1: "title",
                    img_0: "img"
                },
                nodes: [
                    {
                        id: 1,
                        name: "Denny Curtis CurtisCurtisCurtisCurtis",
                        title: "CEO",
                        img: "https://balkangraph.com/js/img/2.jpg"
                    },
                    {
                        id: 2,
                        pid: 1,
                        name: "Ashley Barnett",
                        title: "Sales Manager",
                        img: "https://balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 3,
                        pid: 1,
                        name: "Caden Ellison",
                        title: "Dev Manager",
                        img: "https://balkangraph.com/js/img/4.jpg"
                    },
                    {id: 4, pid: 2, name: "Elliot Patel", title: "Sales", img: "https://balkangraph.com/js/img/5.jpg"},
                    {id: 5, pid: 2, name: "Lynn Hussain", title: "Sales", img: "https://balkangraph.com/js/img/6.jpg"},
                    {
                        id: 6,
                        pid: 3,
                        name: "Tanner May",
                        title: "Developer",
                        img: "https://balkangraph.com/js/img/7.jpg"
                    },
                    {
                        id: 7,
                        pid: 3,
                        name: "Fran Parsons",
                        title: "Developer",
                        img: "https://balkangraph.com/js/img/8.jpg"
                    }
                ]
            });

            var html = "";
            for (var templateNeme in OrgChart.templates) {
                if (templateNeme.indexOf("group") != -1)
                    continue;

                var node = new BALKANGraph.node(templateNeme, null, [], templateNeme);
                html += '<svg data-template-name="' + templateNeme + '" style="padding: 2px 0px  2px 7px; cursor:pointer; padding: 10px;" preserveAspectRatio="xMaxYMax meet" width="' + node.w + '" height="' + (node.h + 30) + '" viewBox="0, 0, ' + node.w + ', ' + (node.h) + '"><defs>' + chart.ui.defs() + '</defs>' + chart.ui.node(node, {
                    id: 1,
                    name: "Lorem ipsum",
                    title: "Dolor sit amet",
                    img: "https://balkangraph.com/js/img/empty-img-white.svg"
                }, [], chart.config, 0, 0, chart.nodeBinding) + "</svg>";
            }

            document.getElementById("templatePicker").innerHTML = html;

            var templateElements = document.querySelectorAll("[data-template-name]");

            for (var i = 0; i < templateElements.length; i++) {
                templateElements[i].addEventListener("click", function () {
                    var name = this.getAttribute("data-template-name");

                    if (!chart.config.tags[name]) {
                        chart.config.tags[name] = {template: name};
                    }

                    var node = {};
                    node.id = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
                    node.pid = parentNodeId;
                    node.tags = [name];
                    node.img = "https://balkangraph.com/js/img/empty-img-white.svg";
                    chart.addNode(node);

                    hideTemplatePicker();
                });
            }
        }

        function theme3() {
            OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.ana);
            OrgChart.templates.myTemplate.size = [250, 100];
            OrgChart.templates.myTemplate.node = '<rect x="0" y="0" height="100" width="250" fill="#ffffff" stroke-width="1" stroke="#aeaeae"></rect>';
            OrgChart.templates.myTemplate.node += '<line x1="0" y1="0" x2="250" y2="0" stroke-width="2" stroke="#039BE5"></line>';

            OrgChart.templates.myTemplate.rippleRadius = 0;
            OrgChart.templates.myTemplate.rippleColor = "#0890D3";

            OrgChart.templates.myTemplate.field_0 = '<text class="field_0" style="font-size: 14px;" fill="#039BE5" x="95" y="35">{val}</text>';
            OrgChart.templates.myTemplate.field_1 = '<text class="field_1" style="font-size: 0px;" fill="#afafaf" x="95" y="55">{val}</text>';
            OrgChart.templates.myTemplate.field_2 = '<text class="field_1" style="font-size: 12px;" fill="#afafaf" x="95" y="65">{val}</text>';

            // OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="100" cy="150" r="40"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="60" y="110"  width="80" height="80"></image>';
            OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="50" cy="50" r="35"></circle></clipPath>';
            OrgChart.templates.myTemplate.img_0 += '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="15" y="15" width="70" height="70"></image>';

            OrgChart.templates.myTemplate.edge = '<path  stroke="#686868" stroke-width="1px" fill="none" edge-id="[{id}][{child-id}]" d="M{xa},{ya} C{xb},{yb} {xc},{yc} {xd},{yd}"/>';

            OrgChart.templates.myTemplate.plus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)"  style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#aeaeae"></line>'
                + '<line x1="15" y1="4" x2="15" y2="26" stroke-width="1" stroke="#aeaeae"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.minus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)" style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#aeaeae"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.expandCollapseSize = 36;

            var act = function (id) {
                console.log(id);
            }

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "myTemplate",
                enableSearch: true,
                enableDragDrop: true,
                linkBinding: {
                    link_field_0: "createdAt"
                },
                nodeMouseClickBehaviour: act,
                mouseScroolBehaviour: BALKANGraph.action.zoom,
                nodeBinding: {
                    field_0: "name",
                    field_1: "rank",
                    field_2: "number",
                    img_0: "img"
                },
                nodes: [
                    {
                        id: 1,
                        name: "Amber McKenzie ",
                        rank: "EMERALD EXECUTIVE",
                        number: "KR100000-L",
                        img: "//balkangraph.com/js/img/1.jpg"
                    },
                    {
                        id: 2,
                        pid: 1,
                        name: "Ava Field",
                        rank: "AMB",
                        number: "US100001-R",
                        img: "//balkangraph.com/js/img/2.jpg",
                        mobile: "0878108255"
                    },
                    {
                        id: 3,
                        pid: 1,
                        name: "Peter Stevens",
                        rank: "DIA",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 4,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "DIA",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 5,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "DIA",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/2.jpg"
                    }
                ]
            });
        }


        function theme2() {

            var nodes = [
                {id: 1, name: "Denny Curtis", title: "CEO", img: "https://balkangraph.com/js/img/2.jpg"},
                {
                    id: 2,
                    pid: 1,
                    name: "Ashley Barnett",
                    title: "IT Manager",
                    img: "https://balkangraph.com/js/img/3.jpg"
                },
                {
                    id: 3,
                    pid: 1,
                    name: "최재원",
                    title: "Marketing Manager",
                    img: "https://balkangraph.com/js/img/4.jpg"
                },
                {id: 4, pid: 2, name: "Elliot Patel", title: "Developer", img: "https://balkangraph.com/js/img/5.jpg"},
                {id: 5, pid: 2, name: "Lynn Hussain", title: "Developer", img: "https://balkangraph.com/js/img/6.jpg"},
                {id: 6, pid: 3, name: "Tanner May", title: "Marketing", img: "https://balkangraph.com/js/img/7.jpg"},
                {id: 7, pid: 3, name: "Fran Parsons", title: "Marketing", img: "https://balkangraph.com/js/img/8.jpg"}
            ];


            for (var i = 0; i < nodes.length; i++) {
                nodes[i].field_number_children = childCount(nodes[i].id);
            }

            function childCount(id) {
                let count = 0;
                for (var i = 0; i < nodes.length; i++) {
                    if (nodes[i].pid == id) {
                        count++;
                        count += childCount(nodes[i].id);
                    }
                }

                return count;
            }

            OrgChart.templates.rony.field_number_children = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "rony",
                scaleInitial: BALKANGraph.match.boundary,
                nodeBinding: {
                    field_0: "name",
                    field_1: "title",
                    img_0: "img",
                    field_number_children: "field_number_children"
                },
                nodes: nodes
            });

        }

        function theme4() {
            OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.rony);
            OrgChart.templates.myTemplate.size = [180, 250];
            OrgChart.templates.myTemplate.node = '<rect filter="url(#{randId})" x="0" y="0" height="250" width="180" fill="#ffffff" stroke-width="0" rx="5" ry="5"></rect>';

            OrgChart.templates.myTemplate.rippleRadius = 0;
            OrgChart.templates.myTemplate.rippleColor = "#0890D3";

            OrgChart.templates.myTemplate.field_0 = '<text class="field_0" style="font-size: 18px;" fill="#039BE5" x="90" y="40" text-anchor="middle">{val}</text>';
            // OrgChart.templates.myTemplate.field_2 = '<text class="field_1" style="font-size: 0px;" fill="#F57C00" x="90" y="60" text-anchor="middle">{val}</text>';
            OrgChart.templates.myTemplate.field_1 = '<text class="field_2" style="font-size: 14px;" fill="#F57C00" x="90" y="65" text-anchor="middle">{val}</text>';

            // OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="100" cy="150" r="40"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="60" y="110"  width="80" height="80"></image>';
            OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="90" cy="160" r="60"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="30" y="100" width="120" height="120"></image>';

            OrgChart.templates.myTemplate.field_2 = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

            OrgChart.templates.myTemplate.plus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)"  style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#039BE5"></line>'
                + '<line x1="15" y1="4" x2="15" y2="26" stroke-width="1" stroke="#039BE5"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.minus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)" style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#039BE5"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,155,240)" control-node-menu-id="1"><rect x="-4" y="-10" fill="#000000" fill-opacity="0" width="22" height="22"></rect><circle cx="0" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="7" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="14" cy="0" r="2" fill="#AEAEAE"></circle></g>';

            // OrgChart.templates.myTemplate.exportMenuButton = '<div style="position:absolute;right:{p}px;top:{p}px; width:40px;height:50px;cursor:pointer;" control-export-menu=""><hr style="background-color: #0890D3; height: 3px; border: none;"><hr style="background-color: #0890D3; height: 3px; border: none;"><hr style="background-color: #0890D3; height: 3px; border: none;"></div>';

            OrgChart.templates.myTemplate.pointer = '<g data-pointer="pointer" transform="matrix(0,0,0,0,100,100)"><g transform="matrix(0.3,0,0,0.3,-17,-17)"><polygon fill="#0890D3" points="53.004,173.004 53.004,66.996 0,120"/><polygon fill="#0890D3" points="186.996,66.996 186.996,173.004 240,120"/><polygon fill="#0890D3" points="66.996,53.004 173.004,53.004 120,0"/><polygon fill="#0890D3" points="120,240 173.004,186.996 66.996,186.996"/><circle fill="#0890D3" cx="120" cy="120" r="30"/></g></g>';


            OrgChart.templates.myTemplate.expandCollapseSize = 36;

            var act = function (id) {
                console.log(id);
            }

            var showTemplatePicker = function () {
                alert(123);
            }

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "myTemplate",
                enableSearch: true,
                enableDragDrop: true,
                nodeMouseClickBehaviour: act,
                mouseScroolBehaviour: BALKANGraph.action.zoom,
                nodeMenu: {},
                nodeBinding: {
                    field_0: "name",
                    field_1: "number",
                    field_2: "rank",
                    img_0: "img",
                    test: "test"
                },
                nodes: [
                    {
                        id: 1,
                        name: "Amber McKenzie ",
                        rank: "EMERALD EXECUTIVE",
                        number: "KR100000-L",
                        img: "//balkangraph.com/js/img/1.jpg",
                        test: "abc123"
                    },
                    {
                        id: 2,
                        pid: 1,
                        name: "Ava Field",
                        rank: "CROWN DIAMOND",
                        number: "US100001-R",
                        img: "//balkangraph.com/js/img/2.jpg",
                        mobile: "0878108255"
                    },
                    {
                        id: 3,
                        pid: 1,
                        name: "Peter Stevens",
                        rank: "DIAMOND",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 4,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "PRESIDENTIAL",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 5,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "IBO",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/2.jpg"
                    },
                    {
                        id: 6,
                        pid: 3,
                        name: "Peter Stevens",
                        rank: "CANCELLED",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/1.jpg"
                    }
                ]
            });
        }

        function theme5() {
            OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.rony);
            OrgChart.templates.myTemplate.size = [180, 240];
            OrgChart.templates.myTemplate.node = '<rect filter="url(#{randId})" x="0" y="0" height="240" width="180" fill="#ffffff" stroke-width="0" rx="5" ry="5"></rect>';

            OrgChart.templates.myTemplate.rippleRadius = 0;
            OrgChart.templates.myTemplate.rippleColor = "#0890D3";

            OrgChart.templates.myTemplate.field_0 = '<text class="field_0" style="font-size: 18px;" fill="#039BE5" x="90" y="160" text-anchor="middle">{val}</text>';
            OrgChart.templates.myTemplate.field_2 = '<text class="field_1" style="font-size: 12px;" fill="#F57C00" x="90" y="180" text-anchor="middle">{val}</text>';
            OrgChart.templates.myTemplate.field_1 = '<text class="field_2" style="font-size: 12px;" fill="#afafaf" x="90" y="200" text-anchor="middle">{val}</text>';

            // OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="100" cy="150" r="40"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="60" y="110"  width="80" height="80"></image>';
            OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="90" cy="80" r="50"></circle></clipPath>';
            OrgChart.templates.myTemplate.img_0 += '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="40" y="30" width="100" height="100"></image>';

            // OrgChart.templates.myTemplate.field_2 = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

            OrgChart.templates.myTemplate.plus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)"  style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#039BE5"></line>'
                + '<line x1="15" y1="4" x2="15" y2="26" stroke-width="1" stroke="#039BE5"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.minus = '<g control-expcoll-id="{id}"  transform="matrix(1,0,0,1,0,0)" style="cursor:pointer;">'
                + '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
                + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#039BE5"></line>'
                + '</g>';

            OrgChart.templates.myTemplate.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,155,12)" control-node-menu-id="1"><rect x="-4" y="-10" fill="#000000" fill-opacity="0" width="22" height="22"></rect><circle cx="0" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="7" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="14" cy="0" r="2" fill="#AEAEAE"></circle></g>';

            // OrgChart.templates.myTemplate.exportMenuButton = '<div style="position:absolute;right:{p}px;top:{p}px; width:40px;height:50px;cursor:pointer;" control-export-menu=""><hr style="background-color: #0890D3; height: 3px; border: none;"><hr style="background-color: #0890D3; height: 3px; border: none;"><hr style="background-color: #0890D3; height: 3px; border: none;"></div>';

            OrgChart.templates.myTemplate.pointer = '<g data-pointer="pointer" transform="matrix(0,0,0,0,100,100)"><g transform="matrix(0.3,0,0,0.3,-17,-17)"><polygon fill="#0890D3" points="53.004,173.004 53.004,66.996 0,120"/><polygon fill="#0890D3" points="186.996,66.996 186.996,173.004 240,120"/><polygon fill="#0890D3" points="66.996,53.004 173.004,53.004 120,0"/><polygon fill="#0890D3" points="120,240 173.004,186.996 66.996,186.996"/><circle fill="#0890D3" cx="120" cy="120" r="30"/></g></g>';


            OrgChart.templates.myTemplate.expandCollapseSize = 36;

            var act = function (id) {
                console.log(id);
            }

            var showTemplatePicker = function () {
                alert(123);
            }

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "myTemplate",
                enableSearch: true,
                enableDragDrop: true,
                nodeMouseClickBehaviour: act,
                mouseScroolBehaviour: BALKANGraph.action.zoom,
                nodeMenu: {},
                nodeBinding: {
                    field_0: "name",
                    field_1: "number",
                    field_2: "rank",
                    img_0: "img",
                    test: "test"
                },
                nodes: [
                    {
                        id: 1,
                        name: "Amber McKenzie ",
                        rank: "EMERALD EXECUTIVE",
                        number: "KR100000-L",
                        img: "//balkangraph.com/js/img/1.jpg",
                        test: "abc123"
                    },
                    {
                        id: 2,
                        pid: 1,
                        name: "Ava Field",
                        rank: "CROWN DIAMOND",
                        number: "US100001-R",
                        img: "//balkangraph.com/js/img/2.jpg",
                        mobile: "0878108255"
                    },
                    {
                        id: 3,
                        pid: 1,
                        name: "Peter Stevens",
                        rank: "DIAMOND",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 4,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "PRESIDENTIAL",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/3.jpg"
                    },
                    {
                        id: 5,
                        pid: 2,
                        name: "Peter Stevens",
                        rank: "IBO",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/2.jpg"
                    },
                    {
                        id: 6,
                        pid: 3,
                        name: "Peter Stevens",
                        rank: "CANCELLED",
                        number: "JP100002-L",
                        img: "//balkangraph.com/js/img/1.jpg"
                    }
                ]
            });
        }

        window.onload = function () {
            theme5();
        };
    </script>
@endsection
