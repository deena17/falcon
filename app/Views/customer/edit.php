<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item">Customer</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
    Edit Customer
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><strong>Edit Customer</strong></h5>
            <a href="<?= url_to('customer.list'); ?>" class="btn btn-primary float-sm-right">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <?= form_open(current_url()); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-purple">
                            <div class="card-header">Basic Details</div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <label for="customer-department" class="col-sm-3 col-form-label">Department</label>
                                    <div class="col-sm-9">
                                        <?= form_dropdown($department); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="customer-type" class="col-sm-3 col-form-label">Customer type</label>
                                    <div class="col-sm-9">
                                        <?= form_dropdown($customer_type); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="customer-name" class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <?= form_input($customer_name); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="customer-contact-number" class="col-sm-3 col-form-label">Contact Number</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_number); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="customer-contact-landline" class="col-sm-3">Landline Number</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_landline); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-email" class="col-sm-3 col-form-label">E-Mail</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_email); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-street" class="col-sm-3 col-form-label">Street</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_street); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_city); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-district" class="col-sm-3 col-form-label">District</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_district); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-state" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_state); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_pincode); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-website" class="col-sm-3 col-form-label">Website</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_website); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="contact-latitude" class="col-sm-3 col-form-label">Location</label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_latitude); ?>
                                    </div>
                                </div>
                                <div class="row form-group pb-5">
                                    <label for="contact-longitude" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <?= form_input($contact_longitude); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-purple">
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
                                        <?= form_input($billing_street); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_city); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-district" class="col-sm-3 col-form-label">District</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_district); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-state" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_state); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_pincode); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-iec-number" class="col-sm-3 col-form-label">IEC Number</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_iec_number); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-pan-number" class="col-sm-3 col-form-label">PAN Number</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_pan_number); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="billing-gst-number" class="col-sm-3 col-form-label">GST Number</label>
                                    <div class="col-sm-9">
                                        <?= form_input($billing_gst_number); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-outline card-purple">
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
                                        <?= form_input($shipping_street); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="shipping-city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <?= form_input($shipping_city); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="shipping-district" class="col-sm-3 col-form-label">District</label>
                                    <div class="col-sm-9">
                                        <?= form_input($shipping_district); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="shipping-state" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <?= form_input($shipping_state); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="shipping-pincode" class="col-sm-3 col-form-label">Pincode</label>
                                    <div class="col-sm-9">
                                        <?= form_input($shipping_pincode); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_submit('submit', 'Update Customer', 'class="btn btn-success"');?>
            <?php echo form_close();?>
            </div>
        </div>
        
  
<?= $this->endSection(); ?>



<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function(){
        $("#billing-checkbox").click(function() {
            if ($("#billing-checkbox").is(":checked")) {
                var contact_street   = $('#contact-street').val();
                var contact_city     = $('#contact-city').val();
                var contact_district = $('#contact-district').val();
                var contact_state    = $('#contact-state').val();
                var contact_pincode  = $('#contact-pincode').val();
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
                var billing_street   = $('#billing-street').val();
                var billing_city     = $('#billing-city').val();
                var billing_district = $('#billing-district').val();
                var billing_state    = $('#billing-state').val();
                var billing_pincode  = $('#billing-pincode').val();
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