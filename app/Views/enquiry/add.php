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
        <h5 class="card-title pt-2"><strong><?= $page_title; ?></strong></h5>
        <a href="<?= isset($customer) ? url_to('customer.enquiry.list', $customer->id) : url_to('enquiry.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="row">
                <?php if(!isset($customer)): ?>
                <div class="col-md-4">
                    <fieldset class="form-group row mt-4">
                        <legend class="col-form-label col-sm-6 float-sm-left pt-0"><strong>Existing Customer?</strong></legend>
                        <div class="col-sm-6">
                            <input type="radio" name="is_existing" id="existing-1" value="0" checked> No
                            <input class="ml-3" type="radio" name="is_existing" id="existing-2" value="1"> Yes
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-8">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-number">Enquiry Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="enquiry-number" 
                            name="enquiry_number" 
                            value="<?= $enquiry_number ?>" 
                            readonly 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-date">Enquiry Date</label>
                        <input 
                            type="text" 
                            class="form-control datepicker" 
                            id="enquiry-date" 
                            name="enquiry_date" 
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="0">Select Department</option>
                            <?php foreach($departments as $d): ?>
                                <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact-mode">Mode of Contact</label>
                        <select name="contact_mode" id="contact-mode" class="form-control">
                            <option value="0">Select Mode</option>
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
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Distance</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="distance" 
                            name="distance" 
                            value="<?= set_value('distance'); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="from-time">From Time</label>
                        <input 
                            type="text" 
                            class="timepicker form-control" 
                            id="from-time" 
                            name="from_time" 
                            value="<?= set_value('from_time'); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="to-time">To Time</label>
                        <input 
                            type="text" 
                            class="timepicker form-control" 
                            id="to-time" 
                            name="to_time" 
                            value="<?= set_value('to_time'); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="duration" 
                            name="duration" 
                            value="<?= set_value('duration'); ?>" 
                            oninput="duration()"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="marketing_reference">Marketing Reference</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="marketing_reference" 
                            name="marketing_reference" 
                            value="<?= set_value('marketing_reference'); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="travelling_kms">Traveling KMs</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="travelling_kms" 
                            name="travelling_kms" 
                            value="<?= set_value('travelling_kms'); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="forward_to">Forward to</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="forward_to" 
                            name="forward_to" 
                            value="<?= set_value('forward_to'); ?>" 
                        />
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
                <div class="col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"><?= set_value('remarks'); ?></textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Products</strong></h5>
                            <button class="btn btn-success float-right" id="add-new-button">
                                <i class="fa fa-plus mr-2"></i>Add Product
                            </button>
                        </div>
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped" id="product-table">
                                        <input type="hidden" name="index" id="index" value="0"/>
                                        <thead>
                                            <tr class="bg-secondary">
                                                <td>Product</td>
                                                <td>Product Model</td>
                                                <td width="50">Quantity</td>
                                                <td>Description</td>
                                                <td>Specification</td>
                                                <td width="80">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
    <script>


    $('document').ready(function() {

        $("#customer").change(function(){
            var customer = parseInt($(this).val());
            if(customer > 0){
                $.ajax({
                    type:'GET',
                    url:`<?= base_url(); ?>/customer/${customer}/get-customer`,
                    data:{'customer':customer},
                    success:function(response){
                        var options='';
                        data = JSON.parse(response);
                        $("#customer-name").val(data.customer_name).prop('readonly', 'readonly');
                        $("#contact-number").val(data.contact_number).prop('readonly', 'readonly');
                        $("#contact-landline").val(data.contact_landline).prop('readonly', 'readonly');
                        $("#street").val(data.contact_street).prop('readonly', 'readonly');
                        $("#city").val(data.contact_city).prop('readonly', 'readonly');
                        $("#district").val(data.contact_district).prop('readonly', 'readonly');
                        $("#state").val(data.contact_state).prop('readonly', 'readonly');
                        $("#pincode").val(data.contact_pincode).prop('readonly', 'readonly');
                        $("#area").val(data.contact_area).prop('readonly', 'readonly');
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

        $('input[name=is_existing]').change(function(){
            var value = parseInt($('input[name=is_existing]:checked').val());
            if(value == 1){
                $("#customer-dropdown").show();
                return;
            }
            $("#customer-dropdown").hide();
        });
        
        $('#add-new-button').click(function(e){
            e.preventDefault();
            index = parseInt($("#index").val());
            index += 1;
            var row = `<tr>
                            <td>
                                <select name="product[]" id="product_${index}" class="form-control" data-id=${index}" onChange="updateModel(${index})">
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
                                <input type="text" class="form-control" name="quantity[]">
                            </td>
                            <td>
                                <textarea name="description[]" id="description" cols="30" rows="1" class="form-control"></textarea>
                            </td>
                            <td>
                                <textarea name="specification[]" id="specification" cols="30" rows="1" class="form-control"></textarea>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" id="delete-button"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
            $("#product-table").append(row);
            $("#index").val(index);
        });

        $("#duration").focus(function(){
            var timeFrom = $('#from-time').data('timepicker');
            var timeTO = $('#to-time').data('timepicker');
            debugger;
            var timeFromHH = (timeFrom.hour == 12 && timeFrom.meridian == "AM") ? 0 :
                (timeFrom.hour != 12 && timeFrom.meridian == "PM") ? timeFrom.hour + 12 :
                timeFrom.hour;
            var timeTOHH = (timeTO.hour == 12 && timeTO.meridian == "AM") ? 0 :
                (timeTO.hour != 12 && timeTO.meridian == "PM") ? timeTO.hour + 12 :
                timeTO.hour;

            var timeFromMM = timeFromHH * 60 + timeFrom.minute;
            var timeTOMM = timeTOHH * 60 + timeTO.minute;

            var diffMM = Math.abs(timeTOMM - timeFromMM);
            var diff = Math.floor(diffMM / 60) + "hrs " + (diffMM % 60) + "mins";
            
            $("#duration").text(diff);
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

    function duration() {
        
    }
    </script>
<?= $this->endSection(); ?>