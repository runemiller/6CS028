<h2><?= esc($title) ?></h2>
<br>
<label for="srINP">Enter book title:</label>
<div class="d-flex">
	<input class="form-control me-2" placeholder="Search" aria-label="Search" type="text" id="srINP">
	<button class="btn btn-outline-secondary btn-sm" type="submit" onclick="searchBook()">Search</button>
</div>
<br><br>
<div name="title" id="title"></div>
<div name="author" id="author"></div>
<div name="synopsis" id="synopsis"></div>
<div name="image" id="image"></div>
<div id="book-details"></div>

<form action="/home/add">
	<button class="btn btn-outline-secondary btn-sm" type="submit">Add Book</button>
</form>

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

		if (data.items && data.items.length > 0) 
		{
			const book = data.items[0].volumeInfo;
			const coverUrl = book.imageLinks ? book.imageLinks.thumbnail : '';
			const synopsis = book.description ? book.description : 'No synopsis available';

			titleElement.innerHTML = `<h2>${book.title}</h2>`;
			authorElement.innerHTML = `<p>By: ${book.authors ? book.authors.join(', ') : 'Unknown'}</p>`;
			synopsisElement.innerHTML = `<br><p><u>Story Synopsis:</u></p><p>${synopsis}</p>`;
			imageElement.innerHTML = coverUrl ? `<img src="${coverUrl}" alt="Book Cover" style="height: 20%; width: 20%;" class="img-thumbnail">` : '';
		} 
		else 
		{
			detailsElement.innerHTML = 'No book found';
			imageElement.innerHTML = '';
		}
	}
	
	document.getElementById('srINP').addEventListener('keypress', handleKeyPress);
</script>