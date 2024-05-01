<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<p><a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/new">Create New Book Entry</a></p>
	<p><a id="sbau" class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByAuthor()">Sort by Author</a> <a id="sbti" class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByTitle()">Sort by Title</a> <a id="sbda" class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByDate()">Sort by Date</a> <a id="sbde" class="btn btn-outline-secondary btn-sm mt-2" onclick="sortByDefault()">Sort by Default</a></p>
	<br>
	<div id="div">
		<p id="content"></p>
	</div>
	<?php foreach ($books as $books_item): ?>
        <h3 class="mq" id="title"><?= esc($books_item['title']) ?></h3>
		
		
		<h5 class="mq" id="author">By: <?= esc($books_item['author']) ?></h5>

        <div class="mq" id="synopsis" class="main">
			<?= esc($books_item['synopsis']) ?>
        </div>
		<p class="mq" id="published">Published on: <?= esc($books_item['published']) ?></p>
        <p class="mq" id="viewBook-btn"><a class="btn btn-outline-secondary btn-sm mt-2" href="/~2112834/6CS028/public/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>
		<p class="mq" id="viewAjax-btn"><a class="btn btn-outline-secondary btn-sm mt-2" onclick="getData('<?= esc($books_item['slug'], 'url') ?>')">View Book via Ajax</a></p>
		<div class="popup" id="popup"></div>
		
		<p class="mq" id="edit-btn"><a class="btn btn-outline-secondary btn-sm mt-2" href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/edit">Edit Entry</a></p>
		<form action="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/delete" method="post">
			<input class="mq" readonly id="del2" type="input" name="title" value="<?= esc($books_item['title']) ?>">
			<input id="del" class="btn btn-outline-secondary btn-sm" type="submit" value="Delete Entry">
		</form>
		
		<br><br>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>

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
				let content = '';
				for (i = 0; i < len; i++) 
				{
					content += "<h3 class='mq'>" + response[i].title + "</h3><h5 class='mq'>By: " + response[i].author + "</h5><p class='mq'>" + response[i].synopsis + "</p><p class='mq'>Published on: " + response[i].published + "</p><p class='mq'><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = content;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
					document.getElementById("edit-btn").remove();
					document.getElementById("del").remove();
					document.getElementById("del2").remove();
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
				let content = '';
				for (i = 0; i < len; i++) 
				{
					content += "<h3 class='mq'>" + response[i].title + "</h3><h5 class='mq'>By: " + response[i].author + "</h5><p class='mq'>" + response[i].synopsis + "</p><p class='mq'>Published on: " + response[i].published + "</p><p class='mq'><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = content;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
					document.getElementById("edit-btn").remove();
					document.getElementById("del").remove();
					document.getElementById("del2").remove();
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
				let content = '';
				for (i = 0; i < len; i++) 
				{
					content += "<h3 class='mq'>" + response[i].title + "</h3><h5 class='mq'>By: " + response[i].author + "</h5><p class='mq'>" + response[i].synopsis + "</p><p class='mq'>Published on: " + response[i].published + "</p><p class='mq'><a class='btn btn-outline-secondary btn-sm mt-2' href='https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/" + response[i].slug + "'>View Book</a></p><br>";
				}
				document.getElementById("content").innerHTML = content;
				<?php foreach ($books as $books_item): ?>
					document.getElementById("title").remove();
					document.getElementById("author").remove();
					document.getElementById("synopsis").remove();
					document.getElementById("published").remove();
					document.getElementById("viewBook-btn").remove();
					document.getElementById("viewAjax-btn").remove();
					document.getElementById("edit-btn").remove();
					document.getElementById("del").remove();
					document.getElementById("del2").remove();
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