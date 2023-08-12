<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Call</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
        <div class="float-right">
            <a href="<?= isset($customer) ? url_to('customer.call.add', $customer->id) : url_to('call.add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>
                New Call</a>
        </div>
    </div>
    <div class="card-body p-2">
        <?php if(!empty($calls)): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Call Number</th>
                        <th>Date & Time</th>
                        <th>Nature of Complaint</th>
                        <th>Contact Person</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($calls as $c): ?>
                    <tr>
                        <td><?= $c->call_number; ?></td>
                        <td><?= $c->call_date.' '.$c->call_time;?></td>
                        <td><?= $c->complaint_nature; ?></td>
                        <td><?= $c->contact_name; ?></td>
                        <td><?= $c->contact_number; ?></td>
                        <td>
                            <a href="<?= url_to('customer.call.edit', $customer->id, $c->id) ?>" class="btn btn-sm btn-primary"><i
                                    class="fa fa-pencil-alt mr-2"></i>Edit</a>
                            <a href="<?= url_to('customer.call.delete', $customer->id, $c->id) ?>" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash mr-2"></i>Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> No calls found for the customer
                </div>
            <?php endif; ?>    
        </div>
    </div>
</div>
<?= $this->endSection(); ?>