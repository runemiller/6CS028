<h2><?= esc($title) ?></h2>
<br><br>

<?php if (! empty($books) && is_array($books)): ?>

	<div style="display: grid; grid-template-columns: 1; grid-template-rows: 1; row-gap: 50px;">
		<div style="overflow-x: auto; padding: 20px; outline-style: solid; outline-color: #111; height: auto; display: flex;">
			<?php foreach ($books as $books_item): ?>

				<figure style="margin-right: 60px;">
					<img src="<?= esc($books_item['image']) ?>" style="height: 235px; width: 155px;" class="img-thumbnail">
					<figcaption style="color: black; width: 160px; text-align: center;"><a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/<?= esc($books_item['slug'], 'url') ?>"><?= esc($books_item['title']) ?></a></figcaption>
				</figure>

			<?php endforeach ?>
		</div>
	</div>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>

<br><br><br>

<?php if (! empty($marks) && is_array($marks)): ?>

	<div style="display: grid; grid-template-columns: 1; grid-template-rows: 1; row-gap: 50px;">
		<div style="overflow-x: auto; padding: 20px; outline-style: solid; outline-color: #111; height: auto; display: flex;">
			<?php foreach ($marks as $marks_item): ?>

				<figure style="margin-right: 60px;">
					<img src="<?= esc($marks_item['image']) ?>" style="height: 240px; width: 70px; margin-left: 30%;" class="img-thumbnail">
					<figcaption style="color: black; width: 160px; text-align: center;"><a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/marks/<?= esc($marks_item['slug'], 'url') ?>"><?= esc($marks_item['name']) ?></a></figcaption>
				</figure>

			<?php endforeach ?>
		</div>
	</div>

<?php else: ?>

    <h3>No Bookmarks</h3>

    <p>Unable to find any bookmarks for you.</p>

<?php endif ?>