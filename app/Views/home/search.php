<h2><?= esc($title) ?></h2>
<br>
<label for="title">Enter book title:</label>
<div class="d-flex">
	<input class="form-control me-2" placeholder="Search" aria-label="Search"type="text" id="title">
	<button class="btn btn-outline-secondary btn-sm" type="submit" onclick="searchBook()">Search</button>
</div>
<br><br>
<div id="book-details"></div>
<div id="cover"></div>

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
		const title = document.getElementById('title').value;
		const apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${title}&maxResults=1`;

		fetch(apiUrl)
			.then(response => response.json())
			.then(data => displayBookDetails(data))
			.catch(error => console.error('Error:', error));
	}

	function displayBookDetails(data) 
	{
		const detailsElement = document.getElementById('book-details');
		const coverElement = document.getElementById('cover');

		if (data.items && data.items.length > 0) {
			const book = data.items[0].volumeInfo;
			const coverUrl = book.imageLinks ? book.imageLinks.thumbnail : '';
			const synopsis = book.description ? book.description : 'No synopsis available';

			coverElement.innerHTML = coverUrl ? `<img src="${coverUrl}" alt="Book Cover">` : '';
			detailsElement.innerHTML = `
				<h2>${book.title}</h2>
				<p>By: ${book.authors ? book.authors.join(', ') : 'Unknown'}</p>
				<br>
				<p><u>Story Synopsis:</u> <br> ${synopsis}</p>
			`;
		} 
		else 
		{
			detailsElement.innerHTML = 'No book found';
			coverElement.innerHTML = '';
		}
	}
	
	document.getElementById('title').addEventListener('keypress', handleKeyPress);
</script>