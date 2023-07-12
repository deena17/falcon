<?php
    $ionAuth    = new \App\Libraries\IonAuth();
    $session    = \Config\Services::session();
?>


<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
List Customer
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?= $pageTitle; ?></h5>
        <?php if($ionAuth->checkPermission('add_customer')): ?> 
        <div class="float-right">
            <a href="<?= url_to('customer.add') ?>" class="btn btn-success"><i class="fa fa-plus mr-1"></i><?= lang('Falcon.customer_add')?></a>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
            <form action="" method="GET">
                <div class="row mt-2 mb-3">
                    <div class="col-md-3">
                        <select name="department" id="department" class="form-control">
                            <option value="0">Select department</option>
                            <?php foreach($department as $d): ?>
                            <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="customer_name" placeholder="Customer name"
                            value="<?= set_value('customer_name'); ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="area" id="area" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Search" class="btn btn-info px-5">
                    </div>
                </div>
            </form>
        <?php if($message): ?>
            <div class="alert alert-danger"><?= $message; ?></div>
        <?php endif; ?>  
        <div class="row">
            <?php foreach ($customers as $c) : ?>
            <div class="col-md-6">
                <div class="card" style="min-height:100px">
                    <div class="card-body p-2">
                        <h5 class="py-1"><strong><a href="<?= url_to('customer.detail', $c->id); ?>">
                                    <?= $c->customer_name; ?></a></strong>
                        </h5>            
                        <p><?= $c->contact_street; ?>, <?= $c->contact_city; ?>, <?= $c->contact_district; ?>,
                            <?= $c->contact_state; ?>-<?= $c->contact_pincode; ?>
                        </p>        
                        <span class="float-right">
                            <?php if($ionAuth->checkPermission('edit_customer')): ?>
                            <a href="<?= url_to('customer.edit', $c->id); ?>" class="btn btn-info btn-sm"><i
                                    class="fa fa-pencil-alt"></i> Edit</a>
                            <?php endif; ?>        
                            <a href="<?= url_to('customer.detail', $c->id); ?>" class="btn btn-secondary btn-sm"><i
                                    class="fa fa-eye"></i> View</a>
                            <a href="<?= url_to('customer.delete', $c->id); ?>" class="btn btn-danger btn-sm"><i
                                    class="fa fa-trash"></i> Delete</a>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>