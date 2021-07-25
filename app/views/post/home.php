<?php addView('/layout/top') ?>
<div class="container my-5">
    <a href="<?php url('post/create') ?>" class="btn btn-primary btn-sm">Create +</a>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-dark text-white">
                <th>id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $post) : ?>
                <tr>
                    <td><?php echo $post->id; ?></td>
                    <td><?php echo $post->title; ?></td>
                    <td><?php echo substr($post->content,0,20); ?></td>
                    <td><img src="<?php assets('uploads/' . $post->image) ?>" alt="" width="40px"></td>
                    <td><?php echo $post->created; ?></td>
                    <td>
                        <a href="<?php url("post/edit/" . $post->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php url("post/delete/" . $post->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php addView('/layout/base') ?>