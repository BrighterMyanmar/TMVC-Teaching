<?php

class UserController extends Controller
{
    public function __construct()
    {
        $this->model("User");
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "password" => $_POST['password'],
                "name_err" => '',
                "email_err" => '',
                "phone_err" => '',
                "password_err" => '',
            ];

            if (empty($data["name"])) {
                $data["name_err"] = "Name can't be empty";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "Email can't be empty";
            } else {
                $dbUser = User::find("email", $data["email"]);
                if ($dbUser) {
                    $data["email_err"] = "Email is already in Use";
                }
            }
            if (empty($data["phone"])) {
                $data["phone_err"] = "Phone can't be empty";
            } else {
                $dbUser = User::find("phone", $data["phone"]);
                if ($dbUser) {
                    $data["phone_err"] = "Phone is already in Use";
                }
            }
            if (empty($data["password"])) {
                $data["password_err"] = "Password can't be empty";
            }

            if (
                empty($data["name_err"]) &&
                empty($data["email_err"]) &&
                empty($data["phone_err"]) &&
                empty($data["password_err"])
            ) {
                $password = password_hash($data["password"], PASSWORD_BCRYPT);
                $user = User::create([
                    "name" => $data["name"],
                    "email" => $data["email"],
                    "phone" => $data["phone"],
                    "password" => $password
                ]);
                if ($user) {
                    $this->view("user/login");
                } else {
                    echo "User Register Fail";
                }
            } else {
                $this->view("user/register", $data);
            }
        } else {
            $this->view("user/register");
        }
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "phone" => $_POST['phone'],
                "password" => $_POST['password'],
                "phone_err" => '',
                "password_err" => '',
            ];

            if (empty($data["phone"])) {
                $data["phone_err"] = "Phone can't be empty";
            }
            if (empty($data["password"])) {
                $data["password_err"] = "Password can't be empty";
            }

            if (
                empty($data["phone_err"]) &&
                empty($data["password_err"])
            ) {
                $user = User::find("phone", $data["phone"]);
                if ($user) {
                    if (password_verify($data['password'], $user->password)) {
                        setSession("name", $user->name);
                        setSession("user", $user);
                        redirect('home/index');
                    } else {
                        $data["password_err"] = "Password Error!";
                        $this->view("user/login", $data);
                    }
                } else {
                    $data["phone_err"] = "No User with that phone";
                    $this->view("user/login", $data);
                }
            } else {
                $this->view("user/login", $data);
            }
        } else {
            $this->view("user/login");
        }
    }

    public function logout()
    {
        deleteSession('name');
        deleteSession('user');
        $this->view('user/login');
    }
}
