<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile Management System</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/bootstrap/css/dashboard.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  </head>

  <body class="admin-portal-container" >

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Profile Management System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Jomar<span class="badge">Admin</span></a></li>
            <li><a href="<?php echo site_url('account/logout'); ?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">

            <li class="active"><a href="#"><strong>Users</strong></a></li>
            <li><a href="<?php echo site_url('admin_portal/users_list'); ?>">Active Users</a></li>
            <li><a href="<?php echo site_url('admin_portal/users_list_deactivated'); ?>">Deactivated Users</a></li>
            <li><a href="<?php echo site_url('admin_portal/add_user'); ?>">Add New User</a></li>

            <li class="active"><a href="#"><strong>Visitors Account</strong></a></li>
            <li><a href="<?php echo site_url('admin_portal/visitors_list'); ?>">Active Accounts</a></li>
            <li><a href="<?php echo site_url('admin_portal/visitors_list_deactivated'); ?>">Deactivated Accounts</a></li>

          </ul>
        </div>>
        