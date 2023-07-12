<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User</li>
      <li class="breadcrumb-item active">Password Change</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    Change Password
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="row">
      <div class="col-md-6">
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open('auth/change_password');?>
            <div class="mb-3">
                  <?php echo form_label(lang('Auth.change_password_old_password_label'), 'old_password');?> <br />
                  <?php echo form_input($old_password);?>
            </div>
            <div class="mb-3">
                  <label for="new_password"><?php echo sprintf(lang('Auth.change_password_new_password_label'), $minPasswordLength);?></label> <br />
                  <?php echo form_input($new_password);?>
            </div>
            <div class="mb-3">
                  <?php echo form_label(lang('Auth.change_password_new_password_confirm_label'), 'new_password_confirm');?> <br />
                  <?php echo form_input($new_password_confirm);?>
            </div>
            <div class="mb-3">
                  <?php echo form_input($user_id);?>
                  <p><?php echo form_submit('submit', lang('Auth.change_password_submit_btn'), 'class="btn btn-success"');?></p>
                  <?php echo form_close();?>
            </div>
      </div>
</div>  
<?= $this->endSection(); ?>
