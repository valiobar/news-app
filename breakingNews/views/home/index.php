<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<aside class="col-md-2">
<h2>Recent Posts</h2>
    <?php foreach ($this->news as $new): ?>
    <a href="<?=APP_ROOT?>/home/view/<?= $new['id']?>">
        <?=htmlentities($new['title']) ?>
    </a>
<?php endforeach;?>
</aside>

<main id = "posts" class="col-md-9">
    <article> <div >
        <?php foreach ($this->latestnews as $news):?>

      <h2 class="title"><?=htmlentities($news['title']) ?></h2>
    <div class="date"><i>Posted on</i>
        <?=(new DateTime($news['date']))->format('d-M-Y') ?>

    </div>
<p class="content"><?=($news['content']) ?></p>
                <hr class="tech">


<?php endforeach; ?>
        </div>
    </article>

