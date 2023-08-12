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
        <a href="<?= isset($customer) ? url_to('customer.enquiry.list', $customer->id) : url_to('enquiry.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_product">Product<span class="asteriskField">*</span></label>
                        <select name="product" class="form-control" id="id_product">
                            <option value="" selected>---------</option>
                            <option value="1">ZOJE Falcon</option>
                            <option value="2">LKM</option>
                            <option value="3">Falcon</option>
                            <option value="4">FZY</option>
                            <option value="5">Sulfet</option>
                            <option value="6">Falcon Eye</option>
                            <option value="7">Golden Sharp</option>
                            <option value="8">Golden Beamlight</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_product_model">Product model<span class="asteriskField">*</span></label>
                        <select name="product_model" class="form-control" id="id_product_model">
 
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_dia">Dia</label>
                        <input 
                            type="text" 
                            name="dia" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_dia"
                            value="<?= set_value('dia');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_guage">Guage</label>
                        <input 
                            type="text" 
                            name="guage" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_guage"
                            value="<?= set_value('guage');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_number_of_feeders">Number of feeders<span class="asteriskField">*</span></label>
                        <input 
                            type="number" 
                            name="number_of_feeders" 
                            class="form-control" 
                            id="id_number_of_feeders"
                            value="<?= set_value('number_of_feeders');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_motor_model">Main motor model</label>
                        <input 
                            type="text" 
                            name="main_motor_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_motor_model"
                            value="<?= set_value('main_motor_model');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_driver_model">Main driver model</label>
                        <input 
                            type="text" 
                            name="main_driver_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_driver_model"
                            value="<?= set_value('main_driver_model');?>"
                        />
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_control_panel_model">Control panel model</label>
                        <input 
                            type="text" 
                            name="control_panel_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_control_panel_model"
                            value="<?= set_value('control_panel_model');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_take_up_type">Take up type</label>
                        <input 
                            type="text" 
                            name="take_up_type" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_take_up_type"
                            value="<?= set_value('take_up_type');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_storage_type">Storage type</label>
                        <input 
                            type="text" 
                            name="storage_type" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_storage_type"
                            value="<?= set_value('storage_type');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_quality_wheel">Quality wheel</label>
                        <input 
                            type="text" 
                            name="quality_wheel" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_quality_wheel"
                            value="<?= set_value('quality_wheel');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_storage_belt_size">Storage belt size</label>
                        <input 
                            type="text" 
                            name="storage_belt_size" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_storage_belt_size"
                            value="<?= set_value('storage_belt_size');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_motor_belt_size">Main motor belt size</label>
                        <input 
                            type="text" 
                            name="main_motor_belt_size" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_motor_belt_size"
                            value="<?= set_value('main_motor_belt_size');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_quality_wheel_gear_type">Quality wheel gear type</label>
                        <input 
                            type="text" 
                            name="quality_wheel_gear_type" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_quality_wheel_gear_type"
                            value="<?= set_value('quality_wheel_gear_type');?>"
                        />
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_quality_wheel_belt_size">Quality wheel belt size</label>
                        <input 
                            type="text" 
                            name="quality_wheel_belt_size" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_quality_wheel_belt_size"
                            value="<?= set_value('quality_wheel_belt_size');?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_tools_and_accessories">Tools and accessories</label>
                        <input 
                            type="text" 
                            name="tools_and_accessories" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_tools_and_accessories"
                            value="<?= set_value('tools_and_accessories');?>"
                        />
                    </div>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-success" value="Sumbit">
                    <input type="reset" class="btn btn-warning" value="Reset">
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
    <script>
    $('document').ready(function() {
        $("#id_product").change(function(){
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