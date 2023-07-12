<?php helper('html'); ?>
<!doctype html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reset Password</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<style>
				body{
					background-color:#ebedef;
				}
				.logo{
					width: 100px;
					height: 100px;
				}
		</style>
	</head>
    <body>
		<div class="container my-3">
			<div class="d-flex justify-content-center">
				<?= img('public/images/logo.png', false,['class' =>'logo']); ?>
				<div style="text-align:center; padding-left:15px;padding-top:10px">
				<h3>Teachers Recruitment Board</h3>
				<h4>Objection Tracking System</h4>
				</div>
			</div>
		</div> 
		<div class="row mt-5">
			<div class="col-md-6 offset-3">
				<div id="infoMessage"><?php echo $message;?></div>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">
							<?php echo lang('Auth.reset_password_heading');?>
						</h5>
					</div>
					<div class="card-body">
						<?php echo form_open('auth/reset_password/' . $code);?>
						<div class="mb-3">
							<label for="new_password"><?php echo sprintf(lang('Auth.reset_password_new_password_label'), $minPasswordLength);?></label> <br />
							<?php echo form_input($new_password);?>
						</div>
						<div class="mb-3">
							<?php echo form_label(lang('Auth.reset_password_new_password_confirm_label'), 'new_password_confirm');?> <br />
							<?php echo form_input($new_password_confirm);?>
						</div>
						<?php echo form_input($user_id);?>
						<div class="mb-3">
							<p><?php echo form_submit('submit', lang('Auth.reset_password_submit_btn'),'class="btn btn-success"');?></p>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>	
