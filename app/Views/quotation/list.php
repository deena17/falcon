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
            <h5 class="card-title pt-2"><strong><?= $page_title; ?></strong></h5>
            <div class="float-right">
                <a href="<?= isset($customer) ? url_to('customer.quotation.add', $customer->id) : url_to('quotation.add') ?>" class="btn btn-success"><i class="fa fa-plus"></i> New
                    Quotation</a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($quotations)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quotation Number</th>
                            <th>Quotation Date</th>
                            <th>Due Date</th>
                            <th>Customer Name</th>
                            <th>Quotation Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php static $index = 1; foreach ($quotations as $q) : ?>
                        <tr>
                            <td><?= $index; ?></td>
                            <td><?= $q->quotation_number; ?></td>
                            <td><?= $q->quotation_date; ?></td>
                            <td><?= $q->due_date; ?></td>
                            <td><?= $q->customer_name; ?></td>
                            <td><?= $q->grand_total; ?></td>
                            <td>
                                <a href="<?= isset($customer) ? url_to('customer.quotation.edit', $customer->id, $q->id) : url_to('quotation.edit', $q->id) ; ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-alt"></i> Edit
                                </a>
                                <a href="<?= isset($customer) ? url_to('customer.quotation.detail', $customer->id, $q->id) : url_to('quotation.detail', $q->id); ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="<?= isset($customer) ? url_to('customer.quotation.delete', $customer->id, $q->id) : url_to('quotation.delete', $q->id); ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php $index++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> No quotation found
                </div>
            <?php endif; ?> 
        </div>
    </div>
    <?= $this->endSection(); ?>