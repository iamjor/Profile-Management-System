<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<a class="pull-right btn-success btn btn-lg" style="border-radius: 30px;" href="<?php echo site_url('visitor_portal/programming_skills_edit'); ?>">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

<h1 class="page-header">Programming Skills</h1>

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
        ?>

        <table class="table table-bordered table-striped">
          <tbody>
              <tr><th style="width: 250px;">Programming Languages:</th><td> <?php echo $skills->prog_languages; ?></td></tr>
              <tr><th>Backend Frameworks:</th><td> <?php echo $skills->backend_frameworks; ?></td></tr>
              <tr><th>Frontend Frameworks:</th><td> <?php echo $skills->frontend_frameworks; ?></td></tr>
          </tbody
        </table>
    </div>
  </div>
</div>