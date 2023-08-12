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
        <form method="post">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $page_title; ?></strong></h5>
            <a href="<?= isset($customer) ? url_to('customer.salesorder.list', $customer->id) : url_to('invoice.list'); ?>" class="btn btn-info float-right">
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
                            value="<?= $order_number; ?>"
                            readonly="readonly"
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
                            class="form-control datepicker" 
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
                        <label for="area">Area</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="area" 
                            name="area" 
                            value="<?= set_Value('area', isset($customer) ? $customer->contact_area : ''); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="1" class="form-control"></textarea>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Select status</option>
                            <?php foreach($status as $s): ?>
                            <option value="<?= $s->id; ?>"><?= $s->status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="product-table">
                <input type="hidden" name="index" id="index" value="0"/>
                <thead class="bg-secondary">
                    <tr>
                        <th>Product</th>
                        <th>Model</th>
                        <th>Description</th>
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
                <div class="col-md-5 offset-7">
                    <div class="form-group row">
                        <label for="total_amount" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-3">
                            <button onClick="calculate_total()" type="button" class="btn btn-primary btn-sm">Calculate</button>
                        </div>
                        <input type="hidden" name="base_amount" value="0" id="base-amount">
                        <div class="col-sm-6">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="total_amount" 
                                name="total_amount"
                                readonly="readonly"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-sm-6 col-form-label">Discount</label>
                        <div class="col-sm-6">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="discount" 
                                name="discount"
                                oninput="calculate_discount()"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="grand_total" class="col-sm-6 col-form-label">Grand Total</label>
                        <div class="col-sm-6">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="grand-total" 
                                name="grand_total"
                                readonly="readonly"
                            />
                        </div>
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
        $('#add-new-button').click(function(e){
            e.preventDefault();
            index = parseInt($("#index").val());
            index += 1;
            var row = `<tr>
                            <td>
                                <select name="product[]" id="product_${index}" class="form-control" onChange="updateModel(${index})">
                                <option value="0">Select Product</option>
                                    <?php foreach($products as $p): ?>
                                    <option value="<?= $p->id; ?>"><?= $p->name; ?></option>        
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="product_model[]" id="product_model_${index}" class="form-control">
                                    
                                </select>
                            </td>
                            <td>
                                <textarea name="description[]" id="description" cols="30" rows="1" class="form-control"></textarea>
                            </td>
                            <td>
                                <textarea name="specification[]" id="specification" cols="30" rows="1" class="form-control"></textarea>
                            </td>
                            <td>
                                <input type="text" id="quantity_${index}" class="form-control" name="quantity[]" oninput="calculate_amount(${index})">
                            </td>
                            <td>
                                <input type="text" id="unit_rate_${index}" class="form-control" name="unit_rate[]" oninput="calculate_amount(${index})">
                            </td>
                            <td>
                                <input type="text" id="amount_${index}" class="form-control" name="amount[]" readonly="readonly">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" id="delete-button"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            $("#product-table").append(row);
            $("#index").val(index);
        });
    });

    function updateModel(index){
        var product = $(`#product_${index}`).val();
        if(product){
            $.ajax({
                type:'POST',
                url:`<?= base_url(); ?>/master/product/${product}/models`,
                data:{'product':product},
                success:function(response){
                    var options='';
                    data = JSON.parse(response);
                    for(i=0; i<data.length; i++){
                        options += `<option value="${data[i].id}">${data[i].name}</option>`
                    }
                    $(`#product_model_${index}`).html(options);
                    
                }
            }); 
        }else{
            $(`#product-model_${index}`).html('<option value="">Model</option>');
        }
    }

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

    function calculate_amount(index){
        var quantity = parseFloat($(`#quantity_${index}`).val());
        if (isNaN(quantity)) quantity = 0;
        var unit_rate = parseFloat($(`#unit_rate_${index}`).val());
        if (isNaN(unit_rate)) unit_rate = 0;
        var amount = quantity * unit_rate;
        total_amount += amount;
        $(`#amount_${index}`).val(amount);
    }

    function calculate_total(){
        var index = parseInt($("#index").val());
        var total = 0;
        for(i=1; i<=index; i++){
            total += parseFloat($(`#amount_${i}`).val());
        }
        $("#total_amount").val(total);
    }

    function calculate_discount(){
        var total_amount = parseFloat($("#total_amount").val());
        var discount = parseFloat($("#discount").val());
        if(isNaN(discount)) discount=0;
        grand_total = total_amount - discount;
        $("#grand-total").val(grand_total);
    }

    </script>
<?= $this->endSection(); ?>