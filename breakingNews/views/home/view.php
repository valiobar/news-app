<?php $this->title = $this->news['title'] ?>
<div class="post-create view col-md-6">
<h1><?=htmlspecialchars($this->title)?></h1>

<main>

    <h2 class="title"><?=htmlentities($this->news['title']) ?></h2>
    <div class="date"><i>Posted on</i>
        <?=(new DateTime($this->news['date']))->format('d-M-Y') ?>

    </div>
    <p class="content"><?=($this->news['content']) ?></p>

</main>
</div>