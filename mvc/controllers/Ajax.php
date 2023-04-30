<?php
class Ajax extends Controller
{
    public $ProductModel;

    function __construct()
    {
        $this->ProductModel = $this->model("ProductModel");
    }

    public function Pagination($category)
    {
        $limit = 10;
        $page = 0;

        $display = "";

        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }


        if (empty($category)) {
            $category = 'All';
        } else {
            $category = ucfirst($category);
        }

        $start_from = ($page - 1) * $limit;

        if ($category == 'All') {
            $products = $this->ProductModel->GetRows("SELECT * FROM PRODUCTS ORDER BY ID LIMIT $start_from, $limit");
            $count_products = $this->ProductModel->GetSum("SELECT COUNT(id) FROM PRODUCTS");
        } else {
            $products = $this->ProductModel->GetRows("SELECT * FROM PRODUCTS WHERE CATEGORYID = ? ORDER BY ID LIMIT $start_from, $limit", [$category]);
            $count_products = $this->ProductModel->GetSum("SELECT COUNT(id) FROM PRODUCTS WHERE CATEGORYID = ?", [$category]);
        }


        if ($count_products > 0) {
            foreach ($products as $product) {
                // var_dump($product['ProductName']);

                $display .= '
                <div class="col">
                <div class="card mb-5 border-0 rounded-3">
                    <a href="' . BASE_URL_PATH . 'Product/Detail/' . $product['ProductID'] . '" class="text-reset text-decoration-none ">
                        <img src="' . BASE_URL_PATH . 'assets/img/products/' . $product['ProductImg'] . '" class="card-img-top img-fluid recommend-img" alt="...">
                        <div class="recommend-heart">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: rgba(0, 0, 0, 0.5); height: 24px; width: 24px; stroke: #fff; stroke-width: 2; overflow: visible;">
                                <path d="m16 28c7-4.733 14-10 14-17 0-1.792-.683-3.583-2.05-4.95-1.367-1.366-3.158-2.05-4.95-2.05-1.791 0-3.583.684-4.949 2.05l-2.051 2.051-2.05-2.051c-1.367-1.366-3.158-2.05-4.95-2.05-1.791 0-3.583.684-4.949 2.05-1.367 1.367-2.051 3.158-2.051 4.95 0 7 7 12.267 14 17z">
                                </path>
                            </svg>
                        </div>
                        <div class="card-body px-2">
                            <div class="text-center mb-2">
                                <div class="card-title mb-0 product-name tilt-font">' . $product['ProductName'] . '</div>
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <span class="fw-bold">$' . $product['ProductPrice'] . '</span>
                                    
                                </p>
                            </div>
                            <div class="product__rating-block d-flex justify-content-between align-items-center py-2">
                                <div class="product__rating-icon">
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star product__rating--active"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <span>81 sold</span>
                            </div>
                            <div>
                                <button type="button" class="btn btn-dark cart-btn rounded-circle d-flex justify-content-center align-items-center text-center position-absolute top-100 start-50 translate-middle" style="height: 36px; width: 36px;">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                ';
            }
        } else {
            $display .= '
                <div>Oops! There is no data found!</div>
            ';
        }
        if ($category == 'All') {
            $total_rows = $this->ProductModel->GetSum("SELECT COUNT(id) FROM PRODUCTS");
        } else {
            $total_rows = $this->ProductModel->GetSum("SELECT COUNT(id) FROM PRODUCTS  WHERE CATEGORYID = ?", [$category]);
        }

        $total_pages = ceil(($total_rows / $limit));

        $displayPage = '';

        // if ($page > 1) {
        //     $previous = $page - 1;

        //     $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="1" style="width: 36px; height: 36px;"><span style="transform: translateY(-2%);">&laquo;</span></li>';
        //     //$displayPage .= '<li class="page-item" page-id="' . $previous . '"></li>';
        // }

        // for ($i = 1; $i <= $total_pages; $i++) {
        //     $active_class = "";
        //     if ($i == $page) {
        //         $active_class = "active";
        //     }
        //     $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1 ' . $active_class . '" page-id="' . $i . '" style="width: 36px; height: 36px;"><span>' . $i . '</span></li>';
        // }

        // if ($page < $total_pages) {
        //     $page++;
        //     // $displayPage .= '<li class="page-item" page-id="' . $page . '">';
        //     $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="' . $total_pages . '" style="width: 36px; height: 36px;"><span style="transform: translateY(-2%);">&raquo;</span></li>';
        // }

        $beforePages = $page - 1;
        $afterPages = $page + 1;

        if ($page > 1) {
            $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="1" style="width: 36px; height: 36px;"><span style="transform: translateY(-2%);">&laquo;</span></li>';
        }

        if ($page > 2) {
            $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="1" style="width: 36px; height: 36px;"><span>1</span></li>';
            if ($page > 3) {
                $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" style="width: 36px; height: 36px;"><span>...</span></li>';
            }
        }

        for ($i = $beforePages; $i <= $afterPages; $i++) {

            if ($i > $total_pages) {
                continue;
            }

            if ($i == 0) {
                $i += 1;
            }

            $active_class = "";

            if ($i == $page) {
                $active_class = "active";
            }

            $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1 ' . $active_class . '" page-id="' . $i . '" style="width: 36px; height: 36px;"><span>' . $i . '</span></li>';
        }

        if ($page < $total_pages - 1) {
            if ($page < $total_pages - 2) {
                $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" style="width: 36px; height: 36px;"><span>...</span></li>';
            }
            $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="' . $total_pages . '" style="width: 36px; height: 36px;"><span>' . $total_pages . '</span></li>';
        }

