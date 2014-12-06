<!doctype html>
<html class="no-js" lang="">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <!-- /meta -->

    <title>Sublime - Web Application Admin Dashboard</title>

    <!-- page level plugin styles -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- /page level plugin styles -->

    <!-- core styles -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- /core styles -->

    <!-- template styles -->
    <link rel="stylesheet" href="css/skins/palette.css" id="skin">
    <link rel="stylesheet" href="css/fonts/font.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- template styles -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- load modernizer -->
    <script src="plugins/modernizr.js"></script>
</head>

<!-- body -->

<body>

    <div class="app">
        <!-- top header -->
        <header class="header header-fixed navbar">

            <div class="brand">
                <!-- toggle offscreen menu -->
                <a href="javascript:;" class="ti-menu off-left visible-xs" data-toggle="offscreen" data-move="ltr"></a>
                <!-- /toggle offscreen menu -->

                <!-- logo -->
                <a href="index.html" class="navbar-brand">
                    <img src="img/logo.png" alt="">
                    <span class="heading-font">
                        Sublime
                    </span>
                </a>
                <!-- /logo -->
            </div>

            <ul class="nav navbar-nav">
                <li class="hidden-xs">
                    <!-- toggle small menu -->
                    <a href="javascript:;" class="toggle-sidebar">
                        <i class="ti-menu"></i>
                    </a>
                    <!-- /toggle small menu -->
                </li>
                <li class="header-search">
                    <!-- toggle search -->
                    <a href="javascript:;" class="toggle-search">
                        <i class="ti-search"></i>
                    </a>
                    <!-- /toggle search -->
                    <div class="search-container">
                        <form role="search">
                            <input type="text" class="form-control search" placeholder="type and press enter">
                        </form>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown hidden-xs">
                    <a href="javascript:;" data-toggle="dropdown">
                        <i class="ti-more-alt"></i>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                        <li class="dropdown-header">Quick Links</li>
                        <li>
                            <a href="javascript:;">Start New Campaign</a>
                        </li>
                        <li>
                            <a href="javascript:;">Review Campaigns</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;">Settings</a>
                        </li>
                        <li>
                            <a href="javascript:;">Wish List</a>
                        </li>
                        <li>
                            <a href="javascript:;">Purchases History</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;">Activity Log</a>
                        </li>
                        <li>
                            <a href="javascript:;">Settings</a>
                        </li>
                        <li>
                            <a href="javascript:;">System Reports</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;">Help</a>
                        </li>
                        <li>
                            <a href="javascript:;">Report a Problem</a>
                        </li>
                    </ul>
                </li>

                <li class="notifications dropdown">
                    <a href="javascript:;" data-toggle="dropdown">
                        <i class="ti-bell"></i>
                        <div class="badge badge-top bg-danger animated flash">
                            <span>3</span>
                        </div>
                    </a>
                    <div class="dropdown-menu animated fadeInLeft">
                        <div class="panel panel-default no-m">
                            <div class="panel-heading small"><b>Notifications</b>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mt5 mr15">
                                            <img src="img/faceless.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                        <div class="m-body">
                                            <div class="">
                                                <small><b>CRYSTAL BROWN</b></small>
                                                <span class="label label-danger pull-right">ASSIGN AGENT</span>
                                            </div>
                                            <span>Opened a support query</span>
                                            <span class="time small">2 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <div class="pull-left mt5 mr15">
                                            <div class="circle-icon bg-danger">
                                                <i class="ti-download"></i>
                                            </div>
                                        </div>
                                        <div class="m-body">
                                            <span>Upload Progress</span>
                                            <div class="progress progress-xs mt5 mb5">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                </div>
                                            </div>
                                            <span class="time small">Submited 23 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mt5 mr15">
                                            <img src="img/faceless.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                        <div class="m-body">
                                            <em>Status Update:</em>
                                            <span>All servers now online</span>
                                            <span class="time small">5 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="panel-footer">
                                <a href="javascript:;">See all notifications</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="off-right">
                    <a href="javascript:;" data-toggle="dropdown">
                        <img src="img/faceless.jpg" class="header-avatar img-circle" alt="user" title="user">
                        <span class="hidden-xs ml10">Gerald Morris</span>
                        <i class="ti-angle-down ti-caret hidden-xs"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <a href="javascript:;">Settings</a>
                        </li>
                        <li>
                            <a href="javascript:;">Upgrade</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="badge bg-danger pull-right">3</div>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">Help</a>
                        </li>
                        <li>
                            <a href="signin.html">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- /top header -->

        <section class="layout">
            <!-- sidebar menu -->
            <aside class="sidebar offscreen-left">
                <!-- main navigation -->
                <nav class="main-navigation" data-height="auto" data-size="6px" data-distance="0" data-rail-visible="true" data-wheel-step="10">
                    <p class="nav-title">MENU</p>
                    <ul class="nav">
                        <!-- dashboard -->
                        <li>
                            <a href="index.html">
                                <i class="ti-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- /dashboard -->

                        <!-- ui -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-layout-media-overlay-alt-2"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="buttons.html">
                                        <span>Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="general.html">
                                        <span>General Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="typography.html">
                                        <span>Typography</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tabs_accordion.html">
                                        <span>Tabs &amp; Accordions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="icons.html">
                                        <span>Fontawesome</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="themify_icons.html">
                                        <span>Themify Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <span>Grid Layout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="widgets.html">
                                        <span>Widgets</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /ui -->

                        <!-- Components -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-support"></i>
                                <span>Components</span> 
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="calendar.html">
                                        <span>Calendar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="gallery.html">
                                        <span>Gallery</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="sortable.html">
                                        <span>Sortable &amp; Nestable Lists</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="chart.html">
                                        <span>Charts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="progress_slider.html">
                                        <span>Progress bars &amp; Sliders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tree.html">
                                        <span>Tree View</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="notifications.html">
                                        <span>Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="animated.html">
                                        <span>Animated Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tour.html">
                                        <span>Tour</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /components -->

                        <!-- forms -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-folder"></i>
                                <span>Forms</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="forms.html">
                                        <span>Forms Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_custom.html">
                                        <span>Customized Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_validation.html">
                                        <span>Form Validation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_wizard.html">
                                        <span>Form Wizards</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_wysiwyg.html">
                                        <span>WYSIWYG/Markdown Editors</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_inline.html">
                                        <span>Content Editable</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_dropzone.html">
                                        <span>Dropzone</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="xeditable.html">
                                        <span>X-Editable</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="form_masks.html">
                                        <span>Input Masks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_pickers.html">
                                        <span>Form Pickers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="form_crop.html">
                                        <span>Image Crop</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /forms -->

                        <!-- tables -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-window"></i>
                                <span>Tables</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="table_basic.html">
                                        <span>Basic Tables</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="table_responsive.html">
                                        <span>Resonsive Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="datatable.html">
                                        <span>Data Tables</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="table_editable.html">
                                        <span>Editable Table</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /tables -->

                        <!-- maps -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-map"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="google_maps.html">
                                        <span>Google Maps</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="vector.html">
                                        <span>Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /maps -->
                    </ul>
                    
                    <p class="nav-title">MORE</p>
                    <ul class="nav">
                        <!-- pages -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-layers"></i>
                                <span>Ready Pages</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="mail.html">
                                        <span>Mailbox</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="mail_view.html">
                                        <span>Mail View</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="compose.html">
                                        <span>Compose</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.html">
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="invoice.html">
                                        <span>Invoice</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="signin.html">
                                        <span>Signin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="signup.html">
                                        <span>Signup</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forgot.html">
                                        <span>Forgot Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="lock.html">
                                        <span>Lock Screen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="404.html">
                                        <span>404 Page</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="500.html">
                                        <span>500 Page</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="changelog.html">
                                        <span class="pull-right small label label-danger">Updated</span>
                                        <span>Change Log</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="timeline.html">
                                        <span>Timeline</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="catalog.html">
                                        <span>Catalog</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <span>Chat</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- /pages -->

                        <!-- layouts -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-layout"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="small_menu.html">
                                        <span>Small Menu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="right_menu.html">
                                        <span>Right Side Menu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="push_sidebar.html">
                                        <span>Chat Sidebar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="language_bar.html">
                                        <span>Language Switcher</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="footer_layout.html">
                                        <span>Layout With Footer</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="horizontal_menu.html">
                                        <span>Horizontal Menu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="boxed.html">
                                        <span>Boxed Layout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="horizontal_menu_boxed.html">
                                        <span>Horizontal Boxed</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="fixed_scroll.html">
                                        <span>Fixed Header &amp; Scrollable Layout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="blank.html">
                                        <span>Blank Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /layouts -->

                        <!-- multi level menu -->
                        <li>
                            <a href="javascript:;">
                                <i class="toggle-accordion"></i>
                                <i class="ti-menu-alt"></i>
                                <span>Multi Level Menu</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="toggle-accordion"></i>
                                        <span>Menu Link 1</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 1.1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 1.2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 1.3</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="toggle-accordion"></i>
                                        <span>Menu Link 2</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 2.1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 2.2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Menu Link 2.3</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Menu Link 3</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /multi level menu -->
                    </ul>
                    <p class="nav-title">LABELS</p>
                    <ul class="nav">
                        <li>
                            <a href="javascript:;">
                                <i class="ti-control-record text-warning"></i>
                                <span>Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="ti-control-record text-success"></i>
                                <span>Apps</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="ti-control-record text-danger"></i>
                                <span>Support</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <!-- /sidebar menu -->

            <!-- main content -->
            <section class="main-content">

                <!-- content wrapper -->
                <div class="content-wrap">

                    <!-- inner content wrapper -->
                    <div class="wrapper">

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <section class="dash-tile">
                                    <div class="tile-title">ALL TIME EARNING</div>
                                    <div class="tile-stats"><b>8068</b>
                                    </div>
                                    <div class="progress progress-xs mt5 mb10">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                        Based on new sales
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <section class="dash-tile bg-danger">
                                    <div class="tile-title">
                                        <span class="pull-right">
                                            <i class="ti-arrow-circle-up mr5"></i>8%
                                        </span>
                                        <span>Realtime page clicks</span>
                                    </div>
                                    <div class="tile-stats"><b>4565</b>
                                    </div>
                                    <div class="mb20"></div>
                                    <div class="tile-chart tile-line"></div>
                                    <div class="tile-footer">
                                        800ms intervals
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <section class="dash-tile bg-success">
                                    <div class="tile-title">ALL TIME EARNING</div>
                                    <div class="tile-stats"><b>89790</b>
                                    </div>
                                    <div class="tile-bottom">
                                        <small><i class="ti-arrow-circle-up mr5"></i>4.6% Weekly <b>Change</b></small>
                                    </div>
                                    <div class="tile-footer">
                                        Based on new sales
                                    </div>
                                    <div class="tile-icon">
                                        <i class="ti-timer"></i>
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <section class="dash-tile bg-warning">
                                    <div class="tile-title title-heading text-center bg-warning">
                                        <a href="javascript:;" class="widget-refresh"><i class="ti-reload pull-right"></i></a>
                                        <a href="javascript:;"><i class="ti-menu pull-left"></i></a>
                                        <span>Open support cases</span>
                                    </div>
                                    <div class="tile-stats"><b>478</b>
                                    </div>
                                    <div class="tile-bottom">
                                        <small><i class="ti-arrow-circle-down mr5"></i>.65% Weekly <b>Change</b></small>
                                    </div>
                                    <div class="tile-footer">
                                        Based on today's tickets
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="panel no-b rounded overflow-hidden">
                                    <div class="panel-body no-p bg-primary">
                                        <div class="map clearfix" style="display: block;height: 200px;"></div>

                                        <div class="row text-center" style="padding: 40px 0;">
                                            <div class="col-xs-6 col-sm-3">
                                                <span class="h4 show count" data-from="0" data-to="5687" data-interval="50">0</span>
                                                <small class="text-uppercase">Customers</small>
                                            </div>
                                            <div class="col-xs-6 col-sm-3">
                                                <span class="h4 show count" data-from="0" data-to="78694">0</span>
                                                <small class="text-uppercase">Page Views</small>
                                            </div>
                                            <div class="col-xs-6 col-sm-3">
                                                <span class="h4 show count" data-from="0" data-to="12095">0</span>
                                                <small class="text-uppercase">Pingbacks</small>
                                            </div>
                                            <div class="col-xs-6 col-sm-3">
                                                <span class="h4 show count" data-from="0" data-to="9427" data-interval="50">0</span>
                                                <small class="text-uppercase">Bounce rate</small>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item no-b">
                                            <span class="badge bg-danger">14</span>
                                            Marshall Islands
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge bg-success">2</span>
                                            Saint Kitts and Nevis
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge bg-warning">1</span>
                                            Antigua and Barbuda
                                        </li>
                                    </ul>
                                </div>

                                <section class="widget">
                                    <div class="row equal-blocks no-m">
                                        <div class="col-xs-6 block">
                                            <div class="text-center">
                                                <i class="fa fa-twitter fa-5x text-info"></i>
                                                <h6 class="text-uppercase">Twitter feed</h6>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 block bg-primary brtr brbr p25">
                                            <div class="arrow left"></div>
                                            <div class="widget-body">
                                                <em>Just released a new wordpress theme. Check it out: <a href="http://themeforest.net/user/iamnyasha/portfolio?ref=iamnyasha">twitter.com/WGnEavg6Ok</a> — Envanto(@Envanto) #Portfolio <a href="#" class="small">July 31, 2014</a></em>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <section class="widget bg-primary">
                                            <div class="widget-body">
                                                <a href="javascript:;" class="pull-left mr15">
                                                    <img src="img/faceless.jpg" class="avatar avatar-md img-circle" alt="">
                                                </a>

                                                <div class="overflow-hidden">
                                                    <div>
                                                        <small class="pull-right">DEV</small>
                                                        <b>Gerald Morris</b>
                                                    </div>
                                                    <small class="show">San Francisco, CA</small>
                                                    <small class="show">Interactive UX Developer</small>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-sm-6">
                                        <section class="widget bordered">
                                            <div class="panel-body">
                                                <a href="javascript:;" class="pull-left mr15">
                                                    <img src="img/faceless.jpg" class="avatar avatar-md img-circle" alt="">
                                                </a>
                                                <div class="overflow-hidden">
                                                    <b>Gerald Morris</b>
                                                    <small class="show">6,387 Followers / 758 Following</small>
                                                    <div class="show"></div>
                                                    <a href="javascript:;" class="btn btn-primary btn-xs mt5">Send request</a>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">

                                <section class="widget">
                                    <div class="widget-header bg-info">
                                        <i class="ti-arrow-circle-up text-white"></i>
                                        <span class="h3">4.48</span>
                                        <span>k</span>
                                        <span class="small show text-uppercase">23% Projected Growth</span>
                                    </div>
                                    <div class="widget-body bg-info">
                                        <div class="text-center mt15 mb10">
                                            <span class="dash-line"></span>
                                        </div>
                                    </div>
                                    <footer class="widget-footer text-center">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Sales</div>
                                                <div class="h4 no-m"><b>5467</b>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Referals</div>
                                                <div class="h4 no-m"><b>6873</b>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Reversals</div>
                                                <div class="h4 no-m"><b>8</b>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                </section>

                                <section class="widget bg-danger">
                                    <div class="cover rounded" style="background-image: url(img/cover1.jpg)"></div>
                                    <div class="overlay rounded bg-danger"></div>
                                    <div class="widget-header text-center">
                                        <a href="javascript:;"><i class="ti-plus text-white pull-right"></i></a>
                                        <a href="javascript:;"><i class="ti-menu text-white pull-left"></i></a>
                                        <span>Quote</span>
                                    </div>
                                    <div class="widget-body">
                                        <blockquote class="no-p no-m">
                                            <p>This is dummy copy. It's Greek to you. Unless, of course, you're Greek, in which case, it really makes no sense. Why, you can't even read it! It is strictly for mock-ups. You may mock it up as strictly as you wish.</p>
                                            <small class="text-white">Steve Jobs, CEO Apple</small>
                                        </blockquote>
                                    </div>
                                    <footer class="widget-footer">
                                        <p class="small text-right">
                                            <a href="javascript:;" class="text-white mr10">Reply</a>
                                            <a href="javascript:;" class="text-white"><i class="ti-heart mr5"></i>Like</a>
                                        </p>
                                    </footer>
                                </section>

                                <section class="widget">
                                    <div class="cover rounded" style="background-image: url(img/cover1.jpg)"></div>
                                    <div class="overlay rounded bg-color"></div>
                                    <div class="widget-body">
                                        <div class="text-white">
                                            <br>
                                            <p>Shaw, those twelve beige hooks are joined if I patch a young, gooey mouth.
                                            </p>
                                            <div class="mb10">
                                                <a href="javascript:;" class="text-muted mr15">
                                                    <i class="ti-comment  mr5"></i>3523
                                                </a>
                                                <a href="javascript:;">
                                                    <i class="ti-heart  text-danger mr5"></i>12K
                                                </a>
                                            </div>
                                            <ul class="text-white list-style-none">
                                                <i class="fa fa-star text-danger"></i>
                                                <i class="fa fa-star text-danger"></i>
                                                <i class="fa fa-star text-danger"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </ul>

                                            <a href="javascript:;" class="show small">View Product</a>
                                        </div>
                                    </div>
                                </section>

                                <section class="panel panel-primary">
                                    <header class="panel-heading">
                                        <div class="h5">
                                            <i class="fa fa-facebook-square mr5"></i>
                                            <b>Facebook</b>
                                        </div>
                                    </header>
                                    <footer class="panel-footer text-center">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Friends</div>
                                                <div class="h4 no-m"><b>5434</b>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Photos</div>
                                                <div class="h4 no-m"><b>894</b>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="small show text-uppercase text-muted">Messages</div>
                                                <div class="h4 no-m"><b>08</b>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                </section>
                            </div>
                        </div>

                        <div class="row mb25">
                            <div class="col-xs-12 text-right">
                                <i class="ti-arrow-circle-up text-success"></i>
                                <span class="h3">4.48</span>
                                <span>k</span>
                                <span class="small show">23% Projected Growth</span>
                            </div>
                        </div>

                    </div>
                    <!-- /inner content wrapper -->

                </div>
                <!-- /content wrapper -->
                <a class="exit-offscreen"></a>
            </section>
            <!-- /main content -->
        </section>

    </div>

    <!-- core scripts -->
    <script src="plugins/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery.slimscroll.min.js"></script>
    <script src="plugins/jquery.easing.min.js"></script>
    <script src="plugins/appear/jquery.appear.js"></script>
    <script src="plugins/jquery.placeholder.js"></script>
    <script src="plugins/fastclick.js"></script>
    <!-- /core scripts -->

    <!-- page level scripts -->
    <script src="plugins/jquery.blockUI.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="plugins/jquery.sparkline.js"></script>
    <script src="plugins/flot/jquery.flot.js"></script>
    <script src="plugins/flot/jquery.flot.resize.js"></script>
    <script src="plugins/count-to/jquery.countTo.js"></script>
    <!-- /page level scripts -->

    <!-- page script -->
    <script src="js/dashboard.js"></script>
    <!-- /page script -->

    <!-- template scripts -->
    <script src="js/offscreen.js"></script>
    <script src="js/main.js"></script>
    <!-- /template scripts -->

</body>
<!-- /body -->

</html>
