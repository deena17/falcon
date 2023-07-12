<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Permission</li>
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
                <h5 class="card-title">Add/Edit Permission</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" id="code" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Permission code required
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name">
                        <div class="invalid-feedback">
                            Permission name required
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
        function loadPermission(){
            $.get("<?= site_url(); ?>api/permission", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].name}
                            <div class="float-right">
                                <a href="JavaScript:void(0)" class="btn btn-primary btn-sm" data-id=${response.data[i].id}>
                                    <i class="fa fa-pencil-alt mr-2"></i>Edit</a>
                                <a href="JavaScript:void(0)" class="btn btn-danger btn-sm" data-id=${response.data[i].id}>
                                    <i class="fa fa-trash mr-2"></i>Delete</a>
                            </div>
                        </li>
                    `
                }
                $(".list-group").html(listItems);
            });
        }

        function resetForm(){
            $("#code").val('');
            $("#name").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var code = $("#code").val();
            var name = $("#name").val();
            if(code == ''){
                $("#code").addClass("is-invalid");
                $("#code").focus();
                return false;
            }
            else{
                $("#code").removeClass("is-invalid");
            }
            if(name == ''){
                $("#name").addClass("is-invalid");
                $("#name").focus();
                return false;
            }
            else{
                $("#name").removeClass("is-invalid");
            }
            
            return [ code, name];
        }

        loadPermission();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/permission/${id}`, function(response, status){
                $("#code").val(response.code);
                $("#name").val(response.name);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [ code, name ] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/currency/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, code:code, name:name },
                success: function(result) {
                    alert("Permission details updated successfully");
                    resetForm();
                    loadPermission();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the permission?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/permission/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadPermission();
                    }
                });
                loadPermission();
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [code, name] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/permission`,
                type: 'POST',
                dataType: 'json',
                data:{ code:code, name:name },
                success: function(result) {
                    alert("Permission details added successfully");
                    resetForm();
                    loadPermission();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>