<h2><?= ($books['title']) ?></h2>
<p>By: <?= esc($books['author']) ?></p>
<br>
<p><u>Story Synopsis:</u></p>
<p><?= esc($books['synopsis']) ?></p>
<img src="<?= esc($books['image']) ?>" style="height: 10%; width: 10%;" class="img-thumbnail">
<br>