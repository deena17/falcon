<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Service Call</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>
<div class="card">
    <div class="card-header py-2">
        <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
        <a href="<?= url_to('customer.servicecall.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <?php if(!isset($customer)): ?>
                <div class="col-md-12">
                    <div class="form-group" style="display:none" id="customer-dropdown">
                        <label for="customer">Select Customer</label>
                        <select name="customer" id="customer" class="form-control select2">
                            <option value="0">Select Customer</option>
                            <?php foreach($customers as $c): ?>
                            <option value="<?= $c->id; ?>"><?= $c->customer_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="call-number">Call Number</label>
                        <input type="text" class="form-control" id="call-number" name="call_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="call-date">Call Date</label>
                        <input type="text" class="form-control" id="call-date" name="call_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="call-time">Call Time</label>
                        <input type="text" class="form-control" id="call-time" name="call_time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="person-name">Contact Person</label>
                        <input type="text" class="form-control" id="person-name" name="Person Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact-mobile">Contact Number</label>
                        <input type="text" class="form-control" id="contact-mobile" name="contact_mobile">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product">Product Name</label>
                        <select name="product" id="product" class="form-control">
                            <option value="">Select Product</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_model">Model Name</label>
                        <select name="product_model" id="product-model" class="form-control">
                            <option value="">Select Product Model</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="serial-number">Serial Number</label>
                        <input type="text" class="form-control" id="serial-number" name="serial_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="installation-date">Installation Date</label>
                        <input type="text" class="form-control" id="installation-date" name="installation_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" class="form-control" id="expiry-date" name="expiry_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="service-type">Service Type</label>
                    <select name="service_type" id="service-type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="1">Warranty</option>
                        <option value="2">AMC</option>
                        <option value="3">Non-Warranty</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nature-of-compliant">Nature of Compliant</label>
                        <input type="text" class="form-control" id="nature-of-compliant" name="nature_of_complaint">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary px-4" value="Save" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>