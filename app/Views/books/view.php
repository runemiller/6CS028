<img class="mq_img" src="<?= esc($books['image']) ?>" style="height: 30%; width: 30%;" class="img-thumbnail">
<br>
<h2 class="mq"><?= ($books['title']) ?></h2>
<p class="mq">By: <?= esc($books['author']) ?></p>
<br>
<p class="mq"><u>Story Synopsis:</u></p>
<p class="mq"><?= esc($books['synopsis']) ?></p>
<p class="mq">Originally published: <?= esc($books['published']) ?></p>
<img class="reg_img" src="<?= esc($books['image']) ?>" style="height: 30%; width: 30%;" class="img-thumbnail">
<br><br><br><br>
<a class="mq" href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/">Return to all Books</a>