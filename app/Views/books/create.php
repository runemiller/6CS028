<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/books" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>
	
	<label for="author">Author</label>
    <input type="input" name="author" value="<?= set_value('author') ?>">
    <br>

    <label for="synopsis">Synopsis</label>
    <textarea name="synopsis" cols="45" rows="4"><?= set_value('synopsis') ?></textarea>
    <br>
	
	<label for="image">Image Link</label>
    <textarea name="image" cols="45" rows="4"><?= set_value('image') ?></textarea>
    <br>

    <input class="btn btn-outline-secondary btn-sm" type="submit" name="submit" value="Add book">
</form>