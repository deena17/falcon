<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User</li>
      <li class="breadcrumb-item active">Deactivate</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
  <?php echo lang('Auth.deactivate_heading');?>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
    <div class="row">
        <div class="col-md-6">
            <p><?php echo sprintf(lang('Auth.deactivate_subheading'),'<strong>'. $user->username. '</strong>');?></p>
            <?php echo form_open('auth/user/'.$user->id.'/deactivate/');?>
            <p>
              <?php echo form_label(lang('Auth.deactivate_confirm_y_label'), 'confirm');?>
              <input type="radio" name="confirm" value="yes" checked="checked" />
              <?php echo form_label(lang('Auth.deactivate_confirm_n_label'), 'confirm');?>
              <input type="radio" name="confirm" value="no" />
            </p>
            <?php echo form_hidden('id', $user->id); ?> 
            <p><?php echo form_submit('submit', lang('Auth.deactivate_submit_btn'), 'class="btn btn-success"');?></p>
            <?php echo form_close();?>
        </div>
    </div>    
<?= $this->endSection(); ?>