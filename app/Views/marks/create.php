<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/marks" method="post">
    <?= csrf_field() ?>
	
	<label for="name">Name</label>
	<input type="input" name="name" value="<?= set_value('name') ?>">
    <br>
	
	<label for="caption">Caption</label>
    <textarea name="caption" cols="45" rows="4"><?= set_value('caption') ?></textarea>
    <br>
	
	<label for="image">Image Link</label>
    <textarea name="image" cols="45" rows="4"><?= set_value('image') ?></textarea>
    <br>

    <input class="btn btn-outline-secondary btn-sm" type="submit" name="submit" value="Add bookmark">
</form>