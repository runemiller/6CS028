<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<p><a href="/books/new">Create New Book Entry</a></p>
	<br><br>
	<p id="ajaxArticle"></p>
	<br><br>
	<?php foreach ($books as $books_item): ?>

        <h3><?= esc($books_item['title']) ?></h3>
		
		
		<h5>By: <?= esc($books_item['author']) ?></h5>

        <div class="main">
			<?= esc($books_item['synopsis']) ?>
        </div>
        <p><a class="btn btn-outline-secondary btn-sm mt-2" href="/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>
		<p><a class="btn btn-outline-secondary btn-sm mt-2" onclick="getData('<?= esc($books_item['slug'], 'url') ?>')">View Book via Ajax</a></p>
		
		<br><br>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>

<script>
	function getData(slug)
	{
		fetch('http://localhost/ajax/get/' + slug)
			.then(response => response.json())
			.then(response => 
			{
				document.getElementById("ajaxArticle").innerHTML = response.title + ": " + response.synopsis;
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
</script>