<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(ucfirst($data["page"])); ?> | Dandelion</title>
    <link rel="icon" href="<?php echo BASE_URL_PATH . "assets/icon/dandelion.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/css/base.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/css/app.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/font/font.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/brands.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/solid.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/bootstrap5/bootstrap-5.2.3-dist/css/bootstrap.min.css" ?>">
    <script src="<?php echo BASE_URL_PATH . "assets/bootstrap5/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js" ?>"></script>
    <script src="<?php echo BASE_URL_PATH . "assets/jquery/jquery-3.6.3.min.js" ?>"></script>
    <script src="<?php echo BASE_URL_PATH . "assets/jquery/jquery-ui.min.js" ?>"></script>
    <style>
        .product__editor-wrap figure.image {
            text-align: center;
        }

        .product__editor-wrap figure.image img {
            border-radius: 5px;
            max-width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header class="auth-header">
        <?php require_once "../mvc/views/blocks/header.php" ?>
    </header>

    <main id="master1-container">
        <?php require_once "../mvc/views/pages/" . $data["page"] . ".php" ?>
    </main>

    <footer>
        <?php require_once "../mvc/views/blocks/footer.php" ?>
    </footer>
</body>

</html>