<?php if (! empty($books) && is_array($books)): ?>

    <h2><?= esc($title) ?></h2>
	<br><br>
	<div style="display: grid; grid-template-columns: 1; grid-template-rows: 1; row-gap: 50px;">
		<div style="overflow-x: auto; padding: 20px; outline-style: solid; outline-color: #111; height: auto; display: flex;">
			<?php foreach ($books as $books_item): ?>

				<figure style="margin-right: 60px;">
					<img src="<?= esc($books_item['image']) ?>" style="height: 235px; width: 155px;" class="img-thumbnail">
					<figcaption style="color: black; width: 160px; text-align: center;"><a href="/books/<?= esc($books_item['slug'], 'url') ?>"><?= esc($books_item['title']) ?></a></figcaption>
				</figure>

			<?php endforeach ?>
		</div>
	</div>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>