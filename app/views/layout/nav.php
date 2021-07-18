<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="<?php url('home/index'); ?>">
                <img src="<?php assets('imgs/bm.png'); ?>" alt="" width="24" height="24">
                <span class="ms-2">BMMVC</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if(hasSession('name')) : ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="<?php url('post/home'); ?>">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php url('category/home'); ?>">Cats</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Member
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (hasSession('name')) : ?>
                                <li><a class="dropdown-item" href="<?php url('user/logout'); ?>">Logout</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="<?php url('user/login'); ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?php url('user/register'); ?>">Register</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>