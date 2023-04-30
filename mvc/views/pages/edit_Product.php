<?php

$categories = $data['data']['categoryRows'];
$units = $data['data']['unitRows'];

if (empty($data["data"]["resultError"])) {

    $arr = $data["data"]["row"];
    foreach ($arr as $obj) {
        $ProductID = $obj->ProductID;
        $ProductName = $obj->ProductName;
        $CategoryID = $obj->CategoryID;
        $ProductPrice = $obj->ProductPrice;
        $ProductQuantity = $obj->ProductQuantity;
        $ProductImg = $obj->ProductImg;
        $ProductShortDesc = $obj->ProductShortDesc;
        $ProductInfo = $obj->ProductInfo;
    }
} else {
    echo $data["data"]["resultError"];
    echo '<h1 class="mt-4 pb-2 ">Oops! Product not found!</h1>';
    exit();
}

?>

<div>
    <h1 class="mt-4 pb-2 border-bottom">Edit Product</h1>

    <form action="" id="edit" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-2">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($ProductName) ?? $nameErr = 'Error' ?>" id="name" class="form-control form-control input-color " required>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $nameErr ?? ''; ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="number" name="price" value="<?php echo htmlspecialchars($ProductPrice) ?? $priceErr = 'Error' ?>" id="price" min="0" step="0.01" class="form-control form-control input-color " required>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $priceErr ?? ''; ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="weight" class="form-label fw-bold">Weight</label>
            <input type="number" name="weight" value="<?php echo htmlspecialchars($ProductWeight) ?? $weightErr = 'Error' ?>" id="weight" min="1" step="1" class="form-control form-control input-color " required>
            <div class="text-danger" id="weightErr" style="font-size: 0.8rem;">
                <?php echo $weightErr ?? '' ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="unit" class="form-label fw-bold">Unit</label>
            <select class="form-select" id="selectUnit">
                <?php
                foreach ($units as $unit) {
                ?>
                    <option <?php echo $unit['UNITID'] == $UnitID ? 'selected' : '' ?> value="<?php echo htmlspecialchars($unit['UNITID']) ?>"><?php echo htmlspecialchars($unit['UNITNAME']) ?></option>
                <?php } ?>
            </select>
            <input type="text" name="unit" value="<?php echo htmlspecialchars($UnitID) ?? $unitErr = 'Error' ?>" id="unit" class="form-control form-control input-color d-none" required>
            <div class="text-danger" id="unitErr" style="font-size: 0.8rem;">
                <?php echo $unitErr ?? ''; ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label fw-bold">Category</label>
            <select class="form-select" id="selectCate">
                <?php
                foreach ($categories as $category) {
                ?>
                    <option <?php echo $category['CATEGORYID'] == $CategoryID ? 'selected' : '' ?> value="<?php echo htmlspecialchars($category['CATEGORYID']) ?>"><?php echo htmlspecialchars($category['CATEGORYNAME']) ?></option>
                <?php } ?>
            </select>
            <input type="text" name="category" value="<?php echo htmlspecialchars($CategoryID) ?? $categoryErr = 'Error' ?>" id="category" class="form-control form-control input-color d-none" required>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $categoryErr ?? ''; ?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="quantity" class="form-label fw-bold">Quantity</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($ProductQuantity) ?? $quantityErr = 'Error' ?>" min="0" id="quantity" class="form-control form-control input-color " required>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $quantityErr ?? ''; ?>
            </div>
        </div>
        <div class="col-md-4">
            <label for="file" class="form-label fw-bold">Image</label>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4 w-100">
                    <img id="img" src="<?php echo BASE_URL_PATH . "assets/img/products/" .  $ProductImg ?>" class="rounded" style="width: 100%; height: 200px; object-fit: cover;" />
                </div>
                <div class="" id="choose-file">
                    <div class="btn btn-dark rounded-pill btn-sm ">
                        <label class="form-label text-white m-1" for="fileUpload">Choose file</label>
                        <input type="file" accept="image/jpeg, image/png" name="fileUpload" id="fileUpload" class="form-control d-none" />
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <label for="desc" class="form-label fw-bold">Short Description</label>
            <textarea name="desc" class="form-control" placeholder="Leave a short description here" value="" id="desc" style="height: 200px" required><?php echo htmlspecialchars($ProductShortDesc) ?? $descErr = "Error" ?></textarea>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $descErr ?? ''; ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="confirmPassword" class="form-label fw-bold">Detail Information</label>
            <!-- Editor -->
            <div id="editor-container rounded-3">
                <textarea name="information" id="editor" required><?php echo htmlspecialchars_decode($ProductInfo) ?? $informationErr = "Error" ?></textarea>
            </div>
            <div class="text-danger" style="font-size: 0.8rem;">
                <?php echo $informationErr ?? ''; ?>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" name="submit_update" class="btn btn-dark w-100 mt-3">Update Product</button>
        </div>
    </form>

    <div id="message"></div>

</div>

<script src="http://ct271.test/assets/ckeditor5/ckeditor.js"></script>


<!-- Create editor script -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
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
    })

    //Preview Img when change
    $(function() {
        const fileInput = $('input:file#fileUpload');
        const img = $('#img');

        fileInput.change(function(e) {
            img.prop('src', URL.createObjectURL(e.target.files[0]));
        });
    })

    //Call Ajax edit product when submit
    $("#edit").submit(function(e) {

        e.preventDefault();

        //need this to upload file with ajax
        let form = $('#edit')[0];
        let formData = new FormData(form);

        $.ajax({
            url: 'http://ct271.test/Ajax/EditProduct/<?php echo $ProductID ?>',
            method: "POST",
            data: formData, // serializes the form's elements.
            processData: false,
            contentType: false,
            success: function(data) {
                $('#message').html(data);
            },
            error: function(req, err) {
                console.log(err);
            }
        });

    });
</script>