        if ($page < $total_pages) {
            $displayPage .= '<li class="page-item btn border rounded-circle d-flex justify-content-center align-items-center mx-1" page-id="' . $total_pages . '" style="width: 36px; height: 36px;"><span style="transform: translateY(-2%);">&raquo;</span></li>';
        }


        $return = array();
        $html1 = '';
        $html2 = '';

        $html1 .= $display;
        $html2 .= $displayPage;

        $return['html1'] = $html1;
        $return['html2'] = $html2;

        echo json_encode($return);
        exit;
    }

    public function EditProduct($id)
    {
        $productID = $id;

        $row = json_decode($this->ProductModel->GetProductByID($productID));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


            if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["weight"]) && isset($_POST["unit"]) && isset($_POST["category"]) && isset($_POST["quantity"]) && isset($_POST["desc"]) && isset($_POST["information"])) {

                //set default value in database
                $name = $row[0]->ProductName;
                $price = $row[0]->ProductPrice;
                $weight = $row[0]->ProductWeight;
                $unit = $row[0]->UnitID;
                $category = $row[0]->CategoryID;
                $quantity = $row[0]->ProductQuantity;
                $desc = $row[0]->ProductShortDesc;
                $info = $row[0]->ProductInfo;
                $img = $row[0]->ProductImg;

                $errors = [];


                if (!empty($_POST["name"])) {
                    if (strlen($_POST["name"]) >= 25) {
                        $name = $_POST["name"];
                    } else {
                        array_push($errors, showMessage("error", "Name field at least 25 characters long!"));
                    }
                }

                if (!empty($_POST["price"])) {
                    $price = floatval($_POST["price"]);
                }

                if (!empty($_POST["weight"])) {
                    $weight = intval($_POST["weight"]);
                }

                if (!empty($_POST["unit"])) {
                    $unit = $_POST["unit"];
                }

                if (!empty($_POST["category"])) {
                    $category = ucfirst($_POST["category"]);
                }

                //quantity can be 0
                if (!empty($_POST["quantity"] || $_POST["quantity"] == 0)) {
                    $quantity = $_POST["quantity"];
                }

                if (!empty($_POST["desc"])) {
                    if (strlen($_POST["desc"]) >= 100) {
                        $desc = $_POST["desc"];
                    } else {
                        array_push($errors, showMessage("error", "Description field at least 100 characters long!"));
                    }
                }

                if (!empty($_POST["information"])) {
                    if (strlen($_POST["information"]) >= 500) {
                        $info = $_POST["information"];
                    } else {
                        array_push($errors, showMessage("error", "Detail Information field at least 500 characters long!"));
                    }
                } else {
                    array_push($errors, showMessage("error", "Please fill into description fields"));
                }


                //if file empty $_FILES array return having (error = 4) || (size = 0 & error = 0)
                if (isset($_FILES["fileUpload"]) && ($_FILES["fileUpload"]["error"] !== 4 || ($_FILES["fileUpload"]["size"] !== 0 && $_FILES["fileUpload"]["error"] !== 0))) {

                    //default route public/
                    $targetDir =  "assets/img/products/";

                    //basename return name of file
                    $targetFile = $targetDir . basename($_FILES["fileUpload"]["name"]);
                    $hasErrors = false;

                    //var_dump(basename($_FILES["fileUpload"]["name"]));
                    //pathinfo return file path .jpg, .png
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    $extensions = array("jpeg", "jpg", "png", "gif");

                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
                    if ($check === false) {
                        array_push($errors, showMessage("error", "File is not an image."));
                        $hasErrors = true;
                    }

                    // Check file size
                    if ($_FILES["fileUpload"]["size"] > 5000000) {
                        array_push($errors, showMessage("error", "Sorry, your file is too large."));
                        $hasErrors = true;
                    }

                    // Allow certain file formats
                    if (!in_array($imageFileType, $extensions)) {
                        array_push($errors, showMessage("error", "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
                        $hasErrors = true;
                    }

                    if ($hasErrors) {
                        array_push($errors, showMessage("error", "Sorry, your file was not uploaded."));
                    } else {
                        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFile)) {
                            $img = basename($_FILES["fileUpload"]["name"]);
                        } else {
                            array_push($errors, showMessage("error", "Sorry, there was an error uploading your file."));
                        }
                    }
                }

                $editResult = $this->ProductModel->EditProduct("
                    UPDATE PRODUCTS SET PRODUCTNAME = ?, 
                                        PRODUCTPRICE = ?, 
                                        PRODUCTWEIGHT = ?,
                                        UNITID = ?,
                                        CATEGORYID = ?, 
                                        PRODUCTQUANTITY = ?, 
                                        PRODUCTSHORTDESC = ?, 
                                        PRODUCTINFO = ?, 
                                        PRODUCTIMG = ? WHERE PRODUCTID = ?", [$name, $price, $weight, $unit, $category, $quantity, $desc, $info, $img, $productID]);
                if ($editResult) {
                    echo stackMessageWrapper([showMessage("success", "Product updated successfully!")]);
                } else {
                    if (empty($errors)) {
                        echo stackMessageWrapper([showMessage("info", "Nothing was changed. Please make some changes and try again.")]);
                    } else {
                        array_push($errors, showMessage("error", "Failed to update the record. Please try again later."));
                        echo stackMessageWrapper($errors);
                    }
                }
            }
        }
    }
}
