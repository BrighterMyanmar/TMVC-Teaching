<?php
class HomeController extends Controller
{

    public function __construct()
    {
        $this->model("POST");
    }

    public function index($data = [])
    {
        $this->view('home/index',$data);
    }
}
