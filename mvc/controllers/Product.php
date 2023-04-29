<?php
class Product extends Controller
{
    public $ProductModel;
    function __construct()
    {
        $this->ProductModel = $this->model("ProductModel");
    }

    function SayHi()
    {
    }

    public function Category($type)
    {
        echo "Home - Category " . $type;
    }

    public function Detail($id)
    {
        $ProductIDRegex = "/^SP0*[0-9]{3,}$/";
        if (preg_match($ProductIDRegex, $id)) {
            $data = json_decode($this->ProductModel->GetProductByID($id));
            // var_dump($data[0]->UnitName);
            if (!empty($data)) {
                $this->view("master1", ["page" => "detail", "data" => $data]);
            } else {
                $this->view("master2", ["page" => "404", "message" => "Oops! The product was not found."]);
                exit();
            }
        } else {
            $this->view("master2", ["page" => "404", "message" => "Oops! The product was not found."]);
            exit();
        }
    }
}
