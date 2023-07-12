<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Sales Order</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
            <a href="<?php isset($customer) ? url_to('customer.salesorder.list', $customer->id) : url_to('salesorder.list'); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="order_number">Order Number</label>
                        <input 
                            type="text" 
                            name="order_number" 
                            class="form-control" 
                            id="order_number" 
                            value="<?= set_value('order_number'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <input 
                            type="text" 
                            name="order_date" 
                            class="form-control datepicker" 
                            id="order_date" 
                            value="<?= set_value('order_date'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input 
                            type="text" 
                            name="due_date" 
                            class="form-control" 
                            id="due_date" 
                        />
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
                        <label for="contact-street">Street</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-street" 
                            name="contact_street" 
                            value="<?= set_value('contact_street', isset($customer) ? $customer->contact_street : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-city">City</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-city" 
                            name="contact_city" 
                            value="<?= set_value('contact_city', isset($customer) ? $customer->contact_city : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-district">District</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-district" 
                            name="contact_district" 
                            value="<?= set_value('contact_district', isset($customer) ? $customer->contact_district : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-state">State</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-state" 
                            name="contact_state" 
                            value="<?= set_value('contact_state', isset($customer) ? $customer->contact_state : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?>  
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-pincode">Pincode</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-pincode" 
                            name="contact_pincode" 
                            value="<?= set_value('contact_pincode', isset($customer) ? $customer->contact_pincode : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact-area">Area</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="contact-area" 
                            name="contact_area" 
                            value="<?= set_Value('contact_area', isset($customer) ? $customer->contact_area : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="product-table">
                <thead class="bg-secondary">
                    <tr>
                        <th>Product</th>
                        <th>Model</th>
                        <th>Specification</th>
                        <th>Quantity</th>
                        <th>Unit Rate</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="add-rows">

                </tbody>
            </table>
            <button class="btn btn-success mt-2" id="add-new-button">
                <i class="fa fa-plus mr-2"></i>
                Add Items
            </button>
            <div class="row mt-2">
                <div class="col-md-4 offset-8">
                    <div class="form-group row">
                        <label for="total_amount" class="col-sm-4 col-form-label">Total Amount</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="total_amount" 
                                name="total_amount"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="discount" name="discount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="grand_total" class="col-sm-4 col-form-label">Grand Total</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="grand-total" name="grand_total">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">
                <i class="fa fa-check mr-2"></i>
                Save
            </button>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
    <script>
    $('document').ready(function() {
        $('#add-new-button').click(function(e){
            e.preventDefault();
            var row = `<tr>
                            <td>
                                <select name="product[]" id="product" class="form-control">
                                    <option value="">Flat Knitting</option>
                                </select>
                            </td>
                            <td>
                                <select name="product_model[]" id="product_model" class="form-control">
                                    <option value="">Welcome to Golden Falcon</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="specification[]" id="specification" cols="30" rows="1" class="form-control"></textarea>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="quantity[]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="quantity[]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="quantity[]">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" id="delete-button"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            $("#product-table").append(row);
        });
    });
    function deleteRow(ele){
        var table = $('#product-table')[0];
        var rowCount = table.rows.length;
        if(rowCount <= 1){
            alert("There is no row available to delete!");
            return;
        }
        if(ele){
            //delete specific row
            $(ele).parent().parent().remove();
        }
        else{
            //delete last row
            table.deleteRow(rowCount-1);
        }
    }
    </script>
<?= $this->endSection(); ?>