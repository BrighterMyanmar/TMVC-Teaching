<?php
class HomeController extends Controller
{

    public function __construct()
    {
        $this->model("Post");
    }

    public function index($data = [])
    {
        $users = Post::find("image","image1.png");
        echo "<pre>" . print_r($users, true) . "</pre>";
        // $this->view('home/index',$data);
    }
}
