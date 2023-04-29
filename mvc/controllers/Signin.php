<?php



class Signin extends Controller
{
    public $UserModel;

    function __construct()
    {
        $this->UserModel = $this->model('UserModel');
    }

    public function SayHi()
    {
        $this->view('master2', ['page' => 'signin']);
    }

    public function login()
    {
        $data = [
            'username' => '',
            'password' => '',
            'captcha' => '',
            'captchaError' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'captcha' => trim($_POST['captcha']),
                'captchaError' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            if (empty($data['captcha'])) {
                $data['captchaError'] = 'Please enter a captcha.';
            }

            if (!testPhrase($data['captcha'])) {
                $data['captchaError'] = 'Captcha does not match.';
            }

            if (empty($data['usernameError']) && empty($data['passwordError']) && empty($data['captchaError'])) {
                $signedInUser = $this->UserModel->signin($data['username'], $data['password']);
                $signedInUser = json_decode($signedInUser, true);

                if ($signedInUser) {
                    $this->createUserSession($signedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again!';
                    $this->view('master2', ['page' => 'signin', 'data' => $data]);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'captcha' => '',
                'captchaError' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('master2', ['page' => 'signin', 'data' => $data]);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['UserID'];
        $_SESSION['username'] = $user['Username'];
        $_SESSION['email'] = $user['UserEmail'];
        $_SESSION['role'] = $user['UserRole'];
        redirect('Home');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        redirect('Signin');
    }
}
