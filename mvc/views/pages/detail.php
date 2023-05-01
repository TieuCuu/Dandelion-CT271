<?php

// print_r($data["data"][0]->ProductName);
// print_r($data["data"][0]->ProductImg);
?>

<div class="page-product-container my-3">
    <div class="container">

        <!-- Breadcrumb -->
        <section class="pre-breadcrumb ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-3">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo BASE_URL_PATH . "Home" ?>">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="text-decoration-none" href="<?php echo BASE_URL_PATH . "Home#main-products" ?>">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $data["data"][0]->ProductName; ?></li>
                </ol>
            </nav>
        </section>

        <!-- Product detail -->
        <section class="product__detail-container my-3 bg-white shadow rounded p-3">
            <div class="row">
                <div class="col-5">
                    <div class="product__detail-preview">
                        <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner rounded">

                                <div class="carousel-item active" data-bs-interval="4000">
                                    <img src="<?php echo BASE_URL_PATH . "assets/img/products/" . $data["data"][0]->ProductImg ?>" class="d-block w-100 " alt="product image">
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <img src="<?php echo BASE_URL_PATH . "assets/img/products/" . $data["data"][0]->ProductImg ?>" class="d-block w-100 " alt="product image">
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <img src="<?php echo BASE_URL_PATH . "assets/img/products/" . $data["data"][0]->ProductImg ?>" class="d-block w-100 " alt="product image">
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#product-carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="product__detail-info">
                        <h1 class="product__detail-title mb-0"><?php echo htmlspecialchars($data["data"][0]->ProductName); ?></h1>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="product__rating-block pe-3 py-3">
                                    <div class="product__rating-icon">
                                        <i class="fa-regular fa-star product__rating--active"></i>
                                        <i class="fa-regular fa-star product__rating--active"></i>
                                        <i class="fa-regular fa-star product__rating--active"></i>
                                        <i class="fa-regular fa-star product__rating--active"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-review border-start border-end px-3 py-1">145 Reviews</div>
                                <div class="product-sold p-3">289 Sold</div>
                            </div>

                            <div class="me-2 recommend-heart user-select-none" style="position: unset !important; cursor: pointer;">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: rgba(0, 0, 0, 0.5); height: 24px; width: 24px; stroke: #f9dfe4; stroke-width: 2; overflow: visible;">
                                    <path d="m16 28c7-4.733 14-10 14-17 0-1.792-.683-3.583-2.05-4.95-1.367-1.366-3.158-2.05-4.95-2.05-1.791 0-3.583.684-4.949 2.05l-2.051 2.051-2.05-2.051c-1.367-1.366-3.158-2.05-4.95-2.05-1.791 0-3.583.684-4.949 2.05-1.367 1.367-2.051 3.158-2.051 4.95 0 7 7 12.267 14 17z">
                                    </path>
                                </svg>
                            </div>
                        </div>


                        <p class="product__detail-desc">
                            <?php echo htmlspecialchars_decode(stripslashes($data["data"][0]->ProductShortDesc)) ?>
                        </p>

                        <div class="d-flex flex-column">
                            <div class="product__detail-boxprice d-flex align-items-center mb-4">
                                <h4 class="m-0 me-3">Price:</h4>
                                <div class="d-flex align-items-center justify-content-around">
                                    <strong><?php echo "$" . htmlspecialchars(round($data["data"][0]->ProductPrice, 1)); ?></strong>
                                    <span><?php echo "$" . htmlspecialchars(intval($data["data"][0]->ProductPrice * 1.5)); ?></span>
                                </div>
                            </div>
                            <div class=" d-flex align-items-center mb-4">
                                <h4 class="m-0 me-3">Unit:</h4>
                                <div><?php echo htmlspecialchars($data["data"][0]->ProductWeight) . " " . htmlspecialchars($data["data"][0]->UnitName) ?></div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="m-0 me-3">Shipping:</h4>
                                <form action="" class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <select id="province" name="provinces" class="form-select form-select-sm " required="">
                                            <option>Province / City</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select id="district" name="district" class="form-select form-select-sm" required="">
                                            <option>District / Town</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select id="ward" name="ward" class="form-select form-select-sm" required="">
                                            <option>Wards</option>
                                        </select>
                                    </div>
                                    <input class="billing_address_1" name="" type="hidden" value="">
                                    <input class="billing_address_2" name="" type="hidden" value="">
                                </form>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="m-0 me-3">Quantity:</h4>
                                <input name="quantity" class="shadow-none" type="number" value="1" min="1" max="<?php echo htmlspecialchars($data["data"][0]->ProductQuantity); ?>" <?php if ($data["data"][0]->ProductQuantity == 0) echo 'disabled' ?> step="1" />
                                <span class="ms-3 text-muted" style="font-size: 0.875rem;"><?php echo htmlspecialchars($data["data"][0]->ProductQuantity) ?> pieces available</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <button class="btn dark-green-btn dark-green-btn--lg dark-green-btn--option shadow-none rounded-1 me-3">
                                    <i class="fa-solid fa-cart-plus me-2"></i>
                                    <span>
                                        Add to cart
                                    </span>
                                </button>
                                <button class="btn dark-green-btn dark-green-btn--lg shadow-none rounded-1">Buy
                                    now</button>
                            </div>


                        </div>

                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product content -->
        <section class="product__content-container my-3 bg-white shadow rounded p-4">
            <div class="">
                <h1 class="product__content-title p-3 bg-light rounded-3">Product
                    Description</h1>
                <div class="product__content-info">
                    <div class="product__editor-wrap">
                        <?php echo htmlspecialchars_decode(stripslashes($data["data"][0]->ProductInfo)) ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product review -->
        <section class="product__review-container p-3 rounded d-flex justify-content-center align-items-center flex-column gap-3">

            <div class="product__review-wrap d-flex flex-column gap-4">
                <h1 class="product__content-title mt-3">Product Ratings</h1>
                <div class="product__rating-box bg-white border rounded-3 d-flex align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-column px-4 border-end">
                            <div>
                                <span class="rating-avg">4.8</span>
                            </div>
                            <div class="product__rating-icon">
                                <i class="fa-regular fa-star product__rating--active" style="font-size: 4.375rem;"></i>
                            </div>
                            <div class="rating-count">
                                145 reviews</div>
                        </div>

                        <div>
                            <ul class="px-4 m-0 border-end">
                                <li class="d-flex align-items-center gap-3">
                                    <span>5★</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label for="">(221)</label>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <span>4★</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label for="">(22)</label>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <span>3★</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label for="">(9)</label>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <span>2★</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label for="">(3)</label>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <span>1★</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label for="">(3)</label>
                                </li>
                            </ul>
                        </div>

                        <div class="d-flex flex-wrap gap-3 justify-content-center px-4">
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>All</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>5★ (221)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>4★ (22)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>3★ (9)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>2★ (3)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>1★ (3)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>With Comments (145)</span>
                                </button>
                            </div>
                            <div>
                                <button class="btn dark-green-btn dark-green-btn--sm dark-green-btn--option shadow-none rounded-1 ">
                                    <span>With Media (101)</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product comment list -->
                <div class="product__comment-wrap">

                    <!-- User Comment -->
                    <div class="product__comment-list d-flex gap-3 py-4 border-bottom border-2">
                        <div class="product__rating-avatar">
                            <img class="rounded-circle" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="avatar">
                        </div>
                        <div class="product__rating-main">
                            <div class="product__rating-author-name">XiaoJiu</div>
                            <div>
                                <div class="product__rating-icon">
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                            </div>
                            <p class="product__rating-comment">
                                The
                                process was smooth,
                                after providing the required
                                info, Pragyesh sent me an
                                outstanding packet of wireframes. Thank you a lot!
                            </p>
                            <div class="product__rating-media d-flex align-items-center gap-2">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                            </div>
                            <div class="product__rating-time">
                                <span>Published 4 weeks ago</span>
                            </div>
                            <div class="product__rating-helpful d-flex gap-3">
                                <div>
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    <span>Helpful</span>
                                </div>
                                <div>
                                    <i class="fa-regular fa-thumbs-down"></i>
                                    <span>Not Helpful</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product__comment-list d-flex gap-3 py-4 border-bottom border-2">
                        <div class="product__rating-avatar">
                            <img class="rounded-circle" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="avatar">
                        </div>
                        <div class="product__rating-main">
                            <div class="product__rating-author-name">XiaoJiu</div>
                            <div>
                                <div class="product__rating-icon">
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                            </div>
                            <p class="product__rating-comment">
                                The
                                process was smooth,
                                after providing the required
                                info, Pragyesh sent me an
                                outstanding packet of wireframes. Thank you a lot!
                            </p>
                            <div class="product__rating-media d-flex align-items-center gap-2">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                                <img class="rounded" src="<?php echo BASE_URL_PATH . "assets/img/avatar.jpeg" ?>" alt="media">
                            </div>
                            <div class="product__rating-time">
                                <span>Published 4 weeks ago</span>
                            </div>
                            <div class="product__rating-helpful d-flex gap-3">
                                <div>
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    <span>Helpful</span>
                                </div>
                                <div>
                                    <i class="fa-regular fa-thumbs-down"></i>
                                    <span>Not Helpful</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<script src="<?php echo BASE_URL_PATH . "assets/bootstrap5/bootstrap-5.2.3-dist/js/bootstrap-input-spinner.js" ?>"></script>
<script>
    let config = {
        buttonsWidth: "0.5rem",
        template: // the template of the input
            '<div class="input-group ${groupClass}" style="width: 20% !important; ">' +
            '<button style="min-width: ${buttonsWidth}; border: 1px solid #ced4da;" class="btn btn-decrement ${buttonsClass} btn-minus" type="button">${decrementButton}</button>' +
            '<input type="text" inputmode="decimal" style="text-align: ${textAlign}; border: 1px solid #ced4da;" class="form-control form-control-text-input"/>' +
            '<button style="min-width: ${buttonsWidth}; border: 1px solid #ced4da;" class="btn btn-increment ${buttonsClass} btn-plus" type="button">${incrementButton}</button>' +
            '</div>'
    }
    $("input[type='number'][name='quantity']").inputSpinner(config);
</script>

<script src="<?php echo BASE_URL_PATH . "assets/js/ProvinceAPI.js" ?>"></script>
<script src="<?php echo BASE_URL_PATH . "assets/js/base.js" ?>"></script>