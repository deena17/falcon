<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Quotation</a></li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
            <div class="float-right">
                <a href="<?= url_to('customer.quotation.add', $customer->id) ?>" class="btn btn-success"><i class="fa fa-plus"></i> New
                    Quotation</a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($quotations)): ?>
                <?php foreach ($quotations as $i) : ?>
                <div class="card">
                    <div class="card-body">
                        <p>Sales Agreement </p>
                        <a href="<?= url_to('customer.quotation.edit', $customer->id, $i->id); ?>" class="btn btn-primary"><i
                                class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="<?= url_to('customer.quotation.delete', $customer->id, $i->id); ?>" class="btn btn-danger"><i
                                class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> No quotation found
                </div>
            <?php endif; ?> 
        </div>
    </div>
    <?= $this->endSection(); ?>