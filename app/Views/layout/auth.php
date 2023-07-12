<?php helper('html'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($pageTitle) ? $pageTitle : '' ?> - Golden Falcon International</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <?= link_tag('public/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Theme style -->
    <?= link_tag('public/dist/css/adminlte.min.css'); ?>
    <?= link_tag('public/dist/css/custom-style.css'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

            <section class="content">
                <?= $this->renderSection('content'); ?>
            </section>
            <!-- /.content -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?= script_tag('public/plugins/jquery/jquery.min.js'); ?>
    <!-- Bootstrap 4 -->
    <?= script_tag('public/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>
    <?= script_tag('public/dist/js/adminlte.min.js'); ?>
    <?= script_tag('public/js/custom-script.js'); ?>
    <?= $this->renderSection('scripts'); ?>

</body>

</html>