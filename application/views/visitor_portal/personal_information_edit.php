<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">Personal Information - Edit</h1>

    <div class="row">
    <div class="col-xs-12">  
      <?php
          if($this->session->flashdata('submit_error'))
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

        <?php echo form_open_multipart('visitor_portal/personal_information_edit', 
                    array('onsubmit'=>'return confirm(\'Are you sure you want to save this data?\')')); ?>

        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" 
                    value="<?php echo set_value('fname', $profile->fname); ?>">
              </div>
              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="mname" 
                    value="<?php echo set_value('mname', $profile->mname); ?>">
              </div>
              <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="lname" 
                          value="<?php echo set_value('lname', $profile->lname); ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Suffix Name</label>
                      <input type="text" class="form-control" name="xname" 
                          value="<?php echo set_value('xname', $profile->xname); ?>">
                    </div>
                  </div>
                </div>
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="text" class="form-control" name="dob" 
                          value="<?php echo set_value('dob', $profile->personal_information->dob); ?>">
                </div>
                    <div class="form-group">
                      <label>Place of Birth</label>
                      <input type="text" class="form-control" name="pob" 
                          value="<?php echo set_value('pob', $profile->personal_information->pob); ?>">
                </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="text" class="form-control" name="gender" 
                          value="<?php echo set_value('gender', $profile->personal_information->gender); ?>">
                </div>
                    <div class="form-group">
                      <label>Civil Status</label>
                      <input type="text" class="form-control" name="cstatus" 
                          value="<?php echo set_value('cstatus', $profile->personal_information->cstatus); ?>">
                </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" 
                          value="<?php echo set_value('email', $profile->personal_information->email); ?>">
                </div>
                    <div class="form-group">
                      <label>Contact No.</label>
                      <input type="text" class="form-control" name="contact_no" 
                          value="<?php echo set_value('contact_no', $profile->personal_information->contact_no); ?>">
                </div>
                </div>
                    <div class="panel-footer">
                      <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
                      <a class="btn btn-default btn-lg" href="<?php echo site_url('visitor_portal/personal_information'); ?>">Cancel</a>
                </div>
              </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>