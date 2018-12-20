var Genealogy = {
    root: null,
    tree: null,
    load: {
        flag: true,
        star: function () {
            this.flag = false;
        },
        end: function () {
            this.flag = true;
        },
        can: function () {
            return this.flag;
        }
    },
    init: function () {
        this.initTreeSelect();
        if (typeof OrgChart === 'function') {
            this.initOrgChart();
            if ($("#binary-tree").length) {
                this.initBinaryTree("binary-tree");
            }
            if ($("#sponsor-tree").length) {
                this.initSponsorTree("sponsor-tree");
            }
        }
    },
    initTreeSelect() {
        $("#tree-select").change(function () {
            if ($(this).val() === 'sponsor') {
                location.href = '/genealogy/sponsor';
            } else {
                location.href = '/genealogy';
            }
        });
    },
    initOrgChart: function () {
        BALKANGraph.RES.IT_IS_LONELY_HERE_LINK = '';
        BALKANGraph.SERACH_TEXT = 'Search';
        BALKANGraph.icons = {
            'member': '<svg xmlns="http://www.w3.org/2000/svg" fill="#3598dc" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>',
            'cancelled': '<svg xmlns="http://www.w3.org/2000/svg" fill="#e7505a" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'
        };
        OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.rony);
        OrgChart.templates.myTemplate.size = [180, 240];
        OrgChart.templates.myTemplate.node = '<rect filter="url(#{randId})" x="0" y="0" height="240" width="180" fill="#ffffff" stroke-width="0" rx="5" ry="5"></rect>';

        OrgChart.templates.myTemplate.rippleRadius = 0;
        OrgChart.templates.myTemplate.rippleColor = "#0890D3";

        OrgChart.templates.myTemplate.field_0 = '<clipPath id="text1"><rect x="5" y="145" width="170" height="30"/></clipPath><text class="field_0" style="font-size: 16;" fill="#039BE5" x="90" y="165" clip-path="url(#text1)" text-anchor="middle">{val}</text>';
        OrgChart.templates.myTemplate.field_1 = '<text class="field_1" style="font-size: 12px;" fill="#F57C00" x="90" y="185" text-anchor="middle">{val}</text>';
        OrgChart.templates.myTemplate.field_2 = '<text class="field_2" style="font-size: 12px;" fill="#afafaf" x="90" y="205" text-anchor="middle">{val}</text>';

        // OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="100" cy="150" r="40"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="60" y="110"  width="80" height="80"></image>';
        OrgChart.templates.myTemplate.img_0 = '<clipPath id="ulaImg"><circle cx="90" cy="80" r="50"></circle></clipPath><circle cx="90" cy="80" r="50" fill="#eeeeee"></circle>';
        OrgChart.templates.myTemplate.img_0 += '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)"  xlink:href="{val}" x="40" y="30" width="100" height="100"></image>';

        OrgChart.templates.myTemplate.plus = '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
            + '<line x1="6" y1="15" x2="24" y2="15" stroke-width="1" stroke="#039BE5"></line>'
            + '<line x1="15" y1="6" x2="15" y2="24" stroke-width="1" stroke="#039BE5"></line>';

        OrgChart.templates.myTemplate.minus = '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#039BE5" stroke-width="1"></circle>'
            + '<line x1="6" y1="15" x2="24" y2="15" stroke-width="1" stroke="#039BE5"></line>';

        // OrgChart.templates.myTemplate.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,152,4)" control-node-menu-id="1"><svg xmlns="http://www.w3.org/2000/svg" fill="#999999" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg></g>';
        // OrgChart.templates.myTemplate.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,155,12)" control-node-menu-id="1"><rect x="-4" y="-10" fill="#000000" fill-opacity="0" width="22" height="22"></rect><circle cx="0" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="7" cy="0" r="2" fill="#AEAEAE"></circle><circle cx="14" cy="0" r="2" fill="#AEAEAE"></circle></g>';

        // OrgChart.templates.myTemplate.pointer = '<g data-pointer="pointer" transform="matrix(0,0,0,0,100,100)"><g transform="matrix(0.3,0,0,0.3,-17,-17)"><polygon fill="#0890D3" points="53.004,173.004 53.004,66.996 0,120"/><polygon fill="#0890D3" points="186.996,66.996 186.996,173.004 240,120"/><polygon fill="#0890D3" points="66.996,53.004 173.004,53.004 120,0"/><polygon fill="#0890D3" points="120,240 173.004,186.996 66.996,186.996"/><circle fill="#0890D3" cx="120" cy="120" r="30"/></g></g>';
        // OrgChart.templates.myTemplate.pointer = '<clipPath id="text1"><rect x="90" y="165" width="180" height="30"/</clipPath>';


        // OrgChart.templates.myTemplate.expandCollapseSize = 36;
    },
    initTree: function (elm, nodes, plusClick) {
        this.tree = new OrgChart(document.getElementById(elm), {
            template: "myTemplate",
            deep: false,
            enableSearch: true,
            enableDragDrop: false,
            // orientation: BALKANGraph.orientation.top,
            nodeMouseClickBehaviour: Genealogy.nodeClick,
            plusMouseCLickBehiviour: plusClick,
            scaleInitial: BALKANGraph.match.height,
            showYScroll: BALKANGraph.scroll.visible,
            mouseScroolBehaviour: BALKANGraph.action.zoom,
            // nodeMenu: {},
            nodeBinding: {
                field_0: "name",
                field_1: "rank",
                field_2: "number",
                img_0: "img",
                test: "test"
            },
            tags: {
                gone: {
                    state: BALKANGraph.COLLAPSE
                },
                show: {
                    state: BALKANGraph.EXPAND
                },
                more: {
                    state: BALKANGraph.COLLAPSE
                },
            },
            nodes: nodes
        });
        $(".OrgChart").append('<svg xmlns="http://www.w3.org/2000/svg" class="center" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm-7 7H3v4c0 1.1.9 2 2 2h4v-2H5v-4zM5 5h4V3H5c-1.1 0-2 .9-2 2v4h2V5zm14-2h-4v2h4v4h2V5c0-1.1-.9-2-2-2zm0 16h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>');
        $(".OrgChart .center").click(function () {
            Genealogy.center();
        });
    },
    center: function () {
        if (this.tree && this.root) {
            Genealogy.tree.searchUI.obj.center(Genealogy.root)
        }
    },
    nodeClick: function (node) {
        UI.profile.hide();
        if (node.tags.indexOf('add') < 0) {
            Ajax.get('/a/genealogy/' + node.id, null, {
                ok: function (items) {
                    console.log(items);
                    UI.profile.show('#tree-profile');
                }
            });
        } else {
            window.open('/enrollment?rep=' + node.pid, '_blank');
        }
    },
    initBinaryTree(elm) {
        this.initTreeBox(elm);
        var plusClick = function (node, tree) {
            if (node.tags.indexOf("more") >= 0 && Genealogy.load.can()) {
                Genealogy.load.star();
                Ajax.get('/a/genealogy/binary/' + node.id, null, {
                    ok: function (items) {
                        $.each(tree.config.nodes, function (k, v) {
                            if (v.id === node.id) {
                                tree.removeNodeTag(node.id, 'more');
                                tree.addNodeTag(node.id, 'child');
                            }
                        });
                        $.each(items, function (k, v) {
                            if (node.id !== v.id) {
                                tree.addNode(v);
                            }
                        });
                        tree.expand(node.id);
                    },
                    end: function () {
                        Genealogy.load.end();
                    }
                })
            } else {
                tree.expand(node.id);
            }
        };
        Ajax.get('/a/genealogy/binary', null, {
            ok: function (items) {
                var nodes = [];
                $.each(items, function (k, v) {
                    if (!Genealogy.root) {
                        Genealogy.root = v.id;
                    }
                    nodes[nodes.length] = v;
                });
                Genealogy.initTree(elm, nodes, plusClick);
            }
        })
    },
    initSponsorTree(elm) {
        this.initTreeBox(elm);
    },
    initTreeBox(elm) {
        function initHeight() {
            var h;
            if ($(window).width() > 992) {
                h = 890 - 35 - 46 - 59;
            } else {
                h = 752 - 30 - 46 - 10;
            }

            $("#" + elm).css({
                'height': h + 'px'
            });
        }

        initHeight();
        $(window).resize(function () {
            initHeight();
        });
        UI.svgLoader("#" + elm);
    }
};

window.onload = function () {
    Genealogy.init();
};