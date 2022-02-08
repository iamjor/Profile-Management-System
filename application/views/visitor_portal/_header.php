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

  <body class="visitor-portal-container" >

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
            <div class="text-center">
                <?php
                  $img_src = base_url('assets/images/user-icon.png');
                  if( isset($profile->personal_information->photo) && !empty($profile->personal_information->photo))
                  {   
                      if( file_exists('./uploads/' .$profile->personal_information->photo))
                      {
                          $img_src = base_url('uploads/' .$profile->personal_information->photo);
                      }  
                  }
                ?>
                <a href="<?php echo site_url('visitor_portal/profile_picture_edit'); ?>"><img style="width:250px; 
                    height:auto;" class="img-circle img-thumbnail" src="<?php echo $img_src; ?>" alt="User Profile" ></a>
            </div>
            <br>
            <li><a href="<?php echo site_url('visitor_portal/personal_information'); ?>">Personal Information</a></li>
            <li><a href="<?php echo site_url('visitor_portal/programming_skills'); ?>">Programming Skills</a></li>
          </ul>
        </div>>
        