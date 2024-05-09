<?php if(empty($books['name'])) { echo '<img class="mq_img" src="' . ($books['image']) . '" style="height: 30%; width: 30%;">'; } ?>
<?php if(empty($books['image'])) { echo '<img class="mq_img" style="height: 30%; width: 30%;" src="data:image/png;base64,'.base64_encode($books['data']).'"/>'; } ?>
<br>
<h2 class="mq"><?= ($books['title']) ?></h2>
<p class="mq">By: <?= esc($books['author']) ?></p>
<br>
<p class="mq"><u>Story Synopsis:</u></p>
<p class="mq"><?= esc($books['synopsis']) ?></p>
<p class="mq">Originally published: <?= esc($books['published']) ?></p>
<?php if(empty($books['name'])) { echo '<img class="reg_img" src="' . ($books['image']) . '" style="height: 30%; width: 30%;">'; } ?>
<?php if(empty($books['image'])) { echo '<img class="reg_img" style="height: 30%; width: 30%;" src="data:image/png;base64,'.base64_encode($books['data']).'"/>'; } ?>
<br><br><br><br>
<a class="mq" href="https://mi-linux.wlv.ac.uk/~2112834/6CS028/public/books/">Return to all Books</a>