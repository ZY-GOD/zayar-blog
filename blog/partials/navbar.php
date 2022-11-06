<?php
$user = isset($_SESSION['user'])
?>
<link rel="stylesheet" href="/blog/css/navbar.css">
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/blog/Gallery/me.jpg" width="100" alt="ZAYAR" class="ZAYAR"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog/zayar-minn/zayarminn.html" target="_blank">About Me</a>
                </li>
                <?php if ($user) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        <?= $_SESSION['user'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <?php endif ?>

            </ul>

        </div>
    </div>
</nav>