<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item">Reports</li>
        <li class="breadcrumb-item active">Subject Wise</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
   Reports - Subject Wise
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>S.No.</td>
            <td>Subject</td>
            <td>Objection Count</td>
        </tr>
    </thead>
    <tbody>
        <?php if($objections): ?>
        <?php foreach($objections as $o): static $count=1; ?>
        <tr>
            <td><?= $count; ?></td>
            <td><?= $o->exam_subject; ?></td>
            <td>
                <a href="<?= base_url(); ?>/reports/question_wise/"><?= $o->count; ?></a>
            </td>
        </tr> 
        <?php $count++; endforeach; ?>    
        <?php endif; ?>    
    </tbody>
</table>

<?= $this->endSection(); ?>