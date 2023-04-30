<?php

if (isset($data['data']['categoryRows']) && isset($data['data']['unitRows'])) {
    $categories = $data['data']['categoryRows'];
    $units = $data['data']['unitRows'];
}


?>


<div>
    <h1 class="mt-4 pb-2 border-bottom">Add Product</h1>

    <form action="" id="add" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-2">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" value="<?php echo $_POST["name"] ?? "" ?>" id="name" class="form-control form-control input-color " required>
            <div class="text-danger" id="nameErr" style="font-size: 0.8rem; ">
                <?php echo $data['errors']['nameErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="number" name="price" value="<?php echo $_POST["price"] ?? "" ?>" id="price" min="0" step="0.01" class="form-control form-control input-color " required>
            <div class="text-danger" id="priceErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['priceErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="weight" class="form-label fw-bold">Weight</label>
            <input type="number" name="weight" value="<?php echo $_POST["weight"] ?? "" ?>" id="weight" min="1" step="1" class="form-control form-control input-color " required>
            <div class="text-danger" id="weightErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['weightErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="unit" class="form-label fw-bold">Unit</label>
            <select class="form-select" id="selectUnit">
                <?php
                foreach ($units as $unit) {
                ?>
                    <option <?php if (isset($_POST["unit"]) && $_POST["unit"] == $unit['UNITID']) echo "selected"; ?> value="<?php echo $unit['UNITID'] ?>"><?php echo $unit['UNITNAME'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="unit" value="<?php if (isset($_POST["unit"])) echo $_POST["unit"];
                                                    else echo $units[0]['UNITID']; ?>" id="unit" class="form-control form-control input-color d-none" required>
            <div class="text-danger" id="unitErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['unitErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label fw-bold">Category</label>
            <select class="form-select" id="selectCate">
                <?php
                foreach ($categories as $category) {
                ?>
                    <option <?php if (isset($_POST["category"]) && $_POST["category"] == $category['CATEGORYID']) echo "selected"; ?> value="<?php echo $category['CATEGORYID'] ?>"><?php echo $category['CATEGORYNAME'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="category" value="<?php if (isset($_POST["category"])) echo $_POST["category"];
                                                        else echo $categories[0]['CATEGORYID']; ?>" id="category" class="form-control form-control input-color d-none" required>
            <div class="text-danger" id="cateErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['cateErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="quantity" class="form-label fw-bold">Quantity</label>
            <input type="number" name="quantity" value="<?php echo $_POST["quantity"] ?? "" ?>" min="0" id="quantity" class="form-control form-control input-color " required>
            <div class="text-danger" id="quantityErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['quantityErr'] ?? "" ?>
            </div>
        </div>
        <div class="col-md-4">
            <label for="file" class="form-label fw-bold">Image</label>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4 w-100">
                    <img id="img" src="<?php echo BASE_URL_PATH . "assets/img/upload.gif" ?>" class="rounded" style="width: 100%; height: 200px; object-fit: cover;" />
                </div>
                <div class="" id="choose-file">
                    <div class="btn btn-dark rounded-pill btn-sm ">
                        <label class="form-label text-white m-1" for="fileUpload">Choose file</label>
                        <input type="file" accept="image/jpeg, image/png" name="fileUpload" id="fileUpload" class="form-control d-none" />
                    </div>
                </div>
            </div>
            <div class="text-danger text-center mt-2" id="imgErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['imgErr'] ?? "" ?>
            </div>
            <!-- Show toast msg when upload having error -->
            <?php
            if (isset($data['toastImgErr'])) {
                print_r(stackMessageWrapper($data['toastImgErr']));
            };
            ?>
        </div>

        <div class="col-md-8">
            <label for="desc" class="form-label fw-bold">Short Description</label>
            <textarea name="desc" class="form-control" placeholder="Leave a short description here" id="desc" style="height: 200px" required><?php echo $_POST["desc"] ?? "" ?></textarea>
            <div class="text-danger" id="descErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['descErr'] ?? "" ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="confirmPassword" class="form-label fw-bold">Detail Information</label>
            <!-- Editor -->
            <div id="editor-container rounded-3">
                <textarea name="information" id="editor2"><?php echo $_POST["information"] ?? "" ?></textarea>
            </div>
            <div class="text-danger" id="infoErr" style="font-size: 0.8rem;">
                <?php echo $data['errors']['infoErr'] ?? "" ?>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" name="submit_add" class="btn btn-dark w-100 mt-3">Add Product</button>
        </div>
    </form>

    <div id="message"></div>

</div>

<script src="http://ct271.test/assets/ckeditor5/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {

        })
        .catch(error => {
            console.error(error);
        });


    //Fill input when change option
    $(function() {
        $('select#selectCate').change(function() {
            let value = $(this).val().trim();
            $('#category').val(value);
        })

        $('select#selectUnit').change(function() {
            let value = $(this).val().trim();
            $('#unit').val(value);
        })
    })

    //Preview Img when change
    $(function() {
        const fileInput = $('input:file#fileUpload');
        const img = $('#img');

        fileInput.change(function(e) {
            img.prop('src', URL.createObjectURL(e.target.files[0]));
        });
    })
</script>

<?php
if (isset($data["msgResult"])) {
    if ($data["msgResult"]["isSuccess"]) {
        echo $data["msgResult"]["msg"];
        echo '<script>
        setTimeout(function() {
            window.location.assign("http://ct271.test/Admin/NewProduct");
        }, 2000);
            </script>';
        exit();
    } else {
        echo $data["msgResult"]["msg"];
    }
};
?>