<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Call</li>
    <li class="breadcrumb-item active">Delete</li>
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
                        <input type="hidden" name="id" value="<?= $enquiry->id; ?>">
                        <p>Are you sure want to delete enquiry <strong><?= $enquiry->enquiry_number; ?></strong> of <?= $customer->customer_name; ?>?</p>
                        <input type="submit" class="btn btn-danger" value="Yes! Delete">
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