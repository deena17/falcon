<?php helper('html'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"">
            <link href=" https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    body {
        background-color: #ebedef;
    }

    .logo {
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body>
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <h4 class="py-3 d-flex justify-content-center">Golden Falcon International Ltd.</h5>
                <div id="infoMessage"><?php echo $message; ?></div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <?php echo lang('Auth.forgot_password_heading'); ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php echo sprintf(lang('Auth.forgot_password_subheading'), $identity_label); ?>
                        <?php echo form_open('auth/forgot_password'); ?>
                        <div class="my-3">
                            <label
                                for="identity"><?php echo (($type === 'email') ? sprintf(lang('Auth.forgot_password_email_label'), $identity_label) : sprintf(lang('Auth.forgot_password_identity_label'), $identity_label)); ?></label>
                            <br />
                            <?php echo form_input($identity); ?>
                        </div>
                        <div class="mb-3">
                            <?php echo form_submit('submit', lang('Auth.forgot_password_submit_btn'), 'class="btn btn-success"'); ?>
                            </p>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
        </div>
    </div>
</body>

</html>