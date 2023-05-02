<div class="shared-container">
    <div class="container-fluid g-0 h-100 w-100">
        <div class="row g-0">
            <div class="col-5">
                <section class="shared-sidebar">
                    <header class="text-center">
                        <a class="navbar-brand fs-3 fw-bold m-0 mb-3 d-block" href="/Home">Dandelion</a>
                        <div class="">
                            <h1 class="fw-bold dosis-font">Experience freshness every day</h1>
                            <h1 class="fw-bold dosis-font">Natural & Nutrition.</h1>
                        </div>
                    </header>
                    <img src="<?php echo BASE_URL_PATH . "./assets/img/5.png" ?>" alt="">
                </section>
            </div>
            <div class="col-7">
                <section>
                    <a href="/Signin" class="btn btn-white border rounded-circle" style="position: fixed; top: 30px; transform: translateX(30px);">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </section>
                <section class="shared-content d-flex justify-content-center align-items-center h-100">
                    <!-- Sign in -->
                    <div class="shared-form">
                        <h2 class="mb-5 tilt-font text-center">Forgot Password?</h2>
                        <form action="" id="forgot_pw" class="row g-3" method="POST">
                            <div class="col-md-12">
                                <p class="mb-0">Enter the email address you used when you joined and we’ll send you
                                    instructions
                                    to reset your password.</p>
                            </div>
                            <div class="col-md-12">
                                <p class="mb-0">For security reasons, we do NOT store your password. So rest assured
                                    that we will
                                    never send your password via email.</p>
                            </div>
                            <div class="col-md-12">
                                <label for="forget" class="form-label fw-bold">Email Address</label>
                                <input type="email" name="forget" class="form-control form-control-lg input-color" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="btnReset" class="btn btn-dark w-100 mt-3">Send Reset
                                    Instructions</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>