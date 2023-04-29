<?php
class Home extends Controller
{

    //public $ExampleModel; nếu các function đều cần gọi model thì tạo biến global
    public $ProductModel;

    function __construct()
    {
        //$this->ExampleModel = $this->model("ExampleModel");
        $this->ProductModel = $this->model('ProductModel');
    }

    function SayHi()
    {
        $limitItems = 4;
        $recommendProducts = $this->ProductModel->GetRows("SELECT * FROM `products` ORDER BY Rand() LIMIT $limitItems");

        $this->view("master1", ["page" => "home", "products" => $recommendProducts]);
    }
}
