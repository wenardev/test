<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Dashboard</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?= base_url('assets/backend/vendors/images/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?= base_url('assets/backend/vendors/images/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url('assets/backend/vendors/images/favicon-16x16.png'); ?>">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backend/vendors/styles/core.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backend/vendors/styles/icon-font.min.css'); ?>">
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/backend/src/plugins/datatables/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backend/vendors/styles/style.css'); ?>">

    <!-- -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <!---
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= base_url('assets/backend/vendors/images/deskapp-logo.svg'); ?>" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
-->

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url('assets/backend/vendors/images/photo1.jpg'); ?>" alt="">
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="#"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>