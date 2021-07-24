<?php addView('/layout/top') ?>
<div class="container my-5">
    <a href="<?php url('category/create') ?>" class="btn btn-primary btn-sm">Create +</a>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-dark text-white">
                <th>id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $cat) : ?>
                <tr>
                    <td><?php echo $cat->id; ?></td>
                    <td><?php echo $cat->name; ?></td>
                    <td><img src="<?php assets('uploads/' . $cat->image) ?>" alt="" width="40px"></td>
                    <td><?php echo $cat->created; ?></td>
                    <td>
                        <a href="<?php url("category/edit/" . $cat->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php url("category/delete/" . $cat->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php addView('/layout/base') ?>