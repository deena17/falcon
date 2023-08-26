<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item active">Delete</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
                    <div class="float-right">
                        <a href="<?= url_to('customer.list') ?>" class="btn btn-info">
                            <i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $customer->id; ?>">
                        <input type="hidden" name="display" value="N">
                        <p>Are you sure want to customer <strong><?= $customer->customer_name; ?></strong>?</p>
                        <input type="submit" class="btn btn-danger" value="Yes! Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>