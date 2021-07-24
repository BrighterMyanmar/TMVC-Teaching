<?php addView('/layout/top') ?>

<div class="container my-5">
    <div class="col-md-6 offset-md-3 bg-sec px-5 py-3">
        <h1 class="text-center">Edit Category</h1>
        <form method="post" action="<?php url('category/edit/'.$data->id); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $data->name;?>">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Old Image</label>
                <img src="<?php assets('uploads/' . $data->image) ?>" alt="" width="40px">
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file">
                <label class="input-group-text" for="file">Upload</label>
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