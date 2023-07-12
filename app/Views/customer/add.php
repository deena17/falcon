<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
New Customer
<?= $this->endSection(); ?>

<?php $validation = \Config\Services::validation(); ?>

<?= $this->section('content'); ?>
<div class="card card-outline card-success">
    <div class="card-header">
        <h5 class="card-title"><strong>New Customer</strong></h5>
        <a href="<?= url_to('customer.list'); ?>" class="btn btn-primary btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form action="http://localhost/falcon/customer/new" method="POST" accept-charset="utf-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">Basic Details</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="customer-department" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <div class="select2-purple">
                                        <select id="customer-department" class="select2" multiple="multiple"
                                            name="department[]" style="width: 100%;"
                                            data-dropdown-css-class="select2-purple" value="">
                                            <?php foreach ($department as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="customer-type" class="col-sm-3 col-form-label">Customer type</label>
                                <div class="col-sm-9">
                                    <select id="customer-type" class="form-control" name="customer_type" value="">
                                        <option value="0">Select Customer Type</option>
                                        <?php foreach ($customer_type as $c) : ?>
                                        <option value="<?= $c->id; ?>"><?= $c->type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="customer-name" class="col-sm-3 col-form-label">Customer Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="customer_name" id="customer-name"
                                        value="<?= set_value('customer_name'); ?>"
                                        class=" form-control
                                        <?php if ($validation->getError('customer_name')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('customer_name')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('customer_name') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="customer-contact-number" class="col-sm-3 col-form-label">Contact
                                    Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_number" id="contact-number"
                                        value="<?= set_value('contact_number'); ?>"
                                        class=" form-control
                                        <?php if ($validation->getError('contact_number')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_number')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_number') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="customer-contact-landline" class="col-sm-3">Landline Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_landline" id="contact-landline"
                                        value="<?= set_value('contact_landline'); ?>"
                                        class=" form-control
                                        <?php if ($validation->getError('contact_landline')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_landline')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_landline') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-email" class="col-sm-3 col-form-label">E-Mail</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_email" id="contact-email"
                                        value="<?= set_value('contact_email'); ?>"
                                        class=" form-control
                                        <?php if ($validation->getError('contact_email')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_email')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_email') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-street" class="col-sm-3 col-form-label">Street</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_street" id="contact-street"
                                        value="<?= set_value('contact_street'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_street')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_street')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_street') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_city" id="contact-city"
                                        value="<?= set_value('contact_city'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_city')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_city')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_city') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-district" class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_district" id="contact-district"
                                        value="<?= set_value('contact_district'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_district')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_district')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_district') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_state" id="contact-state"
                                        value="<?= set_value('contact_state'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_state')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_state')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_state') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_pincode" id="contact-pincode"
                                        value="<?= set_value('contact_pincode'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_pincode')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_pincode')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_pincode') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-area" class="col-sm-3 col-form-label">Area</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_area" id="contact-area" value="<?= set_value('contact_area'); ?>"
                                        class="form-control <?php if ($validation->getError('contact_area')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('contact_area')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_area') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="distance" class="col-sm-3 col-form-label">Distance</label>
                                <div class="col-sm-9">
                                    <input type="text" name="distance" id="distance"
                                        class="form-control <?php if ($validation->getError('distance')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('distance')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('distance') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contact-latitude" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_latitude" id="contact-latitude"
                                        class="form-control" placeholder="Latitude" />
                                </div>
                            </div>
                            <div class="row form-group pb-5">
                                <label for="contact-longitude" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_longitude" id="contact-longitude"
                                        class="form-control" placeholder="Longitude" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="engineer" class="col-sm-3 col-form-label">Assign Engineer</label>
                                <div class="col-sm-9">
                                    <div class="select2-purple">
                                        <select id="engineer" class="select2" multiple="multiple" name="engineer[]"
                                            style="width: 100%;" data-dropdown-css-class="select2-purple" value="">
                                            <?php foreach ($engineer as $e) : ?>
                                            <option value="<?= $e->id ?>"><?= $e->username; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            Billing Address
                            <div class="float-right">
                                <input type="checkbox" id="billing-checkbox"> Same as Customer Address
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="billing-street" class="col-sm-3 col-form-label">Street</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_street" id="billing-street"
                                        value="<?= set_value('billing_street'); ?>"
                                        class="form-control <?php if ($validation->getError('billing_street')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('billing_street')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('billing_street') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_city" id="billing-city"
                                        value="<?= set_value('billing_city'); ?>"
                                        class="form-control <?php if ($validation->getError('billing_city')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('billing_city')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('billing_city') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-district" class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_district" id="billing-district"
                                        value="<?= set_value('billing_district'); ?>"
                                        class="form-control <?php if ($validation->getError('billing_district')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('billing_district')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('billing_district') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_state" id="billing-state"
                                        value="<?= set_value('billing_state'); ?>"
                                        class="form-control <?php if ($validation->getError('billing_state')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('billing_state')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('billing_state') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_pincode" id="billing-pincode"
                                        value="<?= set_value('billing_pincode'); ?>"
                                        class="form-control <?php if ($validation->getError('billing_pincode')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('billing_pincode')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('billing_pincode') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-iec-number" class="col-sm-3 col-form-label">IEC Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_iec_number" id="billing-iec-number"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-pan-number" class="col-sm-3 col-form-label">PAN Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_pan_number" id="billing-pan-number"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="billing-gst-number" class="col-sm-3 col-form-label">GST Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="billing_gst_number" id="billing-gst-number"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            Shipping Address
                            <div class="float-right">
                                <input type="checkbox" id="shipping-checkbox"> Same as Billing Address
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="shipping-street" class="col-sm-3 col-form-label">Street</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shipping_street" id="shipping-street"
                                        value="<?= set_value('shipping_street'); ?>"
                                        class="form-control <?php if ($validation->getError('shipping_street')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('shipping_street')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('shipping_street') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="shipping-city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shipping_city" id="shipping-city"
                                        value="<?= set_value('shipping_city'); ?>"
                                        class="form-control <?php if ($validation->getError('shipping_city')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('shipping_city')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('shipping_city') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="shipping-district" class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shipping_district" id="shipping-district"
                                        value="<?= set_value('shipping_district'); ?>"
                                        class="form-control <?php if ($validation->getError('shipping_district')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('shipping_district')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('shipping_district') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="shipping-state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shipping_state" id="shipping-state"
                                        value="<?= set_value('shipping_state'); ?>"
                                        class="form-control <?php if ($validation->getError('shipping_state')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('shipping_state')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('shipping_state') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="shipping-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="shipping_pincode" id="shipping-pincode"
                                        value="<?= set_value('shipping_pincode'); ?>"
                                        class="form-control <?php if ($validation->getError('shipping_pincode')) : ?>is-invalid<?php endif ?>" />
                                    <?php if ($validation->getError('shipping_pincode')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('shipping_pincode') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Add Customer" class="btn btn-success" />
        </form>
    </div>
</div>


<?= $this->endSection(); ?>



<?= $this->section('scripts'); ?>
<script>
$(document).ready(function() {
    var customer_type = $("#customer_type").val();
    if (customer_type === 0) {
        alert("Please select customer type");
    }
    $("#billing-checkbox").click(function() {
        if ($("#billing-checkbox").is(":checked")) {
            var contact_street = $('#contact-street').val();
            var contact_city = $('#contact-city').val();
            var contact_district = $('#contact-district').val();
            var contact_state = $('#contact-state').val();
            var contact_pincode = $('#contact-pincode').val();
            $('#billing-street').val(contact_street);
            $('#billing-city').val(contact_city);
            $('#billing-district').val(contact_district);
            $('#billing-state').val(contact_state);
            $('#billing-pincode').val(contact_pincode);
        } else {
            $('#billing-street').val('');
            $('#billing-city').val('');
            $('#billing-district').val('');
            $('#billing-state').val('');
            $('#billing-pincode').val('');
        }
    });

    $("#shipping-checkbox").click(function() {
        if ($("#shipping-checkbox").is(":checked")) {
            var billing_street = $('#billing-street').val();
            var billing_city = $('#billing-city').val();
            var billing_district = $('#billing-district').val();
            var billing_state = $('#billing-state').val();
            var billing_pincode = $('#billing-pincode').val();
            $('#shipping-street').val(billing_street);
            $('#shipping-city').val(billing_city);
            $('#shipping-district').val(billing_district);
            $('#shipping-state').val(billing_state);
            $('#shipping-pincode').val(billing_pincode);
        } else {
            $('#shipping-street').val('');
            $('#shipping-city').val('');
            $('#shipping-district').val('');
            $('#shipping-state').val('');
            $('#shipping-pincode').val('');
        }
    });
});
</script>

<?= $this->endSection(); ?>