<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">service Type</li>
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
                <h5 class="card-title">Create/Edit Invoice Status
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <label for="service-type">service Type</label>
                        <input type="text" id="service-type" class="form-control" name="code">
                        <div class="invalid-feedback">
                            service type required
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
        function loadServiceType(){
            $.get("<?= site_url(); ?>api/service-type", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].type}
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
            $("#service-type").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var type = $("#service-type").val();
            if(type == ''){
                $("#service-type").addClass("is-invalid");
                $("#service-type").focus();
                return false;
            }
            else{
                $("#service-type").removeClass("is-invalid");
            }
            return [type];
        }

        loadServiceType();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/service-type/${id}`, function(response, status){
                $("#service-type").val(response.type);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [type] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/service-type/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, type:type },
                success: function(result) {
                    alert("service type details updated successfully");
                    resetForm();
                    loadServiceType();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the service type?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/service-type/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadServiceType();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [type] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/service-type`,
                type: 'POST',
                dataType: 'json',
                data:{type:type},
                success: function(result) {
                    alert("Service type details added successfully");
                    resetForm();
                    loadServiceType();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>