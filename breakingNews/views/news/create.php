<?php $this->title = 'Create News'; ?>

<h1 xmlns="http://www.w3.org/1999/html"><?= htmlspecialchars($this->title) ?></h1>
<div class="post-create col-md-6">
    <form class="news_form" method="post" enctype="multipart/form-data">
        <input id ="image" type="file" name="image"/>
    <div>Title:</div>

    <input size="70"  type="text" name="news_title"/>
    <div><strong>Content:</strong></div>
    <textarea rows="10"  cols="70" name="news_content"></textarea>
    <div><input class="submit-post " type="submit" value="Create"/></div>
    <a href="<?=APP_ROOT?>/news">[Cancel]</a></div>
</form>
</div>
