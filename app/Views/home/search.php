<h2><?= esc($title) ?></h2>
<br>
<label for="srINP">Enter book title:</label>
<div class="d-flex">
	<input class="form-control me-2" placeholder="Search" aria-label="Search" type="text" id="srINP">
	<button class="btn btn-outline-secondary btn-sm" type="submit" onclick="searchBook()">Search</button>
</div>
<div id="suggestions"></div>
<br><br>

<div name="title" id="title"></div>
<div name="author" id="author"></div>
<div name="synopsis" id="synopsis"></div>
<div name="image" id="image"></div>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/home" method="post">
    <?= csrf_field() ?>
	<input type="hidden" name="titleH" id="titleH" value="<?= set_value('title') ?>">
	<input type="hidden" name="slugH" id="slugH" value="<?= set_value('slug') ?>">
	<input type="hidden" name="authorH" id="authorH" value="<?= set_value('author') ?>">
	<input type="hidden" name="synopsisH" id="synopsisH" value="<?= set_value('synopsis') ?>">
	<input type="hidden" name="imageH" id="imageH" value="<?= set_value('image') ?>">
	<br>
	<input class="btn btn-outline-secondary btn-sm" type="submit" value="Add Book">
</form>

<div id="book-details"></div>

<script>
	function handleKeyPress(event) 
	{
		if (event.key === 'Enter') 
		{
			searchBook();
		}
	}
	
	function searchBook() 
	{
		const title = document.getElementById('srINP').value;
		const apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${title}&maxResults=1`;

		fetch(apiUrl)
			.then(response => response.json())
			.then(data => displayBookDetails(data))
			.catch(error => console.error('Error:', error));
	}

	function displayBookDetails(data) 
	{
		const titleElement = document.getElementById('title');
		const authorElement = document.getElementById('author');
		const synopsisElement = document.getElementById('synopsis');
		const imageElement = document.getElementById('image');
		
		const titleElementH = document.getElementById('titleH');
		const authorElementH = document.getElementById('authorH');
		const synopsisElementH = document.getElementById('synopsisH');
		const imageElementH = document.getElementById('imageH');
		const slugElementH = document.getElementById('slugH');

		if (data.items && data.items.length > 0) 
		{
			const book = data.items[0].volumeInfo;
			const coverUrl = book.imageLinks ? book.imageLinks.thumbnail : '';
			const synopsis = book.description ? book.description : 'No synopsis available';
			const title = book.title;
			const slug = title.replace(/\s+/g, '-').toLowerCase();

			titleElement.innerHTML = `<h2>${book.title}</h2>`;
			authorElement.innerHTML = `<p>By: ${book.authors ? book.authors.join(', ') : 'Unknown'}</p>`;
			synopsisElement.innerHTML = `<br><p><u>Story Synopsis:</u></p><p>${synopsis}</p>`;
			imageElement.innerHTML = coverUrl ? `<img src="${coverUrl}" alt="Book Cover" style="height: 20%; width: 20%;" class="img-thumbnail">` : '';
			
			titleElementH.value = `${book.title}`;
			slugElementH.value = slug;
			authorElementH.value = `${book.authors ? book.authors.join(', ') : 'Unknown'}`;
			synopsisElementH.value = `${synopsis}`;
			imageElementH.value = coverUrl;
		} 
		else 
		{
			detailsElement.innerHTML = 'No book found';
			imageElement.innerHTML = '';
		}
	}
	
	document.getElementById('srINP').addEventListener('keypress', handleKeyPress);
	
	function fetchSuggestions() 
	{
		const title = document.getElementById('srINP').value;
		const apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${title}&maxResults=5`;

		fetch(apiUrl)
			.then(response => response.json())
			.then(data => displaySuggestions(data))
			.catch(error => console.error('Error:', error));
	}

	function displaySuggestions(data) 
	{
		const suggestionsElement = document.getElementById('suggestions');

		if (data.items && data.items.length > 0) {
			const suggestions = data.items.map(item => item.volumeInfo.title);
			suggestionsElement.innerHTML = suggestions.map(suggestion => `<div class="suggestion-item" onclick="selectSuggestion('${suggestion}')">${suggestion}</div>`).join('');
			suggestionsElement.style.display = 'block';
		} else {
			suggestionsElement.innerHTML = '';
			suggestionsElement.style.display = 'none';
		}
	}

	function selectSuggestion(suggestion) 
	{
		document.getElementById('srINP').value = suggestion;
		document.getElementById('suggestions').style.display = 'none';
		searchBook();
	}

	document.getElementById('srINP').addEventListener('input', fetchSuggestions);
</script>