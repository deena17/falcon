<?= $this->extend('layout/admin'); ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item active">Access Denied</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    Access Denied
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
    <div class="my-3">
        <div class="alert alert-danger">
            <strong>Access Denied !!!</strong>
                You are not allowed to view this page. Please contact the website administrator!!!
        </div>
    </div>
<?= $this->endSection(); ?>