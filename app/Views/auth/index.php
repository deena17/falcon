<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Auth</a></li>
		<li class="breadcrumb-item active">Users</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    Users
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card card-outline card-success">
    <div class="card-header">
        <h5 class="card-title"><strong>Users</strong></h5>
    </div>
    <div class="card-body p-2">
		<div id="infoMessage"><?php echo $message;?></div>
		<table class="table table-bordered table-striped">
			<tr>
				<th><?php echo lang('Auth.index_fname_th');?></th>
				<th><?php echo lang('Auth.index_lname_th');?></th>
				<th><?php echo lang('Auth.index_email_th');?></th>
				<th><?php echo lang('Auth.index_groups_th');?></th>
				<th><?php echo lang('Auth.index_status_th');?></th>
				<th><?php echo lang('Auth.index_action_th');?></th>
			</tr>
			<?php foreach ($users as $user):?>
				<tr>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
							<?php echo anchor('auth/group/'.$group->id.'/edit/', htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8'), ['class' => 'mx-1']); ?>
						<?php endforeach?>
					</td>
					<?php $active = ['class'=> 'badge bg-success']; $inactive = ['class'=> 'badge bg-danger']; ?>
					<td><?php echo ($user->active) ? anchor('auth/user/'.$user->id.'/deactivate/', lang('Auth.index_active_link'), $active) : anchor("auth/activate/". $user->id, lang('Auth.index_inactive_link'), $inactive);?></td>
					<td><?php echo anchor('auth/user/'. $user->id.'/edit/', lang('Auth.index_edit_link'), ['class' => 'btn btn-primary btn-sm px-3']) ;?></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
	<div class="card-footer">			
		<?php echo anchor('auth/user/create/', lang('Auth.index_create_user_link'), ['class'=>'btn btn-sm btn-success'])?>  
		<?php echo anchor('auth/group/create', lang('Auth.index_create_group_link'), ['class' => 'btn btn-sm btn-warning'])?>	
	</div>
</div>				
<?= $this->endSection(); ?>