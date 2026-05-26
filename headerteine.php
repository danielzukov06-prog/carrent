<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base_url = "/carrent";
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container">

        <a class="navbar-brand" href="<?= $base_url ?>/public/index.php">
            Autorent
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="<?= $base_url ?>/public/index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Autod</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Hinnad</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/public/kalkulaator.php">Kontakt</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/admin/index.php">Admin</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/inc/register.php">Register</a>
                </li>

            </ul>

            <form method="get" action="<?= $base_url ?>/public/index.php">
                <input class="form-control me-2" type="search" placeholder="Search" name="otsi">
                <button class="btn btn-outline-success" type="submit">Otsi</button>
            </form>

            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                <a href="<?= $base_url ?>/admin/logout.php" class="btn btn-outline-danger ms-3">
                    Logi välja
                </a>
            <?php else: ?>
                <a href="<?= $base_url ?>/admin/login.php" class="btn btn-outline-success ms-3">
                    Logi sisse
                </a>
            <?php endif; ?>

        </div>
    </div>
</nav>