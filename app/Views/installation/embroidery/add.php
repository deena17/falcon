<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Enquiry</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<form method="POST"  enctype="multipart/form-data">
    <div class="card">
        <div class="card-header py-2">
            <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
            <a href="<?= isset($customer) ? url_to('customer.enquiry.list', $customer->id) : url_to('enquiry.list'); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_product">Product<span class="asteriskField">*</span></label>
                        <select name="product" class="form-control" required id="id_product">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_product_model">Product model<span class="asteriskField">*</span></label>
                        <select name="product_model" class="form-control" required id="id_product_model">
                            <option value="" selected>---------</option>
                            <option value="1">ZJC-101E*14G*52&quot;</option>
                            <option value="2">ZJC-121E*14G*60&quot;</option>
                            <option value="3">ZJC-121P*14G*60&quot;</option>
                            <option value="4">ZJC-121E*14G*80&quot;</option>
                            <option value="5">ZJC-121P*14G*80&quot;</option>
                            <option value="6">ZJC-211E*14G*52&quot;</option>
                            <option value="7">ZJC-221E*14G*60&quot;</option>
                            <option value="8">ZJC-221P*14G*60&quot;</option>
                            <option value="9">ZJC-221E*14G*80&quot;</option>
                            <option value="10">ZJC-221P*14G*80&quot;</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_software">Software</label>
                        <input 
                            type="text" 
                            name="software" 
                            maxlength="25" 
                            class="form-control" 
                            id="id_software"
                            value="<?= set_value('software'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-12">
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
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-warning">Chenille Embroidery Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_main_motor_drive">Main motor drive</label>
                        <input 
                            type="text" 
                            name="main_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_motor_drive"
                            value="<?= set_value('main_motor_drive'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_needle_bar_rotating_motor_drive">Needle bar rotating motor drive</label>
                        <input 
                            type="text" 
                            name="needle_bar_rotating_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_needle_bar_rotating_motor_drive"
                            value="<?= set_value('needle_bar_rotating_motor_drive'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_looper_up_down_motor_drive">Looper up down motor drive</label>
                        <input 
                            type="text" 
                            name="looper_up_down_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_looper_up_down_motor_drive"
                            value="<?= set_value('looper_up_down_drive'); ?>"
                        />
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_looper_gear_rotating_motor_drive">Looper gear rotating motor drive</label>
                        <input 
                            type="text" 
                            name="looper_gear_rotating_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_looper_gear_rotating_motor_drive"
                            value="<?= set_value('looper_gear_rotating_motor_drive'); ?>"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_head_card">Head card</label>
                        <input 
                            type="text" 
                            name="head_card" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head_card"
                            value="<?= set_value('head_card'); ?>"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-success">Flat Embroidery Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_main_servo_motor_model">Main servo motor model</label>
                        <input 
                            type="text" 
                            name="main_servo_motor_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_main_servo_motor_model"
                            value="<?= set_value('main_servo_motor_model');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_head_board_model">Head board model</label>
                        <input 
                            type="text" 
                            name="head_board_model" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_head_board_model"
                            value="<?= set_value('head_board_model');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_trimming_motor_drive">Trimming motor drive</label>
                        <input 
                            type="text" 
                            name="trimming_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_trimming_motor_drive"
                            value="<?= set_value('trimming_motor_drive');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_mother_board">Mother board</label>
                        <input 
                            type="text" 
                            name="mother_board" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_mother_board"
                            value="<?= set_value('mother_board');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_power_card">Power card</label>
                        <input 
                            type="text" 
                            name="power_card" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_power_card"
                            value="<?= set_value('power_card');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_single_sequence_card">Single sequence card</label>
                        <input 
                            type="text" 
                            name="single_sequence_card" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_single_sequence_card"
                            value="<?= set_value('single_sequenct_card');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_dual_sequence_card">Dual sequence card</label>
                        <input 
                            type="text" 
                            name="dual_sequence_card" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_dual_sequence_card"
                            value="<?= set_value('dual_sequence_card');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_quad_sequence_card">Quad sequence card</label>
                        <input 
                            type="text" 
                            name="quad_sequence_card" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_quad_sequence_card"
                            value="<?= set_value('quad_sequence_card');?>"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_xy_motor_drive">Xy motor drive </label>
                        <input 
                            type="text" 
                            name="xy_motor_drive" 
                            maxlength="255" 
                            class="form-control" 
                            id="id_xy_motor_drive"
                            value="<?= set_value('xy_motor_drive');?>"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_tools_and_accessories">Tools and accessories</label>
                        <input 
                            type="text" 
                            name="tools_and_accessories" 
                            maxlength="100" 
                            class="form-control" 
                            id="id_tools_and_accessories"
                            value="<?= set_value('ools_and_accessories');?>"
                        />
                    </div>
                </div>
            </div>
            <input type="submit" name="" value="Save" class="btn btn-success">
            <input type="reset" name="" value="Reset" class="btn btn-warning">
        </div>
    </div>
</form>
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