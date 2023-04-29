<div>
    <nav class="navbar-block navbar navbar-expand-md navbar-light bg-body text-dark shadow-lg fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-around">
                <div>
                    <a class="navbar-brand fs-3 fw-bold" href="/Home">Dandelion</a>
                </div>
                <ul class="navbar-category nav navbar-nav mb-2 mb-lg-0 fw-bold fs-5">
                    <li class="nav-item">
                        <a class="nav-link item--active" aria-current="page" href="<?php echo BASE_URL_PATH . "Home#" ?>">Home</a>
                    </li>
                    <li class="nav-item navbar-pop">
                        <a class="nav-link" href="<?php echo BASE_URL_PATH . "Home#recommend-products" ?>">Popular</a>
                    </li>
                    <li class="nav-item navbar-pro">
                        <a class="nav-link" href="<?php echo BASE_URL_PATH . "Home#main-products" ?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <!-- Giỏ hàng -->
                    <div class="mx-3 menu-cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge bg-danger rounded-circle item-count"></span>
                    </div>

                    <!-- Modal giỏ hàng -->
                    <div class="cart-popup rounded shadow">
                        <div class="container">
                            <div class="row">
                                <div class="col border-bottom">
                                    <div class="cart-title-box py-3 ps-3">
                                        <span class="cart-heading">Recently added product</span>
                                    </div>
                                </div>
                            </div>

                            <!-- List item -->
                            <div class="row">
                                <div class="col g-0 border-bottom">
                                    <div class="list-item-box px-2">
                                        <div class="row align-items-center cart-item py-2 pe-3 flex-nowrap">
                                            <div class="col-2">
                                                <img src="<?php echo BASE_URL_PATH . "assets/img/pineapple.png" ?>" alt="">
                                            </div>
                                            <div class="col-5">
                                                <span class="cart-item-name">Pineapple</span>
                                            </div>
                                            <div class="col-1">
                                                <span class="cart-item-amount">3</span>
                                            </div>
                                            <div class="col-3">
                                                <span class="cart-item-price">3.6$</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="cart-item-delete">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center cart-item py-2 pe-3 flex-nowrap">
                                            <div class="col-2">
                                                <img src="<?php echo BASE_URL_PATH . "assets/img/pineapple.png" ?>" alt="">
                                            </div>
                                            <div class="col-5">
                                                <span class="cart-item-name">Pineapple</span>
                                            </div>
                                            <div class="col-1">
                                                <span class="cart-item-amount">3</span>
                                            </div>
                                            <div class="col-3">
                                                <span class="cart-item-price">3.6$</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="cart-item-delete">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center cart-item py-2 pe-3 flex-nowrap">
                                            <div class="col-2">
                                                <img src="<?php echo BASE_URL_PATH . "assets/img/pineapple.png" ?>" alt="">
                                            </div>
                                            <div class="col-5">
                                                <span class="cart-item-name">Pineapple</span>
                                            </div>
                                            <div class="col-1">
                                                <span class="cart-item-amount">3</span>
                                            </div>
                                            <div class="col-3">
                                                <span class="cart-item-price">3.6$</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="cart-item-delete">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center cart-item py-2 pe-3 flex-nowrap">
                                            <div class="col-2">
                                                <img src="<?php echo BASE_URL_PATH . "assets/img/pineapple.png" ?>" alt="">
                                            </div>
                                            <div class="col-5">
                                                <span class="cart-item-name">Pineapple</span>
                                            </div>
                                            <div class="col-1">
                                                <span class="cart-item-amount">3</span>
                                            </div>
                                            <div class="col-3">
                                                <span class="cart-item-price">3.6$</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="cart-item-delete">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center cart-item py-2 pe-3 flex-nowrap">
                                            <div class="col-2">
                                                <img src="<?php echo BASE_URL_PATH . "assets/img/pineapple.png" ?>" alt="">
                                            </div>
                                            <div class="col-5">
                                                <span class="cart-item-name">Pineapple</span>
                                            </div>
                                            <div class="col-1">
                                                <span class="cart-item-amount">3</span>
                                            </div>
                                            <div class="col-3">
                                                <span class="cart-item-price">3.6$</span>
                                            </div>
                                            <div class="col-1">
                                                <div class="cart-item-delete">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Xem giỏ hàng -->
                            <div class="row">
                                <div class="col">
                                    <div class="cart-checkout d-flex align-items-center justify-content-end me-2">
                                        <button type="button" class="btn btn-dark rounded-pill">View cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Menu bar -->
                    <?php if (isset($_SESSION["user_id"])) { ?>
                        <div class="menu-bars ms-2 dropdown">
                            <div class="btn">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <ul class="dropdown-menu shadow rounded border-0 p-0 overflow-hidden">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-user" style="color: #097177;"></i>
                                        <span class="ps-1">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-brands fa-shopify" style="color: #f7462e;"></i>
                                        <span class="ps-1">My Purchase</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-bookmark" style="color: #ffce3e;"></i>
                                        <span class="ps-1">Saved</span>
                                    </a>
                                </li>
                                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 0) { ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo BASE_URL_PATH . "Admin" ?>">
                                            <i class="fa-solid fa-database" style="color: #1c9662;"></i>
                                            <span class="ps-1">Dashboard</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <hr class="dropdown-divider my-0">
                                    <a class="dropdown-item" href="<?php echo BASE_URL_PATH . "Signin/logout" ?>">
                                        <i class="fa-solid fa-right-from-bracket" style="color: #f14e63;"></i>
                                        <span class="ps-1">Logout</span>
                                    </a>
                                    </hr>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo BASE_URL_PATH . "Signin" ?>" class="dark-green-btn ms-3" type="button">Sign in</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search -->
    <div class="search-block">
        <div class="search-box">
            <form action="" class="d-flex justify-content-center text-center align-items-center">
                <input type="text" class="search-txt" name="" placeholder="Type to search">
                <a href="" class="search-btn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </form>
        </div>
    </div>

    <!-- Back to top -->
    <div class="back-to-top" id="back-to-top" style="display: none;">
        <div class="back-top-box">
            <i class="fa-solid fa-chevron-up"></i>
        </div>
    </div>
</div>

<script src="<?php echo BASE_URL_PATH . "assets/js/header.js" ?>"></script>