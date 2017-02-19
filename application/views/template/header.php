<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/blue_logo.png'); ?>" type="image/png">

    <title><?php echo $title; ?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/fresh-bootstrap-table.css'); ?>" rel="stylesheet"/>
    <?php if ($title != 'ACP' && $title != 'Reset Password' && $title != 'Change Password' && $title != 'Registration' && $title != 'Verify Email'): ?>
      <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
      <link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css'); ?>" rel="stylesheet"/>
    <?php endif ?>
    <?php if ($title == 'ACP' || $title == 'Reset Password' || $title == 'Change Password' || $title == 'Registration' || $title == 'Verify Email'): ?>
      <link href="<?php echo base_url('assets/css/home.css'); ?>" rel="stylesheet" />
    <?php endif ?>
    <link href="<?php echo base_url('assets/css/general.css'); ?>" rel="stylesheet"/>
  </head>
  <body>