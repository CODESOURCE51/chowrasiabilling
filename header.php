<?php session_start(); include 'config.php'; ?>
<?php include 'connection.php';
//$ip = $_SERVER['REMOTE_ADDR'];
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//echo $details->city;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Chaurasia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projukti">

    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!--  <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" /> -->
    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 <script>
  $(function() {
    $( "#inputSuccess11" ).datepicker();
  });
  $(function() {
    $( "#inputSuccess16" ).datepicker();
  });
  $(function() {
    $( "#inputSuccess12" ).datepicker();
  });
  </script>
   <script>
 // $(function() {
//    $( "#inputSuccess12" ).datepicker();
//   var dtype = 'DD, d MM, yy';
//      $( "#inputSuccess12" ).datepicker( "option", "dateFormat", dtype );
//   
//  });
  </script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> 
                <span>Chaurasia</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#">Profile</a></li>
                    <li class="divider"></li> -->
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

           

        </div>
    </div>
    <!-- topbar ends -->
<?php } ?>
<div class="ch-container">
    <div class="row">
        <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="dashboard.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                       <!-- <li><a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
                        </li>-->
                        <?php if($_SESSION['user_type'] == 'Super') {?>
                         <li><a class="ajax-link" href="admin_create.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Create Admin</span></a></li>
                                    <?php } ?>
                                     <li><a class="ajax-link" href="add_customer.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Add Customer</span></a></li>
                        <li><a class="ajax-link" href="admin_details.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Admin Info</span></a></li>
                        <li><a class="ajax-link" href="service_tax.php">
                        <i class="glyphicon glyphicon-edit"></i><span> Set Service Tax</span></a></li>
                        <li><a class="ajax-link" href="handling_charges.php">
                        <i class="glyphicon glyphicon-edit"></i><span> Set Handling Charge</span></a></li>
                        <li><a class="ajax-link" href="bank_details.php">
                        <i class="glyphicon glyphicon-edit"></i><span> Bank Details</span></a></li>
                         <li><a class="ajax-link" href="purchase.php">
                        <i class="glyphicon glyphicon-edit"></i><span> Purchase Entry</span></a></li>
                         <li><a class="ajax-link" href="view_purchase_details.php">
                        <i class="glyphicon glyphicon-edit"></i><span> View Purchase Details</span></a></li>
                        <li><a class="ajax-link" href="view_purchase_details_old.php">
                        <i class="glyphicon glyphicon-edit"></i><span> View Old Purchase Details</span></a></li>
                        <li><a class="ajax-link" href="view_refund_details.php">
                        <i class="glyphicon glyphicon-edit"></i><span> View Credit Note</span></a></li>
                       <?php if($_SESSION['user_type'] == 'Super') {?>
                        <li><a class="ajax-link" href="other_charges.php">
                        <i class="glyphicon glyphicon-edit"></i><span>Charges</span></a></li>
                        <li><a class="ajax-link" href="purchase_sales_report.php">
                        <i class="glyphicon glyphicon-edit"></i><span> Purchase / Sales Report</span></a></li>
                        <li><a class="ajax-link" href="gst_report.php">
                        <i class="glyphicon glyphicon-edit"></i><span> GST Report</span></a></li>
                        <?php } ?>
                      <!--  <li><a class="ajax-link" href="chart.php"><i class="glyphicon glyphicon-list-alt"></i><span> Charts</span></a>
                        </li>
                        <li><a class="ajax-link" href="typography.php"><i class="glyphicon glyphicon-font"></i><span> Typography</span></a>
                        </li>-->
                        <!--<li><a class="ajax-link" href="gallery.php"><i class="glyphicon glyphicon-picture"></i><span> Gallery</span></a>
                        </li>
                        <li class="nav-header hidden-md">Sample Section</li>
                        <li><a class="ajax-link" href="table.php"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="calendar.php"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>-->
                       <!-- <li><a class="ajax-link" href="grid.php"><i
                                    class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="tour.php"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                        <li><a class="ajax-link" href="icon.php"><i
                                    class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="error.php"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="login.php"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li>-->
                    </ul>
                   <!--  <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label> -->
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php } ?>
