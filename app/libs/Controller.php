<?php

class Controller
{
    public function view($view, $data = [])
    {
        $filename = './app/views/' . $view . ".php";
        if (file_exists($filename)) {
            require_once($filename);
        } else {
            die("File Not found");
        }
    }
    public function model($model){
        $file = "./app/models/$model.php";
        if(file_exists($file)){
            require_once $file;
            new $model();
        }else{
            die("Model $model not found!");
        }
    }
}
