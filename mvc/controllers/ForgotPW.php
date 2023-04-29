<?php
class ForgotPW extends Controller
{

    function __construct()
    {
    }

    public function SayHi()
    {
        $this->view("master2", ["page" => "reset_Password"]);
    }
}
