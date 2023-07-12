<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User</li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<?php $validation = \Config\Services::validation(); ?>
      <div class="card card-outline card-primary">
            <div class="card-header">
                  <h5 class="card-title"><strong>Create User</strong></h5>
                  <a href="<?= url_to('user.list'); ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-arrow-left mr-1"></i> Back</a>
            </div>
            <div class="card-body">
                  <p><?php echo lang('Auth.create_user_subheading');?></p>
                  <?php echo form_open('auth/user/create');?>
                  <div class="row">
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_fname_label'), 'first_name');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($first_name);?>
                                    <?php if ($validation->getError('first_name')) : ?>
                                          <div class=" invalid-feedback">
                                          <?= $validation->getError('first_name') ?>
                                          </div>
                                    <?php endif; ?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_lname_label'), 'last_name');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($last_name);?>
                                    <?php if ($validation->getError('last_name')) : ?>
                                          <div class=" invalid-feedback">
                                          <?= $validation->getError('last_name') ?>
                                          </div>
                                    <?php endif; ?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="mobile-number">Mobile Number</label>
                                    <span class="text-danger"> *</span> <br />
                                    <?= form_input($mobile_number); ?>
                                    <?php if ($validation->getError('mobile_number')) : ?>
                                          <div class=" invalid-feedback">
                                          <?= $validation->getError('mobile_number') ?>
                                          </div>
                                    <?php endif; ?>
                              </div>
                        </div>
                        <?php
                              if ($identity_column !== 'email') { ?>
                        <div class="col-md-6">
                              <div class="form-group">
                              <?php
                                    echo '<p>';
                                    echo form_label(lang('Auth.create_user_identity_label'), 'identity');
                                    echo '<br />';
                                    echo \Config\Services::validation()->getError('identity');
                                    echo form_input($identity, '', 'class="form-control"');
                                    echo '</p>';
                                    }
                              ?>
                        <?php if ($identity_column !== 'email') { echo '</div></div>';  }?>
                        <div class="col-md-6">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_email_label'), 'email');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($email, '', 'class="form-control"');?>
                              </div>
                              <?php if ($validation->getError('email')) : ?>
                                          <div class=" invalid-feedback">
                                          <?= $validation->getError('email') ?>
                                          </div>
                                    <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                    <label for="department">Department</label>
                                    <span class="text-danger"> *</span> <br />
                                    <div class="select2-purple">
                                          <?= form_dropdown($department); ?>
                                    </div>
                                    <?php if ($validation->getError('department')) : ?>
                                          <div class=" invalid-feedback">
                                          <?= $validation->getError('department') ?>
                                          </div>
                                    <?php endif; ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <span class="text-danger"> *</span> <br />
                                    <?= form_dropdown($designation); ?>
                              </div>
                              <?php if ($validation->getError('designation')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('designation') ?>
                                    </div>
                              <?php endif; ?>
                        </div>   
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="date-of-birth">Date of Birth</label>
                                    <?= form_input($date_of_birth); ?>
                              </div>
                              <?php if ($validation->getError('date_of_birth')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('date_of_birth') ?>
                                    </div>
                              <?php endif; ?>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="date-of-join">Date of Join</label>
                                    <?= form_input($date_of_join); ?>
                              </div>
                              <?php if ($validation->getError('date_of_join')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('date_of_join') ?>
                                    </div>
                              <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="street">Street Name</label>
                                    <?= form_input($street); ?>
                                    <?php if ($validation->getError('street')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('street') ?>
                                    </div>
                              <?php endif; ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="city">City/Area</label>
                                    <?= form_input($area); ?>
                                    <?php if ($validation->getError('city')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('city') ?>
                                    </div>
                              <?php endif; ?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="district">District</label>
                                    <?= form_input($district); ?>
                                    <?php if ($validation->getError('district')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('district') ?>
                                    </div>
                              <?php endif; ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="state">State</label>
                                    <?= form_input($state); ?>
                                    <?php if ($validation->getError('state')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('state') ?>
                                    </div>
                              <?php endif; ?>
                              </div>
                        </div>           
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <?= form_input($pincode); ?>
                                    <?php if ($validation->getError('pincode')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('pincode') ?>
                                    </div>
                              <?php endif; ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="reporting-officer">Reporting Officer</label>
                                    <span class="text-danger"> *</span> <br />
                                    <select name="reporting_officer" id="reporting-officer" class="form-control">
                                          <option value="0">Select Reporting Officer</option>
                                          <?php foreach($users as $u): ?>
                                          <option value="<?= $u->id; ?>"><?= $u->first_name .' '.$u->last_name; ?></option>  
                                          <?php endforeach; ?>    
                                    </select>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="username">Username</label>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($username);?>
                              </div>
                              <?php if ($validation->getError('username')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                    </div>
                              <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_password_label'), 'password');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($password);?>
                              </div>
                              <?php if ($validation->getError('password')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                    </div>
                              <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($password_confirm);?>
                              </div>
                              <?php if ($validation->getError('confirm_password')) : ?>
                                    <div class=" invalid-feedback">
                                    <?= $validation->getError('confirm_password') ?>
                                    </div>
                              <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                              <h6 class="text-primary"><strong>User Groups</strong></h6>
                              <?php foreach ($groups as $group):?>
                                    <label class="checkbox mr-2 px-1">
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>">
                                          <?php echo htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8');?>
                                    </label>
                              <?php endforeach?>
                        </div>                  
                  </div>      
                  <div class="mt-4">
                        <label>User Permissions</label>
                        <select class="duallistbox" multiple="multiple" name="permissions[]">
                              <?php foreach($permissions as $p): ?>
                                    <option value="<?= $p->id; ?>"><?= $p->name; ?></option>
                              <?php endforeach; ?>      
                        </select>
                  </div>
            </div>
            <div class="card-footer">
                  <?php echo form_submit('submit', lang('Auth.create_user_submit_btn'), 'class="btn btn-success"');?>
                  <?php echo form_close();?>
            </div>
      </div>
<?= $this->endSection() ?>
