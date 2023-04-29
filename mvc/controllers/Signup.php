<?php
class Signup extends Controller
{
    public $UserModel;

    function __construct()
    {
        $this->UserModel = $this->model('UserModel');
    }

    public function SayHi()
    {
        $this->view('master2', ['page' => 'signup']);
    }

    public function NewReg()
    {

        $data = [
            'firstname' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'firstnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'termsError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSignup'])) {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'firstname' => trim($_POST['firstname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'firstnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'termsError' => ''
            ];

            $firstnameValidation = "/^[\p{L}'][ \p{L}'-]*[\p{L}]$/u";
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

            //Validate firstname
            if (empty($data['firstname'])) {
                $data['firstnameError'] = 'Please enter firstname.';
            } else if (!preg_match($firstnameValidation, $data['firstname'])) {
                $data['firstnameError'] = 'Invalid firstname.';
            }

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            } else {
                if (json_decode($this->UserModel->checkUsername($data['username']))) {
                    $data['usernameError'] = 'Username is already taken.';
                }
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exist in database
                if (json_decode($this->UserModel->checkUserEmail($data['email']))) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }

            //Validate password on length, numeric values
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 8) {
                $data['passwordError'] = 'Password must be at least 8 characters';
            } else if (!preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one uppercase letter, one lowercase letter, one number and one special character.';
            }

            //Validate password confirm
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else if ($data['password'] !== $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
            }

            if (!isset($_POST['terms'])) {
                $data['termsError'] = 'You must agree to our terms of service and privacy policy.';
            }

            //make sure that errors are empty
            if (empty($data['firstnameError']) && empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['termsError'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['confirmPassword'] = '';

                if (json_decode($this->UserModel->createNewUser($data))) {
                    $result = stackMessageWrapper([showMessage('success', 'Welcome back! You have successfully signed up.')]);
                    $this->view('master2', ['page' => 'signin', 'result' => $result]);
                } else {
                    $result = stackMessageWrapper([showMessage('error', 'Oops something went wrong!')]);
                }
            } else {
                $result = stackMessageWrapper([showMessage('error', 'Please correct the highlighted fields and try again.')]);
            }
        }

        $this->view('master2', ['page' => 'signup', 'data' => $data, 'result' => $result]);
    }
}
