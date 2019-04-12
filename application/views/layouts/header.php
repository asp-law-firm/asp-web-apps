<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Link Icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/img/icon/apple-touch-icon.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/img/icon/favicon-32x32.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/icon/favicon-16x16.png'); ?>">
  <!-- <link rel="manifest" href="/site.webmanifest"> -->
  <link rel="mask-icon" href="<?php echo base_url('assets/img/icon/safari-pinned-tab.svg'); ?>" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <title>E-Data 2 - <?php echo !isset($title) ? '' : $title; ?></title>

  <!-- Custom fonts for this template-->
  <!-- <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Jquery.ui -->
  <link href="<?php echo base_url() ?>/assets/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">

  <!-- Jquery Confirm -->
  <link href="<?php echo base_url() ?>/assets/css/jquery-confirm.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Select2 -->
  <link href="<?php echo base_url() ?>/assets/css/select2/select2.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/css/select2/select2.min.css.4.0.0.css" rel="stylesheet">

  <style>
  @-webkit-keyframes rotating {
      from{
          -webkit-transform: rotate(0deg);
      }
      to{
          -webkit-transform: rotate(360deg);
      }
  }

  .rotating {
      -webkit-animation: rotating 2s linear infinite;
  }

  /* Clearable text inputs */
  .clearable input[type=text]{
    padding-right: 24px;
    width: 100%;
    box-sizing: border-box;
  }
  .clearable__clear{
    display: none;
    position: absolute;
    right:0; top:7px;
    padding: 0 20px;
    font-style: normal;
    font-size: 1.2em;
    user-select: none;
    cursor: pointer;
  }
  .clearable input::-ms-clear {  /* Remove IE default X */
    display: none;
  }

  @media only screen and (max-device-width : 640px) {
    /* Styles */
    .f-size {
      font-size: 22px;
    }

    .f-size-sub {
      font-size: 18px;
    }

    ::placeholder {
      font-size: 12px;
    }

    .fn-mob {
      font-size: 12px;
    }
  }
</style>


</head>

<body id="page-top">
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>