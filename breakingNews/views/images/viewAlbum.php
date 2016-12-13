<?php $this->title = 'Album-'.$this->album['album_name']; ?>
<div class="col-md-12">
    <div class=" albumCoverImage col-md-4">
        <div class="col-md-12">
           <?php
           if ($this->album['cover']!='') {
               $cover = IMAGE_ROOT.$this->album['cover'];
               echo '<img class="albumCover" src="', $cover, '" alt="', $cover, '" />';
           } else {
               $blank = IMAGE_ROOT."blank.png";
               echo '<img class="albumCover" src="', $blank, '" alt="', $blank, '" />';
           }
           ?>
        </div>
        <div style="padding: 3px" class="col-md-12">
            <strong>Album:<?php echo $this->album['album_name']?></strong>
        </div>
       <?php if($_SESSION['user_id']== $this->album['user_id']): ?>
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="image_desc">Image Description:</label>
                    <div class="col-sm-8">
                        <textarea rows=3 name="image_desc" placeholder="Enter image description"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <label  class="control-label col-sm-2" for="image">Image:</label>
                    <div  class="fileUpload btn btn-primary col-md-4">
                        <span>Upload Image</span>
                        <input id ="imageAdd" name="imageAdd"  type="file" class="upload" />
                    </div>
                    <div class="col-md-4">
                    <input style="width: 100%" id="uploadImg" placeholder="Choose File" disabled="disabled" />
                    </div>
</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button value="Add_Image" type="submit" class="btn btn-default">Add Image</button>
                    </div>
                </div>

                </form>
       <?php endif; ?>
        </div>
       </div>
    
    <div class="albumImages col-md-8">
        <?php foreach ($this->images as $image):?>
            <div class="albumImageContainer col-md-4">
             <?php
           var_dump($this->images);
             $imagePath =IMAGE_ROOT.$image;
             var_dump($imagePath);
                echo '<img class="avatar" src="',$imagePath, '" alt="', $image, '" />';
                ?>
            </div>
            
        <?php endforeach;?>
        
    </div>
    <script>
        document.getElementById("imageAdd").onchange = function () {
            document.getElementById("uploadImg").value = this.value;
        };
    </script>



    </div>
    
    
