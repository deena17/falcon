<html>
<body>
	<h4><?=sprintf(lang('IonAuth.emailForgotPassword_heading'), $identity)?></h4>
	<p>Hi, You're receiving this email because you requested a password reset for Teachers Recruitment Board Webportal at <?= base_url(); ?>.</p>
	<p>Please go to the following page and choose a new password:	</p>
	<p><a href="<?php echo base_url().'/auth/reset_password/'.$forgottenPasswordCode; ?>"></a><?php echo base_url().'/auth/reset_password/'.$forgottenPasswordCode; ?></p>
	<p>If clicking the link above doesn't work, please copy and paste the URL in a new browser window instead.<p>
	<p></p>
	<p><?=sprintf(lang('IonAuth.emailForgotPassword_subheading'), anchor('auth/reset_password/' . $forgottenPasswordCode, lang('IonAuth.emailForgotPassword_link')))?></p>
	<br>
	<br>
	Regards,<br>
	Developer Team,	
</body>
</html>
