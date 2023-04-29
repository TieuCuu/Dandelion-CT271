<?php


// print_r($data["products"][0]['ProductInfo']);
?>

<div>
    <h1 class="mt-4 pb-2 border-bottom">Products Table</h1>

    <div class="mt-5 mb-3 d-flex justify-content-end">
        <a href="<?php echo BASE_URL_PATH . 'Admin/NewProduct' ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Img</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Img</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $productArr = $data["products"];
                    foreach ($productArr as $product) {
                    ?>
                        <tr>
                            <td><?php echo $product["ProductID"] ?? 'Error' ?></td>
                            <td><?php echo $product["ProductName"] ?? 'Error' ?></td>
                            <td><?php echo $product["CategoryID"] ?? 'Error' ?></td>
                            <td>
                                <img src="<?php echo BASE_URL_PATH . "assets/img/products/" . $product["ProductImg"] ?>" class="rounded-1" style="width: 80px; height:40px; object-fit: cover;">
                            </td>
                            <td><?php echo $product["ProductPrice"] ?? 'Error' ?></td>
                            <td><?php echo $product["ProductQuantity"] ?? 'Error' ?></td>
                            <td>
                                <a href="<?php echo BASE_URL_PATH . "Admin/Product/" . $product["ProductID"] ?? 'false' ?>" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="/Admin/DeleteProduct" method="POST" class="d-inline-block">
                                    <input type="hidden" name="product_id" value="<?php echo $product["ProductID"] ?? '' ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="delete-product">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<script src="<?php echo BASE_URL_PATH . "assets/datatable/datatable.js" ?>"></script>
<script src="<?php echo BASE_URL_PATH . "assets/datatable/simple-datatables.min.js" ?>"></script>

<?php
if (isset($data["result"])) {
    echo $data["result"];
}
?>