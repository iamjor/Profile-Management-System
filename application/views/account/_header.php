<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile Management System</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/bootstrap/css/cover.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Profile Management System</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo site_url('account/registration'); ?>">Registration</a></li>
                  <li><a href="<?php echo site_url('account/login'); ?>">Login</a></li>
                </ul>
              </nav>
            </div>
          </div>