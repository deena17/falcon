<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Payment</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<?php $validation = \Config\Services::validation(); ?>
<?= $validation->listErrors(); ?>
<!-- Main content -->
<section class="content">
    <div class="card">
        <form method="post">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $page_title; ?></strong></h5>
            <a href="<?= isset($customer) ? url_to('customer.payment.list', $customer->id) : url_to('invoice.list'); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="payment_number">Payment Number</label>
                        <input 
                            type="text" 
                            name="payment_number" 
                            class="form-control" 
                            id="payment_number" 
                            value="<?= $payment_number; ?>"
                            readonly="readonly"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="payment_date">Payment Date</label>
                        <input 
                            type="text" 
                            name="payment_date" 
                            class="form-control datepicker" 
                            id="payment_date" 
                            value="<?= set_value('payment_date'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select name="payment_method" id="payment-method" class="form-control">
                            <option value="0">Select method</option>
                            <?php foreach($payment_method as $p): ?>
                            <option value="<?= $p->id; ?>"><?= $p->method; ?></option>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="customer-name">Customer Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="customer-name" 
                            name="customer_name" 
                            value="<?= set_value('customer_name', isset($customer) ? $customer->customer_name : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact-number">Phone Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-number" 
                            name="contact_number" 
                            value="<?= set_value('contact_number', isset($customer) ? $customer->contact_number : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-landline">Landline Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-landline" 
                            name="contact_landline" 
                            value="<?= set_value('contact_landline', isset($customer) ? $customer->contact_landline : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="street" 
                            name="street" 
                            value="<?= set_value('street', isset($customer) ? $customer->contact_street : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="city" 
                            name="city" 
                            value="<?= set_value('city', isset($customer) ? $customer->contact_city : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="district">District</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="district" 
                            name="district" 
                            value="<?= set_value('district', isset($customer) ? $customer->contact_district : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="state" 
                            name="state" 
                            value="<?= set_value('state', isset($customer) ? $customer->contact_state : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="pincode" 
                            name="pincode" 
                            value="<?= set_value('pincode', isset($customer) ? $customer->contact_pincode : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="amount"
                            value="<?= set_value('amount'); ?>"
                            id="amount"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="reference-number">Reference Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="reference_number"
                            value="<?= set_value('reference_number'); ?>"
                            id="reference_number"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <select name="currency" id="currency" class="form-control">
                            <option value="0">Select currency</option>
                            <?php foreach($currency as $c): ?>
                            <option value="<?= $c->id; ?>"><?= $c->symbol .' - '. $c->code; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="1" class="form-control">
                            <?= set_value('remarks'); ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-check mr-2"></i>
                Save
            </button>
        </div>
        <form>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
    <script>
    $('document').ready(function() {
        
          
    });
    </script>
<?= $this->endSection(); ?>