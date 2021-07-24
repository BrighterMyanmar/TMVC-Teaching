<?php
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->model("Category");
    }
    public function home()
    {
        $cats = Category::all();
        $this->view("cat/home", $cats);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $file = $_FILES["file"];
            $filename = uploadSingleImage($file);

            $cat = Category::create([
                "name" =>  $_POST["name"],
                "image" =>  $filename,
            ]);
            if ($cat) {
                redirect("category/home");
            } else {
                $this->view('cat/create');
            }
        } else {
            $this->view('cat/create');
        }
    }
    public function edit($params)
    {
        $id = $params[0];
        $cat = Category::findById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $file = $_FILES["file"];
            $newImage = $cat->image;
            $cat->name = $_POST['name'];
            if ($file["name"]) {
                deleteFile($cat->image);
                $newImage = uploadSingleImage($file);
            }
            $cat->image = $newImage;
            $cat = Category::Update($cat);
            if ($cat) {
                redirect("category/home");
            } else {
                redirect('category/edit/' . $id);
            }
        } else {
            $this->view('cat/edit', $cat);
        }
    }
    public function delete($params)
    {
        $id = $params[0];
        $cat = Category::findById($id);
        deleteFile($cat->image);
        Category::delete($cat);
        redirect('category/home');
    }
}
