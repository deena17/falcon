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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-number" class="requiredField">Enquiry Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="enquiry-number" 
                            name="enquiry_number" 
                            value="<?= $enquiry->enquiry_number; ?>" 
                            readonly 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-date" class="requiredField">Enquiry Date</label>
                        <input 
                            type="text" 
                            class="form-control datepicker" 
                            id="enquiry-date" 
                            name="enquiry_date" 
                            value="<?= $enquiry->enquiry_date?>"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department" class="requiredField">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="0">Select Department</option>
                            <?php foreach($departments as $d): ?>
                                <?php 
                                    $selected = null;
                                    $id = $enquiry->department_id;
                                    if($id == $d->id){
                                        $selected='selected="selected"';
                                    }    
                                ?>
                                <option value="<?= $d->id; ?>" <?= $selected; ?>><?= $d->name; ?></option>
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
                            readonly="<?php if(isset($customer)) echo "readonly" ?> "
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
                            readonly="<?php if(isset($customer)) echo "readonly" ?>"  
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
                            readonly="<?php if(isset($customer)) echo "readonly" ?>" 
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">Distance</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="distance" 
                            name="distance" 
                            value="<?= set_value('distance', $enquiry->distance); ?>" 
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
                            value="<?= set_value('from_time', $enquiry->from_time); ?>" 
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
                            value="<?= set_value('to_time', $enquiry->to_time); ?>" 
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
                            value="<?= set_value('duration', $enquiry->duration); ?>" 
                            readonly="readonly"
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
                            value="<?= set_value('marketing_reference', $enquiry->marketing_reference); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="traveling_kms">Travelling KMs</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="traveling_kms" 
                            name="travelling_kms" 
                            value="<?= set_value('travelling_kms', $enquiry->travelling_kms); ?>" 
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
                            value="<?= set_value('forward_to', $enquiry->forward_to); ?>" 
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Select status</option>
                            <?php foreach($status as $s): ?>
                                <?php 
                                    $id = $enquiry->status;
                                    $selected = null;
                                    if($id == $s->id){
                                        $selected = 'selected="selected"';
                                    }
                                ?>
                                <option value="<?= $s->id; ?>" <?= $selected; ?>><?= $s->status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"><?= $enquiry->remarks; ?></textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Products</strong></h5>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php static $index=1; foreach($enquiry_products as $ep): ?>
                                            <tr>
                                                <td>
                                                    <select name="product[]" id="product_<?= $index; ?>" class="form-control" onChange="updateModel(<?= $index; ?>)"> 
                                                    <?php foreach($products as $p): ?>
                                                        <?php  $selected = null ?>   
                                                        <?php   if ($p->id == $ep->product_id): 
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
                                                            <?php   if ($p->id == $ep->product_model_id): 
                                                                        $selected = "selected='selected'";
                                                                    endif;
                                                            ?>
                                                            <option value="<?= $p->id; ?>" <?= $selected; ?>><?= $p->name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="quantity[]" value="<?= $ep->quantity; ?>">
                                                </td>
                                                <td>
                                                    <textarea name="description[]" id="description" cols="30" rows="1" class="form-control"><?= $ep->description; ?></textarea>
                                                </td>
                                                <td>
                                                    <textarea name="specification[]" id="specification" cols="30" rows="1" class="form-control"><?= $ep->specification; ?></textarea>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
    <script>
    $('document').ready(function() {
        $('#name').prop('readonly', true);
        $('#phone').prop('readonly', true);
        $('#landline').prop('readonly', true);
        $('#street').prop('readonly', true);
        $('#city').prop('readonly', true);
        $('#district').prop('readonly', true);
        $('#state').prop('readonly', true);
        $('#pincode').prop('readonly', true);

        $('#to-time').blur(function(){
            var from_time = $("#from-time").val();
            var to_time = $("#to-time").val();
            var duration = ( new Date("1970-1-1 " + to_time) - new Date("1970-1-1 " + from_time))
            alert(to_time);
        });

        $('#add-new-button').click(function(e){
            e.preventDefault();
            var index = parseInt($("#index").val());
            index += 1;
            var row = `<tr>
                            <td>
                                <select name="product[]" id="product_${index}" class="form-control" data-id=${index}">
                                    <option value="1">Flat Knitting</option>
                                    <option value="2">Circular Knitting</option>
                                    <option value="3">Embroidery</option>
                                </select>
                            </td>
                            <td>
                                <select name="product_model[]" id="product_model_${index}" class="form-control">
                                    <option value="5">Welcome to Golden Falcon</option>
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
        });

        $("#product").change(function(){
            var productId = $(this).val();
            var index = $(this).data('id');
            alert(index);
            if(productId){
                $.ajax({
                    type:'POST',
                    url:`<?= base_url(); ?>/master/product/${productId}/models`,
                    data:{'product':product_id},
                    success:function(result){
                        console.log(result);
                        
                    }
                }); 
            }else{
                $('#product-model').html('<option value="">Model</option>');
            }
        });


    });

    // function setModel(index){
    //     var productId = $(`product_${index}`).val();
    //     if(productId){
    //         $.ajax({
    //             type:'POST',
    //             url:`<?= base_url(); ?>/master/product/${productId}/models`,
    //             data:{'product':product_id},
    //             success:function(result){
    //                 console.log(result);
                    
    //             }
    //         }); 
    //     }else{
    //         $('#product-model').html('<option value="">Model</option>');
    //     }
    // }

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