<?php

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

$phraseBuilder = new PhraseBuilder(5, '0123456789');
$builder = new CaptchaBuilder(null, $phraseBuilder);
$builder->build();

$_SESSION['phrase'] = $builder->getPhrase();

?>


<div class="shared-container">
    <div class="container-fluid g-0 h-100 w-100">
        <div class="row g-0">
            <div class="col-5">
                <section class="shared-sidebar">
                    <header class="text-center">
                        <a class="navbar-brand fs-3 fw-bold m-0 mb-3 d-block" href="<?php echo BASE_URL_PATH . "Home" ?>">Dandelion</a>
                        <div class="">
                            <h1 class="fw-bold dosis-font">Experience freshness every day</h1>
                            <h1 class="fw-bold dosis-font">Natural & Nutrition.</h1>
                        </div>
                    </header>
                    <img src="<?php echo BASE_URL_PATH . "assets/img/4.png" ?>" alt="">
                </section>
            </div>
            <div class="col-7">
                <section class="shared-content d-flex justify-content-center align-items-center h-100">
                    <!-- Sign in -->
                    <div class="shared-form">
                        <h2 class="mb-5 tilt-font text-center">Sign in to Dandelion</h2>
                        <form action="/Signin/login" id="sigin" method="POST" class="row g-3">
                            <div class="col-md-12">
                                <label for="username" class="form-label fw-bold">Username</label>
                                <input type="text" name="username" value="<?php echo $_POST["username"] ?? "" ?>" class="form-control form-control-lg input-color" required>
                                <div class="text-danger" style="font-size: 0.8rem;">
                                    <?php echo $data["data"]["usernameError"] ?? "" ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <label for="" class="form-label fw-bold">Password</label>
                                    <a href="<?php echo BASE_URL_PATH . "ForgotPW" ?>" class="text-decoration-none text-link">Forgot
                                        password?
                                    </a>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg input-color" id="" required>
                                <div class="text-danger" style="font-size: 0.8rem;">
                                    <?php echo $data["data"]["passwordError"] ?? "" ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="captcha" class="form-label fw-bold">Enter Captcha</label>
                                <input type="text" name="captcha" class="form-control form-control-lg input-color" required>
                                <div class="text-danger" style="font-size: 0.8rem;">
                                    <?php echo $data["data"]["captchaError"] ?? "" ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label fw-bold">Captcha Code</label>
                                <img src="<?php echo $builder->inline()  ?? "" ?>" alt="" class="rounded" style="width: 100%; height: 39px; object-fit: cover;">
                            </div>

                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label user-select-none" for="exampleCheck1">Remember
                                        me</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark w-100 mt-2">Sign In</button>
                            </div>
                        </form>
                        <div class="not-member d-flex justify-content-center mt-3">
                            <span>Not a member?
                                <a href="<?php echo BASE_URL_PATH . "Signup" ?>" class="text-decoration-none text-link">Sign up
                                    now</a>
                            </span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($data["result"])) {
    echo $data["result"];
}
?>