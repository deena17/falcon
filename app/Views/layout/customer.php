<?php $ionAuth = new \App\Libraries\IonAuth(); ?>
<?= $this->extend("layout/admin") ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <?php if(isset($customer)): ?>
        <div class="col-md-3">
            <div class="card card-outline bg-olive">
                <div class="card-header p-3 text-center">
                    <h5><?= $customer->customer_name; ?></h5>
                    <p>
                        <?= $customer->contact_street; ?><br>
                        <?= $customer->contact_city; ?>,
                        <?= $customer->contact_district; ?><br />
                        <i class="fa fa-envelope mr-2"></i><?= $customer->contact_email; ?><br />
                        <i class="fa fa-mobile mr-2"></i><?= $customer->contact_number; ?>
                    </p>
                </div>
                <div class="card-body p-0">

                    <ul class="list-group customer-menu" style="border-radius:0px">
                        <li class="list-group-item">
                            <a href="<?= url_to('customer.call.list', $customer->id); ?>">
                                <i class="fa fa-phone mr-2"></i>Calls
                                <span class="badge bg-primary float-right"></span>
                            </a>
                        </li>
                        <?php if($ionAuth->checkPermission('view_contact')): ?>            
                        <li class="list-group-item">
                            <a href="<?= url_to('customer.contact.list', $customer->id); ?>">
                                <i class="fa fa-address-book mr-2"></i>Contacts
                            </a>
                        </li>
                        <?php endif; ?>            
                        <li class="list-group-item"><a href="<?= url_to('customer.document.list', $customer->id); ?>"><i
                                    class="fa fa-file mr-2"></i>Documents</a></li>
                        <li class="list-group-item"><a href="<?= url_to('customer.enquiry.list', $customer->id); ?>"><i
                                    class="fa fa-question mr-2"></i>Enquiry</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-tools mr-2"></i>Installation</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-file mr-2"></i>Invoice</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-file mr-2"></i>Notes</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-file mr-2"></i>Payments</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-file mr-2"></i>Quotations</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i class="fa fa-file mr-2"></i>Sales
                                Order</a></li>
                        <li class="list-group-item"><a href="<?= base_url(); ?>"><i
                                    class="fa fa-file mr-2"></i>Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?= $this->renderSection('main'); ?>
        </div>
        <?php else: ?>
        <div class="col-md-12">
            <?= $this->renderSection('main'); ?>
        </div> 
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection(); ?>