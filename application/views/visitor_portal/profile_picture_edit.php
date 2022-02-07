<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">Profile Picture - Edit</h1>

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

        <?php echo form_open_multipart('visitor_portal/profile_picture_edit',
                    array('onsubmit'=>'return confirm(\'Are you sure you want to save this data?\')')); ?>

        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">

            <div class="form-group">
              <label>Upload your profile picture</label>
              <input type="file" class="form-control" name="profile_picture" /> 
            </div>
           
                  </div>
                    <div class="panel-footer">
                      <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
                      <a class="btn btn-default btn-lg" href="<?php echo site_url('visitor_portal/personal_information'); ?>">Cancel</a>
                </div>
              </div>

            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>