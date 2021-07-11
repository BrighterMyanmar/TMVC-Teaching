<?php addView('/layout/top') ?>

<div class="container my-5">
    <div class="col-md-4 offset-md-4 bg-sec px-5 py-3">
        <h1 class="text-center">Register</h1>
        <form method="post" action="<?php url('user/register'); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : ''; ?>" id="username" name="name">
                <div id="usernameHelp" class="form-text text-danger">
                    <?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone">
                <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm float-end">Register</button>
                <button type="reset" class="btn btn-outline-secondary me-2 btn-sm float-end">Cancle</button>
                <br>
            </div>

        </form>
    </div>
</div>
<?php addView("layout/base"); ?>