<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        <?php echo $meta_title ? $meta_title : 'Магазин Спортивного Питания'; ?>
    </title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta name="robots" content="<?php echo $robots; ?>">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/font-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/revslider.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/jquery.mobile-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/frontend/theme/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/libs/responsive.css" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <?php if($styles): ?>
        <?php foreach($styles as $style): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/<?php echo $style; ?>.css" >
        <?php endforeach; ?>
    <?php endif; ?>

    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/parallax.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/revslider.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/libs/jquery.mobile-menu.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/common.js"></script>
    <?php if($scripts): ?>
        <?php foreach($scripts as $script): ?>
            <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/<?php echo $script; ?>.js"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<div id="page">

