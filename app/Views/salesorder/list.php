<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Sales Order</a></li>
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
                <a href="<?= url_to('customer.salesorder.add', $customer->id) ?>" class="btn btn-success"><i class="fa fa-plus"></i> New
                    Sales Order</a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($orders)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Due Date</th>
                            <th>Customer Name</th>
                            <th>Order Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php static $index = 1; foreach ($orders as $i) : ?>
                        <tr>
                            <td><?= $index; ?></td>
                            <td><?= $i->order_number; ?></td>
                            <td><?= $i->order_date; ?></td>
                            <td><?= $i->due_date; ?></td>
                            <td><?= $i->customer_name; ?></td>
                            <td><?= $i->grand_total; ?></td>
                            <td>
                                <a href="<?= url_to('customer.salesorder.edit', $customer->id, $i->id); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-alt"></i> Edit
                                </a>
                                <a href="<?= url_to('customer.salesorder.detail', $customer->id, $i->id); ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="<?= url_to('customer.salesorder.delete', $customer->id, $i->id); ?>" class="btn btn-danger btn-sm">
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
                    <i class="icon fas fa-ban"></i> No orders found
                </div>
            <?php endif; ?> 
        </div>
    </div>
    <?= $this->endSection(); ?>