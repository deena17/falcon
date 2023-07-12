<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Business Type</li>
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
            <div class="card-body p-2">
                <ul class="list-group">

                </ul>
            </div>
        </div>    
    </div>
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title">Create/Edit Businesstype</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <input type="text" id="business-type" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Business type required
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
        function loadBusinessType(){
            $.get("<?= site_url(); ?>api/business-type", function(response, status){
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
            $("#business-type").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var type = $("#business-type").val();
            if(type == ''){
                $("#business-type").addClass("is-invalid");
                $("#business-type").focus();
                return false;
            }
            else{
                $("#business-type").removeClass("is-invalid");
            }
            return [type];
        }

        loadBusinessType();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/business-type/${id}`, function(response, status){
                $("#business-type").val(response.type);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [type] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/business-type/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, type:type },
                success: function(result) {
                    alert("Business type details updated successfully");
                    resetForm();
                    loadBusinessType();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the business type?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/business-type/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadBusinessType();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [type] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/business-type`,
                type: 'POST',
                dataType: 'json',
                data:{type:type},
                success: function(result) {
                    alert("Business type details added successfully");
                    resetForm();
                    loadBusinessType();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>