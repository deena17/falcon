<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Permission</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card">
    <div class="card-header py-2">
        <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="user">User</label>
                <select name="user" id="user" class="form-control">
                    <option value="0">Select user</option>
                    <option value="">Deenadayalan</option>
                </select>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="bg-secondary">
                    <tr>
                        <td>Module</td>
                        <td>Add</td>
                        <td>View</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Others</td>
                        <td>Check All <input type="checkbox" id="checkall" onclick="checkAll(this)"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($permissions as $k => $v) : ?>
                    <tr>
                        <td width="600"><input type="hidden" name="module" value="<?= $k; ?>"><?= $v; ?></td>
                        <td><input type="checkbox" name="<?= $k; ?>_add" id="<?= $k; ?>_add"></td>
                        <td><input type="checkbox" name="<?= $k; ?>_view" id="<?= $k; ?>_view"></td>
                        <td><input type="checkbox" name="<?= $k; ?>_edit" id="<?= $k; ?>_edit"></td>
                        <td><input type="checkbox" name="<?= $k; ?>_delete" id="<?= $k; ?>_delete"></td>
                        <td><input type="checkbox" name="<?= $k; ?>_others" id="<?= $k; ?>_others"></td>
                        <td><input type="checkbox" name="<?= $k; ?>_check_all" value="<?= $k; ?>"
                                onclick='handleClick(this)'></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <input type="submit" value="Save" class="btn btn-success px-4">
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
function checkAll(cb) {
    if (cb.checked) {
        $('input[type=checkbox]').prop('checked', true)
    } else {
        $('input[type=checkbox]').prop('checked', false)
    }
}

function handleClick(cb) {
    if (cb.checked) {
        $('#' + cb.value + '_add').prop('checked', true);
        $('#' + cb.value + '_edit').prop('checked', true);
        $('#' + cb.value + '_view').prop('checked', true);
        $('#' + cb.value + '_delete').prop('checked', true);
        $('#' + cb.value + '_others').prop('checked', true);
    } else {
        $('#' + cb.value + '_add').prop('checked', false);
        $('#' + cb.value + '_edit').prop('checked', false);
        $('#' + cb.value + '_view').prop('checked', false);
        $('#' + cb.value + '_delete').prop('checked', false);
        $('#' + cb.value + '_others').prop('checked', false);
    }
}
</script>
<?= $this->endSection(); ?>