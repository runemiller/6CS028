<h2><?= ($books['title']) ?></h2>
<p>By: <?= esc($books['author']) ?></p>
<br>
<p><u>Story Synopsis:</u></p>
<p><?= esc($books['synopsis']) ?></p>
<img src="<?= esc($books['image']) ?>" style="height: 30%; width: 30%;" class="img-thumbnail">
<br><br><br><br>
<a href="/books/">Return to all Books</a>