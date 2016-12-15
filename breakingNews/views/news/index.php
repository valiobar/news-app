<?php $this->title = 'News';?>


<?php foreach ($this->news as $new):?>
<a class="post-link" href="<?=APP_ROOT?>/news/update/<?= $new['id']?>">   <div class="post-container col-md-12">
       <div class="post-elemnts col-md-3 ">
           Title:<br>
          <strong> <?=htmlspecialchars($new['title'])?></strong>

       </div>
       <div class="post-elemnts col-md-7 ">
           Content:<br>
           <?=htmlspecialchars(cutLongText($new['content']))?>

       </div>
       <div class="post-elemnts col-md-2 ">
           Posted on:<br>
           <?=htmlspecialchars($new['date'])?>
           <br>
           Active:

           <input style="color: black" title="active" type="checkbox" <?php if ( $new['isActive'] == 1) echo 'checked="checked" '; ?>/>

       </div>
   </div></a>
<?php endforeach;?>

