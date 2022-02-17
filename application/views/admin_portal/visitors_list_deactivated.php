<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  
  <h1 class="page-header">Visitors Account (Deactivated)</h1>
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
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Oliver Diaz Reyes</td>
              <td>revilO</td>
              <td class="text-right">
                <a href="#" onclick="return confirm('Are you sure you want to reactivate this account?')" class="btn btn-xs btn-success">Reactivate</a></td>
            </tr>
            <tr>
              <td>Oliver1 Diaz Reyes</td>
              <td>revilO</td>
              <td class="text-right">
                <a href="#" onclick="return confirm('Are you sure you want to reactivate this account?')" class="btn btn-xs btn-success">Reactivate</a></td>
            </tr>
            <tr>
              <td>Oliver2 Diaz Reyes</td>
              <td>revilO</td>
              <td class="text-right">
                <a href="#" onclick="return confirm('Are you sure you want to reactivate this account?')" class="btn btn-xs btn-success">Reactivate</a></td>
            </tr>
          </tbody
      </table>
    </div>
  </div>
</div>