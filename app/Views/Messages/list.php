<?php if (! empty($messages)) : ?>
	<div class="alert alert-info" role="alert">
		<?php foreach ($messages as $message) : ?>
			<?= esc($message) ?><br/>
		<?php endforeach ?>
	</div>
<?php endif ?>
