<?php $this->title = $this->news['title'] ?>
<div class="post-create view col-md-10">



    <img width="500px" height="500px" src="<?=IMAGE_ROOT?><?= htmlentities($this->news['image'])?>"/>
    <h1 class="title"><?=htmlentities($this->news['title']) ?></h1>
    <div class="date"><i>Posted on</i>
        <?=(new DateTime($this->news['date']))->format('d-M-Y') ?>

    </div>
    <p class="content"><?=($this->news['content']) ?></p>


</div>