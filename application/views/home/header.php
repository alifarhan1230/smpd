<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Sistem Manajemen Pajak Daerah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->load->view('template/styles.php'); ?>

        <style>
            .page-content-wrapper .page-content {
                margin-left:0px !important;
            }
        </style>
		<!-- for electron.io shakes -->
		<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="logo-cam">
            <img src="<?php echo base_url().'assets/image/logo-mpd.png'; ?>" width="320px">
        </div>
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <img src="<?php echo base_url().'assets/image/logo-2.png'; ?>" height="50" width="50">
                </div>
                <!-- END LOGO -->

                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a class="home" href="<?php echo base_url().'home'; ?>">
                                <i class="fa fa-home bigger-120"></i> Home
                            </a>
                        </li>

                        <li class="dropdown">
                        <a href="<?php echo base_url('panel?p_application_id=999');?>" class="inbox">
                            <i class="fa fa-envelope"></i> Inbox
                        </a>
                        </li>
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">


                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> Welcome, <?php echo $this->session->userdata('full_name'); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li id="my-profile">
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo base_url().'auth/logout'; ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- START PAGE CONTENT -->
                <div class="page-content" id="main-content">