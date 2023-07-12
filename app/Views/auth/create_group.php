<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">Group</li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card card-outline card-primary">
      <div class="card-header">
            <h5 class="card-title"><strong>Create Group</strong></h5>  
      </div>
      <div class="card-body">
            <div class="row">
                  <div class="col-md-6">
                        <div id="infoMessage"><?php echo $message;?></div>
                        <p><?php echo lang('Auth.create_group_subheading');?></p>
                        <?php echo form_open("auth/group/create");?>
                        <div class="mb-3">
                              <?php echo form_label(lang('Auth.create_group_name_label'), 'group_name');?> <br />
                              <?php echo form_input($group_name, '', 'class="form-control"');?>
                        </div>
                        <div class="mb-3">
                              <?php echo form_label(lang('Auth.create_group_desc_label'), 'description');?> <br />
                              <?php echo form_input($description, '', 'class="form-control"');?>                              
                        </div>
                        <div class="mb-3">
                              <p><?php echo form_submit('submit', lang('Auth.create_group_submit_btn'), 'class="btn btn-success"');?></p>
                        </div>
                        <?php echo form_close();?>
                  </div>
            </div> 
      </div>
</div>
<?= $this->endSection(); ?>