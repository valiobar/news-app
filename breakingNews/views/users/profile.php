<?php $this->title =htmlspecialchars($this->user['username']." Profile") ;?>


<main>
    <div class="pofile-container col-md-8">
    <div class="image-container col-md-6">
        <?php

        if ($this->user['image']!=null&&file_exists(IMAGE_ROOT.$this->user['image'])){
            $image = IMAGE_ROOT.$this->user['image'];
            echo '<img class="profilePicture" src="',$image, '"  />';
        }
        else {
            $avatar = IMAGE_ROOT.'avatar.png';
            echo '<img class="profilePicture" src="',$avatar, '"  />';       }
        ?>
    </div>
    <div class="col-md-6">
        <h3>User Profile</h3>
        <p class="userInfo"><strong>User name:</strong>&nbsp;<?php echo htmlspecialchars( $this->user['username']);?></p><br><br>
        <div  class="profileInfo col-md-12">
        <p class="userInfo"><strong>Full name:</strong>&nbsp;<?php if($this->user['full_name']!=null){
            echo htmlspecialchars($this->user['full_name']);
        }else {
            echo "Anonymous User";
        }
            ;?>
        <p  class="userInfo"><strong>About me:</strong>&nbsp;<?php if($this->user['description']!=null){
                echo htmlspecialchars($this->user['description']);
            }else {
                echo "I am too shy :) ";
            }
            ;?></p>
</div>
    </div>
<div class="btnContainer col-md-12">
    <div class="col-md-6">
    <button type="button" class="modalBtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><?php echo $this->user['username']."'s Posts" ?></button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="myModal modal-dialog">

            <!-- Modal content-->
            <div class="  modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><?php echo $this->user['username']."'s Posts" ?></h2>
                </div>
                <div class="modal-body">
                    <?php foreach ($this->userPosts as $post):?>
                        <div style="display: flex" class="col-md-12">
                       <div class="postTitle col-md-3">Title:<?php  echo $post['title']?> </div>
                       <div class="postTitle col-md-7"><?= cutLongText($post['content'])?>
                           <a href="<?=APP_ROOT?>/home/view/<?= $post['id']?>"><strong>[Read more]</strong></strong></a>
                       </div>
                            <div class="postTitle col-md-3"><i>Posted on</i> <?=(new DateTime($post['DATE']))->format('d-M-Y') ?> </div>

                            <?php if($_SESSION['user_id'] == $this->user['id']):?>
                            <div class="post-btn-container col-md-3">

                            <a href="<?=APP_ROOT?>/posts/delete/<?= $post['id']?>">
                                <button type="button" class=" btn btn-info btn-md" >Delete</button>
                            </a>

                        </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;?>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>



            </div>

        </div>
    </div>

    </div>
    <div class="col-md-6">
            <button type="button" class="modalBtn btn btn-info btn-lg" data-toggle="modal" data-target="#myAlbumsModal"><?php echo $this->user['username']."'s Albums" ?></button>
            <!-- Modal -->
            <div class="modal fade" id="myAlbumsModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?php echo $this->user['username']."'s Albums" ?></h4>
                        </div>
                        <div class="modal-body">

                            <?php foreach ($this->albums as $album):?>
                                <?php if( !($album['private'] == 1 &&$_SESSION['user_id'] != $this->user['id']) ):?>
                                <div style="display: flex" class="col-md-12">

                                    <div class="postTitle col-md-4">Album:<?php  echo $album['album_name']?> </div>
                                   <div class="postTitle col-md-6"><i>Posted on</i> <?=(new DateTime($album['date']))->format('d-M-Y') ?> </div>
                                    <div class="postTitle col-md-2">
                                    <a href="<?=APP_ROOT?>/albums/viewAlbum/<?= $album['id']?>"> <div style="text-align: center" class="postTitle ">View</div></a>
                            </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
    <?php if($this->user['id'] == ($_SESSION['user_id'])):?>
<div  class="btnContainer col-md-12">
    <div class="col-md-6">
        <a href="<?=APP_ROOT?>/posts/create" class="modalBtn2 btn btn-info btn-lg">Create Post</a>

    </div>
    <div class="col-md-6">
        <a href="<?=APP_ROOT?>/albums/create" class="modalBtn2 btn btn-info btn-lg">Create Album</a>
    </div>

    </div>
    <?php endif; ?>


    </div>


</main>