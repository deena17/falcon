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
            <h5 class="card-title"><strong>List Enquiry</strong></h5>
            <div class="float-right">
                <a href="<?= isset($customer) ? url_to('customer.enquiry.add', $customer->id) : url_to('enquiry.add'); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i> New Enquiry
            </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($enquiry)): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Enquiry Number</th>
                            <th>Enquiry Date</th>
                            <?php if(!isset($customer)): ?>
                            <th>Customer Name</th>
                            <?php endif; ?>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index=1; ?>
                        <?php foreach ($enquiry as $e) : ?>
                        <tr>
                            <td><?= $index; ?></td>
                            <td><?= $e->department_name; ?></td>
                            <td><?= $e->enquiry_number; ?></td>
                            <td><?= $e->enquiry_date; ?></td>
                            <?php if(!isset($customer)): ?>
                            <td><?= $e->customer_name; ?></td>
                            <?php endif; ?>
                            <td><?= $e->status; ?></td>
                            <td>
                                <a href="<?= isset($customer) ? url_to('customer.enquiry.edit', $customer->id, $e->id) : url_to('enquiry.edit', $e->id); ?>" class="btn btn-sm btn-primary"><i
                                        class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="<?= isset($customer) ? url_to('customer.enquiry.detail', $customer->id, $e->id) : url_to('enquiry.detail', $e->id); ?>" class="btn btn-sm btn-info"><i
                                        class="fa fa-pencil-alt"></i> View</a>
                                <a href="<?= isset($customer) ? url_to('customer.enquiry.delete', $customer->id, $e->id) : url_to('enquiry.delete', $e->id); ?>" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> No enquiry found
                </div>
            <?php endif; ?>    
        </div>
    </div>
    <?= $this->endSection(); ?>