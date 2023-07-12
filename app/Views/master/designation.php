<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Designation</li>
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
                <h5 class="card-title">Create/Edit Designation</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm" data-id="">
                    <div class="form-group">
                        <label for="department-code">Designation</label>
                        <input type="text" id="designation" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Designation required
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
        function loadDesignation(){
            $.get("<?= site_url(); ?>api/designation", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].designation}
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
            $("#designation").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var designation = $("#designation").val();
            if(designation == ''){
                $("#designation").addClass("is-invalid");
                $("#designation").focus();
                return false;
            }
            else{
                $("#designation").removeClass("is-invalid");
            }
            return [designation];
        }

        loadDesignation();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/designation/${id}`, function(response, status){
                $("#designation").val(response.designation);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [designation] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/designation/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, designation:designation },
                success: function(result) {
                    alert("Designation details updated successfully");
                    resetForm();
                    loadDesignation();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the designation?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/designation/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadDesignation();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [designation] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/designation`,
                type: 'POST',
                dataType: 'json',
                data:{designation:designation},
                success: function(result) {
                    alert("Designation details added successfully");
                    resetForm();
                    loadDesignation();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>