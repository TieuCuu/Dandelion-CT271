<?php
class ErrorPage extends Controller
{


    function __construct()
    {
    }

    public function SayHi()
    {
        $this->view("master2", ["page" => "404"]);
        exit();
    }
}
