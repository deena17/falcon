<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Payment Method</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>


<?= $this->section('title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-7">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title"><?= $pageTitle; ?></h5>
            </div>
            <div class="card-body">
                <ul class="list-group">

                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title">Create/Edit Payment Method
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <label for="method">Payment Method</label>
                        <input type="text" id="method" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Payment method required
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="JavaScript:void(0)" class="btn btn-success">Save</a>
                        <button class="btn btn-warning" id="reset-button">Reset</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $("document").ready(function(){
        function loadPaymentMethod(){
            $.get("<?= site_url(); ?>api/payment-method", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].method}
                            <div class="float-right">
                                <a href="JavaScript:void(0)" class="btn btn-primary" data-id=${response.data[i].id}>
                                    <i class="fa fa-pencil-alt mr-2"></i>Edit</a>
                                <a href="JavaScript:void(0)" class="btn btn-danger" data-id=${response.data[i].id}>
                                    <i class="fa fa-trash mr-2"></i>Delete</a>
                            </div>
                        </li>
                    `
                }
                $(".list-group").html(listItems);
            });
        }

        function resetForm(){
            $("#method").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var method = $("#method").val();
            if(method == ''){
                $("#method").addClass("is-invalid");
                $("#method").focus();
                return false;
            }
            else{
                $("#method").removeClass("is-invalid");
            }
            return [method];
        }

        loadPaymentMethod();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/payment-method/${id}`, function(response, status){
                $("#method").val(response.method);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [method] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/payment-method/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, method:method },
                success: function(result) {
                    alert("Payment details updated successfully");
                    resetForm();
                    loadPaymentMethod();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the payment method?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/payment-method/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadPaymentMethod();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [method] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/payment-method`,
                type: 'POST',
                dataType: 'json',
                data:{method:method},
                success: function(result) {
                    alert("Payment method details added successfully");
                    resetForm();
                    loadPaymentMethod();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>