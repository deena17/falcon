<?php
    $ionAuth    = new \App\Libraries\IonAuth();
    $session    = \Config\Services::session();
?>


<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
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
        <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php static $index= 1; foreach ($customers as $c) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $c->customer_name; ?></td>
                                <td><?= $c->contact_number; ?></td>
                                <td><?= $c->area; ?></td>
                                <td>
                                    <?= !empty($c->street) ? $c->street.'<br>' : null; ?>
                                    <?= !empty($c->city) ? $c->city.'<br>' : null; ?>
                                    <?= !empty($c->district) ? $c->district.'<br>' : null; ?>
                                    <?= !empty($c->state) ? $c->state.'<br>' : null; ?>
                                    <?= !empty($c->pincode) ? $c->pincode.'<br>' : null; ?>
                                </td>
                                <td>
                                    <a href="<?= url_to('customer.create', $c->id); ?>" class="btn btn-success">Confirm</a>
                                </td>
                            </tr>
                        <?php $index++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>