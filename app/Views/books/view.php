<h2><?= ($books['title']) ?></h2>
<p>By: <?= esc($books['author']) ?></p>
<br>
<p><u>Story Synopsis:</u></p>
<p><?= esc($books['synopsis']) ?></p>
<p>Originally published: <?= esc($books['published']) ?></p>
<img src="<?= esc($books['image']) ?>" style="height: 30%; width: 30%;" class="img-thumbnail">
<br><br><br><br>
<a href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/">Return to all Books</a>