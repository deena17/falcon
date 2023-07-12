<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Document</a></li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><strong>List Documents</strong></h5>
            <div class="float-right">
                <a href="<?= url_to('customer.document.add', $customer->id) ?>" class="btn btn-success"><i class="fa fa-plus"></i> New
                    Document</a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($documents)): ?>
                <?php foreach ($documents as $d) : ?>
                <div class="card">
                    <div class="card-body">
                        <p><?= $d->name; ?></p>
                        <a href="<?= url_to('customer.document.edit', $customer->id, $d->id); ?>" class="btn btn-primary"><i
                                class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="<?= url_to('customer.document.delete', $customer->id, $d->id); ?>" class="btn btn-danger"><i
                                class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i> No documents found
            </div>
            <?php endif; ?>    
        </div>
    </div>
    <?= $this->endSection(); ?>