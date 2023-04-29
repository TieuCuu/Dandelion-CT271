<?php
class Controller //trung gian tương tự bridge, nhiệm vụ gọi model và view tương ứng
{
    //gọi model tương ứng
    public function model($model)
    {
        if (file_exists("../mvc/models/" . $model . ".php")) {
            require_once "../mvc/models/" . $model . ".php";
            return new $model;
        }
    }

    //gọi view tương ứng
    public function view($view, $data = [])
    {
        if (file_exists("../mvc/views/" . $view . ".php")) {
            require_once "../mvc/views/" . $view . ".php";
        }
    }
}
