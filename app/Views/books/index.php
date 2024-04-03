<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<p><a href="/books/new">Create New Book Entry</a></p>
	<p><a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByAuthor()">Sort by Author</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByTitle()">Sort by Title</a></p>
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
				document.getElementById("ajaxArticle").innerHTML = response.title + " by " + response.author + ": " + response.synopsis;
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
	
	function sortByAuthor()
	{
		fetch('http://localhost/ajax/get/sortAuthor')
			.then(response => response.json())
			.then(response => 
			{
				document.getElementById("ajaxArticle").innerHTML = response.title;
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
	
	function sortByTitle()
	{
		fetch('http://localhost/ajax/get/sortTitle')
			.then(response => response.json())
			.then(response => 
			{
				document.getElementById("ajaxArticle").innerHTML = response.title;
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
</script>