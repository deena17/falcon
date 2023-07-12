<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item">Reports</li>
        <li class="breadcrumb-item active">Question Wise</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
   Reports - Question Wise
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>S.No.</td>
            <td>Subject</td>
            <td>Question Id</td>
            <td>Objection Count</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Social Science-T</td>
            <td>10</td>
            <td>
                <a href="#">10</a>
            </td>
            <td>
                <span class="badge bg-success">Approved</span>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Social Science-T</td>
            <td>10</td>
            <td>
                <a href="#">10</a>
            </td>
            <td>
                <span class="badge bg-danger">Rejected</span>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Social Science-T</td>
            <td>10</td>
            <td>
                <a href="#">10</a>
            </td>
            <td>
                <span class="badge bg-primary">Pending</span>
            </td>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>