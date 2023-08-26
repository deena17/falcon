<?= $this->extend('layout/auth'); ?>
<?= $this->section('content'); ?>
<?php helper('html'); ?>
<style>
    body {
        /* background-image:url("<?= base_url(); ?>/public/images/embroidery-banner2.jpg") */
        background: #1f618d;
    }

    .login-container .row {
        justify-content: center;
        align-items: center;
    }

    .login-container .card-header {
        display: flex;
        padding: 25px;
        justify-content: center;
        align-items: center;
    }

    .login-box-msg {
        font-size: 20px;
        font-weight: bold;
    }

    .asteriskField {
        margin-left: 5px;
        color: red;
    }

    .btn-primary {
        padding: 10px;
        font-size: 20px;
        border-radius: 40px;
        background: #024796 !important;
        border-color: #024796;
    }

    #help-link {
        text-align: center;
    }

    #help-link p {
        font-size: 18px;
        line-height: 1rem;
    }

    #help-link a {
        color: #024796;
    }

    #id_username,
    #id_password {
        padding: 20px !important;
        border-color: rgb(185, 184, 184);
    }
</style>
    <div class="container login-container">
        <div class="row mt-5">
            <div class="col-md-5">
                <?php if($message): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <?= img('public/images/gfi.jpg');?>
                        <!-- <img src="https://crm.goldenfalconinternational.com/static/img/gfi.jpg" /> -->
                    </div>
                    <div class="card-body login-card-body">
                        <p><?php echo lang('Auth.login_subheading'); ?></p>
                        <?php $attribute = ['class' => 'form-lable']; ?>
                        <?php echo form_open('auth/login'); ?>
                        <div class="mb-3">
                            <?php echo form_label(lang('Auth.login_identity_label'), 'identity', $attribute); ?>
                            <?php echo form_input($identity,'', "class='form-control'"); ?>
                        </div>
                        <div class="mb-3">
                            <?php echo form_label(lang('Auth.login_password_label'), 'password', $attribute); ?>
                            <?php echo form_input($password,'', "class='form-control'"); ?>
                        </div>
                        <div class="mb-3">
                            <?php echo form_label(lang('Auth.login_remember_label'), 'remember', $attribute); ?>
                            <?php echo form_checkbox('remember', '1', false, 'id="remember"'); ?>
                        </div>
                        <p><?php echo form_submit('submit', lang('Auth.login_submit_btn'), 'class="btn btn-primary btn-block"'); ?>
                        </p>
                        <?php echo form_close(); ?>
                        <div class="col-md-12" id="help-link">
                            <p><a href="#">Forgot password?</a></p>
                            <p><a href="#">Don't have an account? Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>