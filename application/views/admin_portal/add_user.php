<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">Add New User</h1>

    <div class="row">
    <div class="col-xs-12">  
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

        <?php echo form_open_multipart('admin_portal/add_user', 
                    array('onsubmit'=>'return confirm(\'Are you sure you want to save this data?\')')); ?>

        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" 
                    value="<?php echo set_value('fname'); ?>">
              </div>
              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="mname" 
                    value="<?php echo set_value('mname'); ?>">
              </div>
              <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="lname" 
                          value="<?php echo set_value('lname'); ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Suffix Name</label>
                      <input type="text" class="form-control" name="xname" 
                          value="<?php echo set_value('xname'); ?>">
                    </div>
                  </div>
                </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" 
                          value="<?php echo set_value('username'); ?>">
                </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" 
                          value="<?php echo set_value('password'); ?>">
                </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_password" 
                          value="<?php echo set_value('confirm_password'); ?>">
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <select name="role" class="form-control">
                        <option value="<?php echo USER_ROLE_ADMIN; ?>">Administrator</option>
                        <option value="<?php echo USER_ROLE_MANAGER; ?>">Manager</option>
                      </select>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
                      <a class="btn btn-default btn-lg" href="<?php echo site_url('admin_portal/users_list'); ?>">Cancel</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>