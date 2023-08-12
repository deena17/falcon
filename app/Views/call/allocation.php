<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Call</li>
    <li class="breadcrumb-item active">Allocation</li>
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
                        <a href="#" class="btn btn-info">
                            <i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form>
                        <div class="row">
                            <table class="table table-bordered table-stiped">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Call Number</td>
                                        <td>Call Date</td>
                                        <td>Customer</td>
                                        <td>Contact Number</td>
                                        <td>Nature of Complaint</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php static $index=1; foreach($calls as $c): ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><a href="<?= url_to('call.allocate', $c->id); ?>"><?= $c->call_number; ?></a></td>
                                        <td><?= $c->call_date; ?></td>
                                        <td><?= $c->customer_name; ?></td>
                                        <td><?= $c->contact_number; ?></td>
                                        <td><?= $c->complaint_nature; ?></td>
                                        <td>
                                            <a href="<?= url_to('call.allocate', $c->id); ?>" class="btn btn-success btn-sm">Allocate</a>
                                        </td>
                                    </tr>
                                    <?php $index++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>