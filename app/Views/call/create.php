<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Call</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>
<?php $validation = \Config\Services::validation(); ?>
<?php print_r($validation->listErrors());?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
                    <div class="float-right">
                        <a href="<?= url_to('customer.call.list', $customer->id) ?>" class="btn btn-info">
                            <i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_department" class="requiredField">Department</label>
                                    <select name="department" id="id_department" class="form-control">
                                        <option value="0">Select Department</option>
                                        <?php foreach ($department as $d) : ?>
                                        <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="call-type" class="requiredField">Call Type</label>
                                <select name="call_type" id="call-type" class="form-control">
                                    <option value="0">Select Type</option>
                                    <?php foreach ($callType as $t) : ?>
                                    <option value="<?= $t['id']; ?>"><?= $t['type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_call_number">Call Number</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="id_call_number" 
                                        name="call_number" 
                                        readonly="readonly"
                                        value="<?= $call_number; ?>"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_call_date">Call Date</label>
                                    <input 
                                        type="text" 
                                        class="datepicker form-control <?php if ($validation->getError('call_date')) : ?>is-invalid<?php endif ?>" 
                                        id="id_call_date"
                                        name="call_date" 
                                        value="<?= set_value('call_date'); ?>"
                                    />
                                    <?php if ($validation->getError('call_date')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('call_date') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_call_time">Call Time</label>
                                    <input 
                                        type="text" 
                                        class="timepicker form-control <?php if ($validation->getError('call_time')) : ?>is-invalid<?php endif ?>" 
                                        id="id_call_time" 
                                        name="call_time"
                                        value="<?= set_value('call_time'); ?>"
                                    />
                                    <?php if ($validation->getError('call_time')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('call_time') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_contact_person">Contact</label>
                                    <select name="contact_person" id="id_contact_person" class="form-control">
                                        <option value="0">Select Contact</option>
                                        <?php foreach($contacts as $c): ?>
                                            <option value="<?= $c->id.'~'.$c->name; ?>"><?= $c->name; ?></option>
                                        <?php endforeach; ?> 
                                        <option value="o">Other</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="display:none">
                                <div class="form-group">
                                    <label for="id_contact_person1">Contact Person</label>
                                    <input 
                                        type="text" 
                                        class="form-control <?php if($validation->getError('contact_person1')):?>is-invalid<?php endif; ?>" 
                                        id="id_contact_person1" 
                                        name="contact_person1"
                                        value="<?= set_value('contact_person1'); ?>"
                                    />
                                    <?php if ($validation->getError('contact_person1')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('contact_person1') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_contact_number">Contact Number</label>
                                    <input type="text" class="form-control" id="id_contact_number" name="contact_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_product">Product</label>
                                    <select name="product" id="product" class="form-control">
                                        <option value="0">Select Product</option>
                                        <?php foreach($products as $p): ?>
                                            <option value="<?= $p->id; ?>"><?= $p->name; ?></option>
                                        <?php endforeach; ?>    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_product_model">Product Model</label>
                                    <select name="product_model" id="id_product_model" class="form-control">
                                        <option value="0">Select Model</option>
 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_installation_date">Installation Date</label>
                                    <input 
                                        type="text" 
                                        class="datepicker form-control" 
                                        id="id_installation_date" 
                                        name="installation_date"
                                        value="<?= set_value('installation_date'); ?>"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_service_type">Service Type</label>
                                    <select name="service_type" id="id_service_type" class="form-control">
                                        <option value="0">Select type</option>
                                        <?php foreach($service_type as $t): ?>
                                        <option value="<?= $t->id; ?>"><?= $t->type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_expiry_date">Warranty/AMC Expiry Date</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="id_expiry_date" 
                                        name="expiry_date" 
                                        readonly="readonly" 
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_complaint_nature">Nature of Complaint</label>
                                    <input 
                                        type="text" 
                                        class="form-control <?php if ($validation->getError('complaint_nature')) : ?>is-invalid<?php endif ?>" 
                                        id="id_complaint_nature" 
                                        name="complaint_nature"
                                        value="<?= set_value('complaint_nature'); ?>"
                                    />
                                    <?php if ($validation->getError('complaint_nature')) : ?>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('complaint_nature') ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label><br>
                                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="ml-2">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
    <script>
        $(function(){
            $('#id_contact_person').change(function(){
                var person = $(this).val();
                const myArray = person.split("~");
                if(person === 'o'){
                    $('#id_contact_person1').parent().parent().toggle();
                    $('#id_contact_number').val('');
                }
                else{
                    $('#id_contact_person1').parent().parent().hide();
                    $.ajax({
                        url: `<?= base_url(); ?>/customer/${myArray[0]}/contact/detail`,
                        data: {id:person},
                        method: 'post',
                        dataType: 'json',
                        success: function(response){
                            $("#id_contact_number").val(response.phone)
                        }
                    })
                }
            });
            $('#id_service_type').change(function(){
                var type = $(this).val();
                if(type == 3){
                    $('#id_expiry_date').prop('readonly', false);
                }
                else{
                    $('#id_expiry_date').prop('readonly', true);
                }
            });
            
            $("#product").change(function(){
                var productId = $(this).val();
                if(productId){
                    $.get(`<?= site_url(); ?>/master/product/${productId}/models`, function(response, status){
                        var options = '';
                        data = JSON.parse(response);
                        for(i=0; i<data.length; i++){
                            options += `<option value="${data[i].id}">${data[i].name}</option>`
                        }
                        $("#id_product_model").html(options);
                    }); 
                }
            });
        });
    </script>
<?= $this->endSection(); ?>