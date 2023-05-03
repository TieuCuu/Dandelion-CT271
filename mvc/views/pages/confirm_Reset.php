<?php

$available = $data["data"]["available"] ?? false;
if (isset($data["data"]["isSuccess"])) {
    $isSuccess = $data["data"]["isSuccess"];
}
?>

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

                    <div class="shared-form <?php if (isset($data["data"]["isSuccess"])) echo 'd-none'; ?>">
                        <?php if ($available) { ?>
                            <h2 class="mb-4 tilt-font text-center">Password Reset Confirmation</h2>
                            <form action="" id="confirm_reset" class="row g-3" method="POST">
                                <div class="col-md-12">
                                    <p class="mb-0">
                                        Please enter your new password.
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <label for="new_pass" class="form-label fw-bold">New Password*</label>
                                    <input type="password" name="new_pass" class="form-control form-control-lg input-color" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="confirm_pass" class="form-label fw-bold">New Password Confirmation*</label>
                                    <input type="password" name="confirm_pass" class="form-control form-control-lg input-color" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="btnConfirm" class="btn btn-dark w-100 mt-3">Confirm Reset Password</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <h2 class="mb-4 tilt-font text-center">Whoops, that's an expired link</h2>
                            <p>Sorry, your password reset link <span class="fw-bold">has expired</span>. For security reasons, the link is only valid for a limited time period. Please request a new password reset link and try again. Thank you.</p>
                        <?php } ?>
                    </div>
                    <div class="shared-form text-center <?php if (isset($data["data"]["isSuccess"]) && $isSuccess) echo 'd-block';
                                                        else echo 'd-none'; ?>">
                        <h2 class="mb-4 tilt-font text-center">
                            <i class="fa-solid fa-circle-check me-2" style="color: #209e71;"></i>
                            Password Reset Successfully
                        </h2>
                    </div>
                    <div class="shared-form text-center <?php if (isset($data["data"]["isSuccess"]) && !$isSuccess) echo 'd-block';
                                                        else echo 'd-none'; ?>">
                        <h2 class="mb-4 tilt-font text-center">
                            <i class="fa-solid fa-circle-xmark me-2" style="color: #d24343;"></i>
                            Password Reset Fail
                        </h2>
                        <p>
                            Something goes wrong. Please try again!
                        </p>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>