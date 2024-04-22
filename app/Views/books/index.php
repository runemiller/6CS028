<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<p><a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/new">Create New Book Entry</a></p>
	<p><a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByAuthor()">Sort by Author</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByTitle()">Sort by Title</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByDate()">Sort by Date</a> <a class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByDefault()">Sort by Default</a></p>
	<br>
	<div id="div">
		<p id="content"></p>
	</div>
	<?php foreach ($books as $books_item): ?>

        <h3 id="title"><?= esc($books_item['title']) ?></h3>
		
		
		<h5 id="author">By: <?= esc($books_item['author']) ?></h5>

        <div id="synopsis" class="main">
			<?= esc($books_item['synopsis']) ?>
        </div>
		<p id="published">Published on: <?= esc($books_item['published']) ?></p>
        <p id="viewBook-btn"><a class="btn btn-outline-secondary btn-sm mt-2" href="/~2112834/6CS028/public/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>
		<p id="viewAjax-btn"><a class="btn btn-outline-secondary btn-sm mt-2" onclick="getData('<?= esc($books_item['slug'], 'url') ?>')">View Book via Ajax</a></p>
		<div class="popup" id="popup"></div>
		
		<br><br>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>

<style>
	.popup {
		width: 40%;
		background: #a1c6ff;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		position: absolute;
		top: 0;
		left: 50%;
		transform: translate(-50%, -50%) scale(0.1);
		text-align: center;
		padding: 20px;
		color: #333;
		visibility: hidden;
		transition: all 0.4s ease-in-out;
	}

	.open-popup {
		visibility: visible;
		top: 50%;
		transform: translate(-50%, -50%) scale(1);
	}

</style>

<script>
	function getData(slug)
	{
		fetch('https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/ajax/get/' + slug)
			.then(response => response.json())
			.then(response => 
			{
				let popup = document.getElementById('popup');
				popup.classList.add('open-popup');
				document.getElementById('popup').innerHTML = "<h3>"+response.title+"</h3><h5>By: "+response.author+"</h5><p>"+response.synopsis+"</p><p>"+response.published+"</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/"+response.slug+"'>View Book</a></p>";
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
	
	function sortByAuthor()
	{
		fetch('https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/ajax/get/sortAuthor')
			.then(response => response.json())
			.then(response => 
			{
				let len = response.length;
				let i;
				for (i = 0; i < len; i++) 
				{
					title += "<h3>" + response[i].title + "</h3><h5>By: " + response[i].author + "</h5><p>" + response[i].synopsis + "</p><p>" + response[i].published + "</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = title;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
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
		fetch('https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/ajax/get/sortTitle')
			.then(response => response.json())
			.then(response => 
			{
				let len = response.length;
				let i;
				for (i = 0; i < len; i++) 
				{
					title += "<h3>" + response[i].title + "</h3><h5>By: " + response[i].author + "</h5><p>" + response[i].synopsis + "</p><p>" + response[i].published + "</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = title;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
				<?php endforeach ?>
			})
			.catch(err => 
			{
				console.log(err);
			});
	}
	
	function sortByDate()
	{
		fetch('https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/ajax/get/sortDate')
			.then(response => response.json())
			.then(response => 
			{
				let len = response.length;
				let i;
				for (i = 0; i < len; i++) 
				{
					title += "<h3>" + response[i].title + "</h3><h5>By: " + response[i].author + "</h5><p>" + response[i].synopsis + "</p><p>" + response[i].published + "</p><p><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = title;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
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