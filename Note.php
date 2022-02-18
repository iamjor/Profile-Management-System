          
          
          
          
          // To show the fullname and role beside logout
          <li><a href="#"><?php echo create_fullname($profile->fname, $profile->mname, $profile->lname, $profile->xname); ?> &nbsp; <span class="badge"><?php echo ucfirst($profile->role); ?></span></a></li>

          <?php
            
            // To hide the menu if not admin
            if( $profile->role == USER_ROLE_ADMIN )
            {
               ?>
              <li class="active"><a href="#"><strong>Users</strong></a></li>
              <li><a href="<?php echo site_url('admin_portal/users_list'); ?>">Active Users</a></li>
              <li><a href="<?php echo site_url('admin_portal/users_list_deactivated'); ?>">Deactivated Users</a></li>
              <li><a href="<?php echo site_url('admin_portal/add_user'); ?>">Add New User</a></li>
              <?php
            }
          ?>

          // To restrict menu if not admin from logout session
          if( $this->data['profile']->role != USER_ROLE_ADMIN )
              {
                redirect('admin_portal/visitors_list');
              }