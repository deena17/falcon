<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Supplier</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
Contact List
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong>Supplier List</strong></h5>
        <a href="<?= url_to('supplier.add'); ?>" class="btn btn-success float-right">
            <i class="fa fa-plus mr-2"></i>New Supplier
        </a>
    </div>
    <div class="card-body p-2">
        <?php if($suppliers): ?>
            <?php foreach ($suppliers as $s) : ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong><?= $s->name; ?></strong></p>
                        <a href="<?= url_to('supplier.detail', $s->id); ?>" class="btn btn-info"><i
                                class="fa fa-eye mr-2"></i>View</a>
                        <a href="<?= url_to('supplier.edit', $s->id); ?>" class="btn btn-primary"><i
                                class="fa fa-pencil-alt mr-2"></i>Edit</a>
                        <a href="<?= url_to('supplier.delete', $s->id); ?>" class="btn btn-danger"><i
                                class="fa fa-trash mr-2"></i>Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>    
    </div>
</div>
<?= $this->endSection(); ?>