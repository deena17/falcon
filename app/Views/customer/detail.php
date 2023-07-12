<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="<?= url_to('customer.list') ?>">Customer</a></li>
    <li class="breadcrumb-item active">Details</li>
</ol>
<?= $this->endSection(); ?>


<?= $this->section("main") ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-olive">
                <div class="card-header">
                    <h5 class="card-title"><strong>Customer Details</strong></h5>
                    <a href="<?= url_to('customer.list'); ?>" class="btn btn-primary float-sm-right">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="border-bottom pb-2">Basic Details</h5>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Customer Name</td>
                            <td><?= $customer->customer_name; ?></td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td><?= $customer->contact_number; ?></td>
                        </tr>
                        <tr>
                            <td>Landline Number</td>
                            <td><?= $customer->contact_landline; ?></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td><?= $customer->contact_email; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <?= $customer->contact_street; ?> <br>
                                <?= $customer->contact_city; ?> <br>
                                <?= $customer->contact_district; ?> <br>
                                <?= $customer->contact_state; ?> <br>
                                <?= $customer->contact_pincode; ?> <br>
                            </td>
                        </tr>
                    </table>
                    <h5 class="border-bottom pb-2 mt-3">Billing Details</h5>
                    <?php foreach($billing as $b): ?>
                        <div class="card">
                            <div class="card-body">
                                <?= $b->street; ?> <br>
                                <?= $b->city; ?> <br>
                                <?= $b->district; ?> <br>
                                <?= $b->state; ?> <br>
                                <?= $b->pincode; ?> <br>
                                <?= $b->iec_number; ?> <br>
                                <?= $b->pan_number; ?> <br>
                                <?= $b->gst_number; ?> <br>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                    <h5 class="border-bottom pb-2">Shipping Details</h5>
                    <?php foreach($shipping as $s): ?>
                        <div class="card">
                            <div class="card-body">
                                <?= $s->street; ?> <br>
                                <?= $s->city; ?> <br>
                                <?= $s->district; ?> <br>
                                <?= $s->state; ?> <br>
                                <?= $s->pincode; ?> <br>
                            </div>
                        </div>
                    <?php endforeach; ?>  
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>