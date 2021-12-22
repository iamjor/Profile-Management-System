<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Personal Information</h1>

  <div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered table-striped">
          <tbody>
              <tr><th style="width: 150px;"><span style="font-size: 25px;">Name:</span></th>
                  <td> 
                  <span style="font-size: 25px;"><?php echo create_fullname($profile->fname, $profile->mname, $profile->lname, $profile->xname); ?></h3>
                  </td>
              </tr> 


              <tr><th>Date of Birth:</th><td> <?php echo $profile->personal_information->dob; ?></td></tr>
              <tr><th>Place of Birth:</th><td> <?php echo $profile->personal_information->pob; ?></td></tr>
              <tr><th>Gender:</th><td> <?php echo $profile->personal_information->gender; ?></td></tr>
              <tr><th>Civil Status:</th><td> <?php echo $profile->personal_information->cstatus; ?></td></tr>
              <tr><th>Email:</th><td> <?php echo $profile->personal_information->email; ?></td></tr>
              <tr><th>Contact No.:</th><td> <?php echo $profile->personal_information->contact_no; ?></td></tr>
          </tbody
      </table>
    </div>
  </div>
</div>