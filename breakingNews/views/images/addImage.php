<?php $this->title = 'Add Image' ?>
<div  class="addImagemodal fade" id="myAlbumsModal" role="dialog">
</div>
<div  class="addImageForm col-md-6">
    <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-4" for="image_desc">Image Description:</label>
            <div class="col-sm-8">
                <textarea rows=3 name="image_desc" placeholder="Enter image description"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <label  class="control-label col-sm-4" for="image">Image:</label>
            <div  class="fileUpload btn btn-primary col-md-2">
                <span>Upload Image</span>
                <input id ="imageAdd" name="imageAdd"  type="file" class="upload" />
            </div>
            <div class="col-md-4">
                <input style="width: 100%" id="uploadImg" placeholder="Choose File" disabled="disabled" />
            </div>

            </div>
        <div class="form-group">
            <div class=" col-sm-3">
                <button style="margin-left: 50%" value="Add_Image" type="submit" class="btn btn-default">Add Image</button>
            </div>
        </div>


    </form>

</div>
<script>
    document.getElementById("imageAdd").onchange = function () {
        document.getElementById("uploadImg").value = this.value;
    };
</script>
