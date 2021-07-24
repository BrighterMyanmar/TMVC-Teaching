<?php addView('/layout/top') ?>
<?php
if (hasSession('name')) {
    redirect('home/index');
}
?>
<div class="container my-5">
    <div class="col-md-4 offset-md-4 bg-sec px-5 py-3">
        <h1 class="text-center">Login</h1>
        <form method="post" action="<?php url('user/login'); ?>">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control <?php echo !empty($data['phone_err']) ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?php echo empty($data['phone']) ? '' : $data['phone']; ?>">
                <div id="phoneHelp" class="form-text text-danger">
                    <?php echo !empty($data['phone_err']) ? $data['phone_err'] : ''; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" id="password" name="password">
                <div id="passwordHelp" class="form-text text-danger">
                    <?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm float-end">Login</button>
                <button type="reset" class="btn btn-outline-secondary me-2 btn-sm float-end">Cancle</button>
                <br>
            </div>

        </form>
    </div>
</div>
<?php addView("layout/base"); ?>