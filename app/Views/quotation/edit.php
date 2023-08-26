<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Quotation</a></li>
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
            <a href="<?= isset($customer) ? url_to('customer.quotation.list', $customer->id) : url_to('quotation.list'); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <?php if(!isset($customer)): ?>
                <div class="col-md-12">
                `   <div class="form-group">
                        <label for="enquiry">Select Enquiry</label>
                        <select name="enquiry" id="enquiry" class="form-control select2">
                            <option value="0">Select enquiry</option>
                            <?php foreach($enquiries as $e): ?>
                            <?php 
                                $selected = null;
                                if($e->customer_id == $quotation->customer_id){
                                    $selected = "selected='selected'";
                                }
                            ?>
                            <option value="<?= $e->id; ?>" <?= $selected; ?>><?= $e->enquiry_number .' - '.$e->customer_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quotation_number">Quotation Number</label>
                        <input 
                            type="text" 
                            name="quotation_number" 
                            class="form-control" 
                            id="quotation_number" 
                            value="<?= $quotation->quotation_number; ?>"
                            readonly="readonly"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quotation_date">Quotation Date</label>
                        <input 
                            type="text" 
                            name="quotation_date" 
                            class="form-control datepicker" 
                            id="quotation_date" 
                            value="<?= $quotation->quotation_date; ?>"
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
                            value="<?= $quotation->due_date; ?>"
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
                            value="<?= set_value('customer_name', isset($customer) ? $customer->customer_name : $quotation->customer_name); ?>" 
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
                            value="<?= set_value('contact_number', isset($customer) ? $customer->contact_number : $quotation->contact_number); ?>" 
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
                            value="<?= set_value('contact_landline', isset($customer) ? $customer->contact_landline : $quotation->contact_landline); ?>" 
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
                            value="<?= set_value('street', isset($customer) ? $customer->contact_street : $quotation->street); ?>" 
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
                            value="<?= set_value('city', isset($customer) ? $customer->contact_city : $quotation->city); ?>" 
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
                            value="<?= set_value('district', isset($customer) ? $customer->contact_district : $quotation->district); ?>" 
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
                            value="<?= set_value('state', isset($customer) ? $customer->contact_state : $quotation->state); ?>" 
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
                            value="<?= set_value('pincode', isset($customer) ? $customer->contact_pincode : $quotation->pincode); ?>" 
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
                            value="<?= set_Value('area', isset($customer) ? $customer->contact_area : $quotation->area); ?>" 
                            <?php if(isset($customer)) echo "readonly" ?> 
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="1" class="form-control"><?= $quotation->remarks; ?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <select name="currency" id="currency" class="form-control">
                            <option value="0">Select currency</option>
                            <?php foreach($currency as $c): ?>
                                <?php
                                    $selected = null;
                                    if($c->id == $quotation->currency_id){
                                        $selected = "selected='selected'";
                                    }    
                                ?>
                            <option value="<?= $c->id; ?>" <?= $selected; ?>><?= $c->symbol .' - '. $c->code; ?></option>
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
                                <?php 
                                    $selected = null;
                                    if($s->id == $quotation->status){
                                        $selected="selected='selected'";
                                    }    
                                ?>
                            <option value="<?= $s->id; ?>" <?= $selected; ?>><?= $s->status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="product-table">
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
                    <?php static $index = 1; foreach($quotation_items as $i): ?>
                        <tr>
                            <td>
                                <select name="product[]" id="product_<?= $index; ?>" class="form-control" onChange="updateModel(<?= $index; ?>)"> 
                                <?php foreach($products as $p): ?>
                                    <?php  $selected = null ?>   
                                    <?php   if ($p->id == $i->product_id): 
                                                $selected = "selected='selected'";
                                            endif;
                                    ?>
                                    <option value="<?= $p->id; ?>" <?= $selected; ?>><?= $p->name; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="product_model[]" id="product_model_<?= $index;?>" class="form-control">
                                    <?php foreach($product_models as $p): ?>
                                        <?php  $selected = null ?>   
                                        <?php   if ($p->id == $i->product_model_id): 
                                                    $selected = "selected='selected'";
                                                endif;
                                        ?>
                                        <option value="<?= $p->id; ?>" <?= $selected; ?>><?= $p->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <textarea name="description[]" id="description" cols="30" rows="1" class="form-control"><?= $i->description; ?></textarea>
                            </td>
                            <td>
                                <textarea name="specification[]" id="specification" cols="30" rows="1" class="form-control"><?= $i->specification; ?></textarea>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="quantity[]" value="<?= $i->quantity; ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="unit_rate[]" value="<?= $i->unit_rate; ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="amount[]" value="<?= $i->amount; ?>" readonly="readonly">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" id="delete-button"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $index++; endforeach; ?>
                        <input type="hidden" name="index" id="index" value="<?= $index; ?>">
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
                                value="<?= $quotation->grand_total; ?>"
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
                                value="<?= $quotation->discount; ?>"
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
                                value="<?= $quotation->grand_total; ?>"
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

        $("#enquiry").change(function(){
            var enquiry = parseInt($(this).val());
            if(enquiry > 0){
                $.ajax({
                    type:'GET',
                    url:`<?= base_url(); ?>/enquiry/${enquiry}/get-enquiry`,
                    data:{'enquiry':enquiry},
                    success:function(response){
                        var options='';
                        data = JSON.parse(response);
                        $("#customer-name").val(data.customer_name).prop('readonly', 'readonly');
                        $("#contact-number").val(data.contact_number).prop('readonly', 'readonly');
                        $("#contact-landline").val(data.contact_landline).prop('readonly', 'readonly');
                        $("#street").val(data.street).prop('readonly', 'readonly');
                        $("#city").val(data.city).prop('readonly', 'readonly');
                        $("#district").val(data.district).prop('readonly', 'readonly');
                        $("#state").val(data.state).prop('readonly', 'readonly');
                        $("#pincode").val(data.pincode).prop('readonly', 'readonly');
                        $("#area").val(data.area).prop('readonly', 'readonly');
                    }
                }); 
            }
            else{
                $("#customer-name").val('').prop('readonly', '');
                $("#contact-number").val('').prop('readonly', '');
                $("#contact-landline").val('').prop('readonly', '');
                $("#street").val('').prop('readonly', '');
                $("#city").val('').prop('readonly', '');
                $("#district").val('').prop('readonly', '');
                $("#state").val('').prop('readonly', '');
                $("#pincode").val('').prop('readonly', '');
                $("#area").val('').prop('readonly', '');
            }
        });

        $('#add-new-button').click(function(e){
            e.preventDefault();
            index = parseInt($("#index").val());
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