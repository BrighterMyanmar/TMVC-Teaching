<?php
class PostController extends Controller
{
    public function __construct()
    {
        $this->model("Post");
    }
    public function home()
    {
        $posts = Post::all();
        $this->view("post/home", $posts);
    }
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $file = $_FILES["file"];
            $filename = uploadSingleImage($file);

            $post = Post::create([
                "title" =>  $_POST["title"],
                "author" =>  $_POST["author"],
                "image" =>  $filename,
                "content" =>  $_POST["content"],
            ]);
            if ($post) {
                redirect("post/home");
            } else {
                $this->view('post/create');
            }
        } else {
            $this->view('post/create');
        }
    }
    public function edit($params)
    {
        $post = Post::findById($params[0]);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newImage = $post->image;

            $file = $_FILES["file"];
            if ($file["name"]) {
                deleteFile($post->image);
                $newImage = uploadSingleImage($file);
            }
            $post->title = $_POST["title"];
            $post->author = $_POST["author"];
            $post->image = $newImage;
            $post->content = $_POST["content"];
            $post = Post::Update($post);
            if ($post) {
                redirect("post/home");
            } else {
                $this->view('post/create');
            }
        } else {
            $this->view('post/edit', $post);
        }
    }

    public function delete($params){
        $post = Post::findById($params[0]);
        Post::delete($post);
        redirect("post/home");
    }
}
