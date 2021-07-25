<?php addView('/layout/top') ?>

<div class="container my-5">
    <div class="col-md-6 offset-md-3 bg-sec px-5 py-3">
        <h1 class="text-center">Edit Post</h1>
        <form method="post" action="<?php url('post/edit/'.$data->id); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $data->title; ?>">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" name="author" id="author" readonly value="<?php echo $data->author; ?>">
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file">
                <label class="input-group-text" for="file">Upload</label>
            </div>
         
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content" value="<?php echo $data->cotnent; ?>">
                    <?php echo $data->content; ?>
                </textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                <button type="reset" class="btn btn-outline-secondary me-2 btn-sm float-end">Cancle</button>
                <br>
            </div>

        </form>
    </div>
</div>
<?php addView("layout/base"); ?>