<?php
if (!checkAdminLogin()) {
    redirect('ErrorPage');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(ucfirst($data["page"])); ?> | Dandelion</title>
    <link rel="icon" href="<?php echo BASE_URL_PATH . "assets/icon/dandelion.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/datatable/datatable.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/datatable/custom.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/font/font.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/brands.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/icon/fontawesome-free-6.2.1-web/css/solid.min.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_PATH . "assets/bootstrap5/bootstrap-5.2.3-dist/css/bootstrap.min.css" ?>">
    <script src="<?php echo BASE_URL_PATH . "assets/bootstrap5/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js" ?>"></script>
    <script src="<?php echo BASE_URL_PATH . "assets/jquery/jquery-3.6.3.min.js" ?>"></script>
    <script src="<?php echo BASE_URL_PATH . "assets/jquery/jquery-ui.min.js" ?>"></script>
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
            border-radius: 10px;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 400px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }

        .ck-content img {
            border-radius: 5px !important;
        }

        #choose-file label {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <main id="master3-container">
        <div class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand ps-3" href="<?php echo BASE_URL_PATH . "Home" ?>">Dandelion Dashboard</a>
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                </form>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="">Settings</a></li>
                            <li><a class="dropdown-item" href="">Activity Log</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL_PATH . "Signin/logout" ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">

                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="/Admin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Products Table
                                </a>
                            </div>
                        </div>

                    </nav>
                </div>
                <div id="layoutSidenav_content" style="background-color: #212529;">
                    <main style="background-color: #fff;">
                        <div class="container-fluid px-4">
                            <?php require_once "../mvc/views/pages/" . $data["page"] . ".php" ?>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<script>
    window.addEventListener('DOMContentLoaded', event => {

        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

    });
</script>