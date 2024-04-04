<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<p><a href="/books/new">Create New Book Entry</a></p>
	<p><a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByAuthor()">Sort by Author</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByTitle()">Sort by Title</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByDefault()">Sort by Default</a></p>
	<br>
	<p style="display: none;" id="ajaxArticle"><br></p>
	<?php foreach ($books as $books_item): ?>

        <h3 id="title"><?= esc($books_item['title']) ?></h3>
		
		
		<h5 id="author">By: <?= esc($books_item['author']) ?></h5>

        <div id="synopsis" class="main">
			<?= esc($books_item['synopsis']) ?>
        </div>
        <p id="viewBook-btn"><a class="btn btn-outline-secondary btn-sm mt-2" href="/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>
		<p id="viewAjax-btn"><a class="btn btn-outline-secondary btn-sm mt-2" onclick="getData('<?= esc($books_item['slug'], 'url') ?>')">View Book via Ajax</a></p>
		
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
				document.getElementById("ajaxArticle").style.display = "inline";
				document.getElementById("ajaxArticle").innerHTML = "<h3>"+response.title+"</h3><h5>By: "+response.author+"</h5><p>"+response.synopsis+"</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='/books/"+response.slug+"'>View Book</a></p>";
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
				document.getElementById("ajaxArticle").style.display = "inline";
				document.getElementById("ajaxArticle").innerHTML = "<h3>"+response.title+"</h3><h5>By: "+response.author+"</h5><p>"+response.synopsis+"</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='/books/"+response.slug+"'>View Book</a></p>";
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
				<?php endforeach ?>
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
				document.getElementById("ajaxArticle").style.display = "inline";
				document.getElementById("ajaxArticle").innerHTML = "<h3>"+response.title+"</h3><h5>By: "+response.author+"</h5><p>"+response.synopsis+"</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='/books/"+response.slug+"'>View Book</a></p>";
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
				<?php endforeach ?>
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
	
	function sortByDefault()
	{
		window.location.reload();
	}
</script>