<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="inner cover">
  <h1 class="cover-heading">Registration</h1>
  
  <?php
      if( $this->session->flashdata('submit_success') )
      {
          ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('submit_success'); ?>
          </div>
          <?php
      }
      elseif($this->session->flashdata('submit_error'))
      {
          ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('submit_error'); ?>
          </div>
          <?php
      }
  ?>

  <?php
      if(!empty(validation_errors()))
      {
          ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo validation_errors(); ?>
          </div>
          <?php
      }
  ?>

  <?php echo form_open_multipart('account/registration'); ?>

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <div class="form-group">
            <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname'); ?>" placeholder="Middle Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="xname" value="<?php echo set_value('xname'); ?>" placeholder="Suffix Name (Optional)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password">
          </div>
        </div>
        <div class="panel-footer">
          <input type="submit" name="submit" value="Save" class="btn btn-warning btn-block btn-lg">
        </div>
      </div>
    </form>
  </div>