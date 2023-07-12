<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Compant</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
Contact List
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong>Contact List</strong></h5>
        <a href="<?= url_to('company.add'); ?>" class="btn btn-success float-right">
            <i class="fa fa-plus mr-2"></i>New Company
        </a>
    </div>
    <div class="card-body p-2">
        <?php foreach ($company as $c) : ?>
        <div class="card">
            <div class="card-body">
                <p><strong><?= $c->name; ?></strong><br><span><?= $c->street; ?></span><br/>
                    <?= $c->city; ?><br><?= $c->district; ?></span></p>
                <a href="<?= url_to('company.edit', $c->id); ?>" class="btn btn-primary"><i
                        class="fa fa-pencil-alt mr-2"></i>Edit</a>
                <a href="<?= url_to('company.delete', $c->id); ?>" class="btn btn-danger"><i
                        class="fa fa-trash mr-2"></i>Delete</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>