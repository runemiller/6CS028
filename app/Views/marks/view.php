<h2><?= ($marks['name']) ?></h2>
<br>
<p><u>Bookmark Description:</u></p>
<p><?= esc($marks['caption']) ?></p>
<img src="<?= esc($marks['image']) ?>" style="height: 10%; width: 10%;" class="img-thumbnail">
<br><br><br><br>
<a href="/marks/">Return to all Bookmarks</a>