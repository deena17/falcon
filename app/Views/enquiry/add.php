<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Enquiry</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card">
    <div class="card-header py-2">
        <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
        <a href="<?= url_to('enquiry.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="customer_type">Customer Type</label><br>
                        <input type="radio" name="customer_type" checked value="new"> New Customer
                        <input type="radio" name="customer_type" class="ml-3" value="old"> Existing Customer
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group" id="customer-dropdown" style="display:none">
                        <label for="customer">Customer Name</label>
                        <select name="customer" id="customer" class="form-control"></select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-number">Enquiry Number</label>
                        <?= form_input($enquiry_number); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-date">Enquiry Date</label>
                        <?= form_input($enquiry_date); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <?= form_input($department); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-mode">Mode of Contact</label>
                        <?= form_input($department); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?= form_input($name); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <?= form_input($phone); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Landline Number</label>
                        <?= form_input($landline); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <?= form_input($street); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">City</label>
                        <?= form_input($city); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">District</label>
                        <?= form_input($district); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">State</label>
                        <?= form_input($state); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Pincode</label>
                        <?= form_input($pincode); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Area</label>
                        <?= form_input($area); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Distance</label>
                        <?= form_input($distance); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">From Time</label>
                        <?= form_input($from_time); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">To Time</label>
                        <?= form_input($to_time); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Marketing Reference</label>
                        <?= form_input($marketing_reference); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Traveling KMs</label>
                        <?= form_input($traveling_kms); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Forward to</label>
                        <?= form_input($forward_to); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Status</label>
                        <?= form_input($status); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$('document').ready(function() {
    $('input[type=radio][name=customer_type]').change(function() {
        if (this.value == 'old') {
            $('#customer-dropdown').toggle();
            $('#name').prop('readonly', true);
            $('#phone').prop('readonly', true);
            $('#landline').prop('readonly', true);
            $('#street').prop('readonly', true);
            $('#city').prop('readonly', true);
            $('#district').prop('readonly', true);
            $('#state').prop('readonly', true);
            $('#pincode').prop('readonly', true);
        } else {
            $('#customer-dropdown').toggle();
            $('#name').prop('readonly', false);
            $('#phone').prop('readonly', false);
            $('#landline').prop('readonly', false);
            $('#street').prop('readonly', false);
            $('#city').prop('readonly', false);
            $('#district').prop('readonly', false);
            $('#state').prop('readonly', false);
            $('#pincode').prop('readonly', false);
        }
    })
});
</script>
<?= $this->endSection(); ?>