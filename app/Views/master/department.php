<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Department</li>
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
                <h5 class="card-title">Create/Edit Department</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm" data-id="">
                    <div class="form-group">
                        <label for="department-code">Department Code</label>
                        <input type="text" id="department-code" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Department code required
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department-name">Department Name</label>
                        <input type="text" id="department-name" class="form-control" name="name">
                        <div class="invalid-feedback">
                            Department name required
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
        function loadDepartment(){
            $.get("<?= site_url(); ?>api/department", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].code}<span class="mx-3">-</span>
                            ${response.data[i].name}
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
            $("#department-code").val('');
            $("#department-name").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var code = $("#department-code").val();
            var name = $("#department-name").val();
            if(code == ''){
                $("#department-code").addClass("is-invalid");
                $("#department-code").focus();
                return false;
            }
            else{
                $("#department-code").removeClass("is-invalid");
            }
            if(name == ''){
                $("#department-name").addClass("is-invalid");
                $("#department-name").focus();
                return false;
            }
            else{
                $("#department-name").removeClass("is-invalid");
            }
            return [code, name];
        }

        loadDepartment();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/department/${id}`, function(response, status){
                $("#department-code").val(response.code);
                $("#department-name").val(response.name);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
                //var inputId = `<input type="hidden" value=${response.id} />`;
                $("#myForm").data("id", response.id);
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [code, name] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/department/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, code:code, name:name},
                success: function(result) {
                    alert("Department details updated successfully");
                    resetForm();
                    loadDepartment();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the department?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/department/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadDepartment();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [code, name] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/department`,
                type: 'POST',
                dataType: 'json',
                data:{code:code, name:name},
                success: function(result) {
                    alert("Department details added successfully");
                    resetForm();
                    loadDepartment();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>