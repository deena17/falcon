<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Enquiry</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<form method="post" action="">
    <div class="card">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
            <a href="<?= isset($customer) ? url_to('customer.enquiry.list', $customer->id) : url_to('enquiry.list'); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
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
                        <label for="id_bed_width">Bed width<span class="asteriskField">*</span></label>
                        <input 
                            type="text" 
                            name="bed_width" 
                            maxlength="50" 
                            class="form-control" 
                            id="id_bed_width"
                            value="<?= set_value('bed_width'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_number_of_system">Number of system<span class="asteriskField">*</span></label>
                        <input 
                            type="number" 
                            name="number_of_system" 
                            class="form-control" 
                            id="id_number_of_system"
                            value="<?= set_value('number_of_system'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_number_of_heads">Number of heads<span class="asteriskField">*</span></label>
                        <input 
                            type="number" 
                            name="number_of_heads" 
                            class="form-control" 
                            id="id_number_of_heads"
                            value="<?= set_value('number_of_heads'); ?>"
                        />              
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_control_system">Control system<span class="asteriskField">*</span></label>
                        <input 
                            type="text" 
                            name="control_system" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_control_system"
                            value="<?= set_value('control_system'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_display_type">Display type</label>
                        <input 
                            type="text" 
                            name="display_type" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_display_type"
                            value="<?= set_value('display_type'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_smps_type">SMPS type</label>
                        <input 
                            type="text" 
                            name="smps_type" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_smps_type"
                            value="<?= set_value('smps_type'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_roller_driver_type">Main roller driver type</label>
                        <input 
                            type="text" 
                            name="main_roller_driver_type" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_main_roller_driver_type"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_tools_and_accessories">Tools and accessories</label>
                        <input 
                            type="text" 
                            name="tools_and_accessories" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_tools_and_accessories"
                            value="<?= set_value('tools_and_accessories'); ?>"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-warning">Hardware Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_servo_motor_model">Main servo motor model</label>
                        <input 
                            type="text" 
                            name="main_servo_motor_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_servo_motor_model"
                            value="<?= set_value('main_servo_motor_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_main_roller_driver_model">Main roller driver model</label>
                        <input 
                            type="text" 
                            name="main_roller_driver_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_roller_driver_model"
                            value="<?= set_value('main_roller_driver_model'); ?>"
                        />
                    </div>   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_racing_motor_drive_model">Racing motor drive model</label>
                        <input 
                            type="text" 
                            name="racing_motor_drive_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_racing_motor_drive_model"
                            value="<?= set_value('racing_motor_drive_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_racing_servo_motor_model">Racing servo motor model</label>
                        <input 
                            type="text" 
                            name="racing_servo_motor_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_racing_servo_motor_model"
                            value="<?= set_value('racing_servo_motor_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_mother_board_model">Mother board model</label>
                        <input 
                            type="text" 
                            name="mother_board_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_mother_board_model"
                            value="<?= set_value('mother_board_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_head_board_model">Head board model</label>
                        <input 
                            type="text" 
                            name="head_board_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head_board_model"
                            value="<?= set_value('head_board_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_head_base_board_model">Head base board model</label>
                        <input 
                            type="text" 
                            name="head_base_board_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head_base_board_model"
                            value="<?= set_value('head_base_board_model'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_display_board">Display board</label>
                        <input 
                            type="text" 
                            name="display_board" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_display_board"
                            value="<?= set_value('display_board'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_invertor_model">Invertor model</label>
                        <input 
                            type="text" 
                            name="invertor_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_invertor_model"
                            value="<?= set_value('invertor_model'); ?>"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-success">Software Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_machine_configuration">Machine configuration</label>
                        <input 
                            type="text" 
                            name="machine_configuration" 
                            maxlength="1000" 
                            class="form-control" 
                            id="id_machine_configuration"
                            value="<?= set_value('machine_configuration'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_system_information">System information</label>
                        <input 
                            type="text" 
                            name="system_information" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_system_information"
                            value="<?= set_value('system_information'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_hardware">Hardware</label>
                        <input 
                            type="text" 
                            name="hardware" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_hardware"
                            value="<?= set_value('hardware'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_master">Master</label>
                        <input 
                            type="text" 
                            name="master" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_master"
                            value="<?= set_value('master'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_compile">Compile</label>
                        <input 
                            type="text" 
                            name="compile" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_compile"
                            value="<?= set_value('compile'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_slave_version">Slave version</label>
                        <input 
                            type="text" 
                            name="slave_version" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_slave_version"
                            value="<?= set_value('slave_version'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_head1">Head1</label>
                        <input 
                            type="text" 
                            name="head1" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head1"
                            value="<?= set_value('head1'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_head2">Head2</label>
                        <input 
                            type="text" 
                            name="head2" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head2"
                            value="<?= set_value('head2'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_head3">Head3</label>
                        <input 
                            type="text" 
                            name="head3" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head3"
                            value="<?= set_value('head3'); ?>"
                        />
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_upper">Upper</label>
                        <input 
                            type="text" 
                            name="upper" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_upper"
                            value="<?= set_value('upper'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_middle">Middle</label>
                        <input 
                            type="text" 
                            name="middle" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_middle"
                            value="<?= set_value('middle'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_left_down">Left down</label>
                        <input 
                            type="text" 
                            name="left_down" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_left_down"
                            value="<?= set_value('left_down'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_right_down">Right down</label>
                        <input 
                            type="text" 
                            name="right_down" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_right_down"
                            value="<?= set_value('right_down'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_middle_down">Middle down</label>
                        <input 
                            type="text" 
                            name="middle_down" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_middle_down"
                            value="<?= set_value('middle_down'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_type">Type</label>
                        <input 
                            type="text" 
                            name="type" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_type"
                            value="<?= set_value('type'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_hardware_version">Hardware version</label>
                        <input 
                            type="text" 
                            name="hardware_version" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_hardware_version"
                            value="<?= set_value('hardware_version'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_boot_loader_version">Boot loader version</label>
                        <input 
                            type="text" 
                            name="boot_loader_version" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_boot_loader_version"
                            value="<?= set_value('boot_loader_version'); ?>"
                        />
                    </div>
                </div>
            </div>    
            <div class="">
                <input type="submit" class="btn btn-success" value="Sumbit">
                <input type="reset" class="btn btn-warning" value="Reset">
            </div>
        </div>
    </div>
</form>
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