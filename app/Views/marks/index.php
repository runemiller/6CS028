<?php if (! empty($marks) && is_array($marks)): ?>

	<h2><?= esc($title) ?></h2>
	<p><a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/marks/new">Create New Bookmark Entry</a></p>
	<br><br>
	<?php foreach ($marks as $marks_item): ?>
	
		<h3><?= esc($marks_item['name']) ?></h3>
		
		<div class="main">
			<?= esc($marks_item['caption']) ?>
        </div>
		<p><a class="btn btn-outline-secondary btn-sm mt-2" href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/marks/<?= esc($marks_item['slug'], 'url') ?>">View Bookmark</a></p>
		
		<br><br>
		
	<?php endforeach ?>
	
<?php else: ?>

    <h3>No Bookmarks</h3>

    <p>Unable to find any bookmarks for you.</p>

<?php endif ?>