<?php addView('/layout/top') ?>

<div class="container my-5">
    <div class="col-md-4 offset-md-4">
        <h1 class="text-center">Login To Post</h1>
        <form method="post" action="index.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-sm float-end">Login</button>
        </form>
    </div>
</div>
<?php addView("layout/base"); ?>