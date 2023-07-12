<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User</li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    Edit User
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
      <div class="card card-outline card-primary">
            <div class="card-header">
                  <h5 class="card-title"><strong>Edit User</strong></h5>
                  <a href="<?= url_to('user.list'); ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-arrow-left mr-1"></i> Back</a>
            </div>
            <div class="card-body">
                  <div id="infoMessage"><?php echo $message;?></div>
                  <p><?php echo lang('Auth.edit_user_subheading');?></p>
                  <?php echo form_open(uri_string());?>
                  <div class="row">
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_fname_label'), 'first_name');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($first_name);?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_lname_label'), 'last_name');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($last_name);?>
                              </div>
                        </div>   
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="mobile-number">Mobile Number</label>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($mobile_number); ?>
                              </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <span class="text-danger"> *</span> <br />
                                    <?= form_input($email); ?>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                    <label for="department">Department</label>
                                    <div class="select2-purple">
                                        <select id="customer-department" class="select2" multiple="multiple"
                                            name="department[]" style="width: 100%;"
                                            data-dropdown-css-class="select2-purple" value="">
                                            <?php foreach($department as $d): ?>
                                                  <?php 
                                                        $dID = $d->id; 
                                                        $selected = null;
                                                        foreach($userDepartment as $ud):
                                                              if($dID == $ud->department){
                                                                    $selected = 'selected="selected"';
                                                                    break;
                                                              }
                                                        endforeach;      
                                                  
                                                  ?>
                                                  <option value="<?= $d->id; ?>" <?= $selected; ?>><?= $d->name; ?></option>
                                            <?php endforeach; ?>   
                                        </select>
                                    </div>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <?= form_dropdown($designation); ?>
                              </div>
                        </div>   
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="date-of-birth">Date of Birth</label>
                                    <?= form_input($date_of_birth); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="date-of-join">Date of Join</label>
                                    <?= form_input($date_of_join); ?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="street">Street Name</label>
                                    <?= form_input($street); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="city">City/Area</label>
                                    <?= form_input($area); ?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="district">District</label>
                                    <?= form_input($district); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="state">State</label>
                                    <?= form_input($state); ?>
                              </div>
                        </div>           
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <?= form_input($pincode); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="reporting-officer">Reporting Officer</label>
                                    <?= form_dropdown($reporting_officer); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label for="pincode">Username</label>
                                    <?= form_input($username); ?>
                              </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_password_label'), 'password');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($password,'','class="form-control"');?>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <?php echo form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm');?>
                                    <span class="text-danger"> *</span> <br />
                                    <?php echo form_input($password_confirm,'','class="form-control"');?>
                              </div>
                        </div>
                        <div class="col-md-12 mt-3">
                              <?php if ($ionAuth->isAdmin()): ?>
                              <h6 class="text-primary"><strong><?php echo lang('Auth.edit_user_groups_heading');?></strong></h6>
                              <?php foreach ($groups as $group):?>
                                    <label class="checkbox mr-2">
                                          <?php
                                                $gID = $group['id'];
                                                $checked = null;
                                                $item = null;
                                                foreach($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                      $checked = ' checked="checked"';
                                                break;
                                                }
                                                }
                                          ?>
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                          <?php echo htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8');?>
                                    </label>
                              <?php endforeach?>
                              <?php endif ?>
                              <?php echo form_hidden('id', $user->id);?>
                        </div>
                        <div class="col-md-12 mt-4">
                              <label>User Permissions</label>
                              <select class="duallistbox" multiple="multiple" name="permissions">
                                    <?php foreach($permissions as $p): ?>
                                          <?php 
                                                $pID = $p->id; 
                                                $selected = null;
                                                foreach($userPermissions as $up):
                                                      if($pID == $up->permission_id){
                                                            $selected = 'selected="selected"';
                                                            break;
                                                      }
                                                endforeach;      
                                          
                                          ?>
                                          <option value="<?= $p->id; ?>" <?= $selected; ?>><?= $p->name; ?></option>
                                    <?php endforeach; ?>      
                              </select>
                        </div>
                        <div class="col-md-6 mt-4">
                              <?php echo form_submit('submit', lang('Auth.edit_user_submit_btn'), 'class="btn btn-success"');?>
                              <?php echo form_close();?>
                        </div>
                  </div>
            </div>
      </div>         
<?= $this->endSection(); ?>


      

      
