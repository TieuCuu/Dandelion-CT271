<?php
class Controller //intermediary like bridge, calling the corresponding of model & view
{
    //Call the corresponding model
    public function model($model)
    {
        if (file_exists("../mvc/models/" . $model . ".php")) {
            require_once "../mvc/models/" . $model . ".php";
            return new $model;
        }
    }

    //Call the corresponding view
    public function view($view, $data = [])
    {
        if (file_exists("../mvc/views/" . $view . ".php")) {
            require_once "../mvc/views/" . $view . ".php";
        }
    }
}
