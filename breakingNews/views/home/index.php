<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<aside class="col-md-2">
<h2>Latest News</h2>
    <?php foreach ($this->news as $new): ?>
    <a href="<?=APP_ROOT?>/home/view/<?= $new['id']?>">
        <?=htmlentities($new['title']) ?>
    </a>
<?php endforeach;?>
</aside>

<main id = "posts" class="col-md-9">
    <article> <div >
        <?php foreach ($this->latestnews as $news):?>
            <a class="home-news" href="<?=APP_ROOT?>/home/view/<?= $new['id']?>">
       <div class="col-md-9">
      <h2 class="title"><?=htmlentities($news['title']) ?></h2>
      <div class="date"><i>Posted on</i>
        <?=(new DateTime($news['date']))->format('d-M-Y') ?>

    </div>
            <div class="col-md-12"  ">
<p  class="content"><?= cutLongText($news['content'],270) ?></p>
                </div>
        </div>
        <div class="col-md-3">
<img width="250px" height="200px" src="<?=IMAGE_ROOT?><?= $news['image']?>"/>
        </div>
                <hr class="tech">

        </a>
<?php endforeach; ?>
        </div>
    </article>

