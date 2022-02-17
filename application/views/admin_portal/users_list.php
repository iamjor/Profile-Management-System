<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  
  <h1 class="page-header">Users List</h1>
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
          <thead>
            <tr>
              <th>Name</th>
              <th>Username</th>
              <th>Role</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if( isset($result) && !empty($result))
              {
                  foreach ($result as $key => $row) 
                  {   
                      $id = $row->user_id;
                      ?>
                      <tr>
                          <td><?php echo create_fullname($row->fname, $row->mname, $row->lname, $row->xname); ?></td>
                          <td><?php echo $row->username; ?></td>
                          <td><?php echo ucfirst($row->role); ?></td>
                          <td class="text-right">
                              <a href="<?php echo site_url('admin_portal/edit_user/'.$id); ?>" class="btn btn-xs btn-primary">Edit</a>
                              <a href="<?php echo site_url('admin_portal/deactivate_user/'.$id); ?>" onclick="return confirm('Are you sure you want to deactivate this user?')" class="btn btn-xs btn-danger">Deactivate</a>
                          </td>
                      </tr>
                      <?php
                  }
              }
            ?>
          </tbody
      </table>
    </div>
  </div>
</div>