<?php
class Controller extends Model
{
    public $firstnameErrMsg = "";
    public $lastnameErrMsg = "";
    public $usernameErrMsg = "";
    public $emailErrMsg = "";
    public $passwordErrMsg = "";
    public $userinputMsg = "";
    public function register()
    {
        if (isset($_POST["register"])) {

            $firstname = $lastname = $username = $email = $password = "";
            if (empty($_POST["firstname"])) {
                $this->firstnameErrMsg  = "Please enter your first name";
                $error = true;
            } else {
                $firstname = $this->test_input($_POST["firstname"]);
                if (!preg_match("/^[a-zA-z]*$/", $firstname)) {
                    $this->firstnameErrMsg = "Only alphabets and whitespace are allowed.";
                    $error = true;
                }
            }
            if (empty($_POST["lastname"])) {
                $this->lastnameErrMsg = "Please enter your last name";
                $error = true;
            } else {
                $lastname = $this->test_input($_POST["lastname"]);
                if (!preg_match("/^[a-zA-z]*$/", $lastname)) {
                    $this->lastnameErrMsg = "Only alphabets and whitespace are allowed.";
                    $error = true;
                }
            }
            if (empty($_POST["username"])) {
                $this->usernameErrMsg = "Please enter your username";
                $error = true;
            } else {
                $username = $this->test_input($_POST["username"]);
            }
            if (empty($_POST["email"])) {
                $this->emailErrMsg = "Please enter your email";
                $error = true;
            } else {
                $email = $this->test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErrMsg = "Invalid email format";
                    $error = true;
                }
            }
            if (empty($_POST["password"]) && empty($_POST["cpassword"])) {
                $this->passwordErrMsg = "Please enter  password";
                $error = true;
            } else {

                // $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
                // $lowercase = preg_match('@[a-z]@', $_POST["password"]);
                // $number    = preg_match('@[0-9]@', $_POST["password"]);
                // $specialChars = preg_match('@[^\w]@', $_POST["password"]);
                if ($_POST["password"] != $_POST["cpassword"]) {
                    $this->passwordErrMsg = "Password not matched";
                } else {
                    $password = md5($_POST["password"]);
                    if (strlen($_POST["password"]) < 6) {
                        $this->passwordErrMsg = 'Password should be at least 6 characters in length ';
                        $error = true;
                    }
                }
            }
            if (!$error) {
                $this->userRegister($firstname, $lastname, $username, $email, $password);
            }
        }
    }
    public function login()
    {
        if (isset($_POST["login"])) {
            if (empty($_POST["userinput"])) {
                $this->userinputMsg = "Please enter your username or email";
                $error = true;
            } else {
                $userinput = $this->test_input($_POST["userinput"]);
            }
            if (empty($_POST["password"])) {
                $this->passwordErrMsg = "Please enter your password";
                $error = true;
            } else {
                $password = md5($this->test_input($_POST["password"]));
            }
            if (!$error) {
                $this->userLogin($userinput, $password);
            }
        }
    }
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function oldInput($name)
    {
        echo $_POST["$name"];
    }

    public function loadModel()
    {

        
        if (isset($_POST["user_input"])) {
            // header("Access-Control-Allow-Origin: *");
            // header("Access-Control-Allow-Methods: POST");
            // header("Access-Control-Allow-Headers: Content-Type");
            $username = "sun";
            $user_input = $_POST['user_input'];
            $user_input = $this->test_input($user_input);
            
            $url = 'http://127.0.0.1:5000/predict';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "user_input=" . $user_input);
            $chatbot_output = curl_exec($ch);
            curl_close($ch);
            $user_input_time = date('Y-m-d H:i:s');
            $chatbot_output_time = date('Y-m-d H:i:s');
            $this->chatHistory($username, $user_input, $chatbot_output, $user_input_time, $chatbot_output_time);
        }


        // if (isset($_POST["user_input"])) {
        //     // header("Access-Control-Allow-Origin: *");
        //     // header("Access-Control-Allow-Methods: POST");
        //     // header("Access-Control-Allow-Headers: Content-Type");
        //     $username = "sun";
        //     $user_input = $_POST['user_input'];
        //     $user_input = $this->test_input($user_input);
        //     $url = 'http://127.0.0.1:5000/predict';
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, "user_input=" . $user_input);
        //     $chatbot_output = curl_exec($ch);
        //     curl_close($ch);
        //     $this->chatHistory($username, $user_input, $chatbot_output);
        // }
    }
    public function generateUniqueId()
    {
        $timestamp = Date("Ymdh:i:s");

        echo (str_split($timestamp));
        //     const randomNumber = Math.random();
        //     const hexadecimalString = randomNumber.toString(16);

        //     return `id-${timestamp}-${hexadecimalString}`;
    }
    public function displayChatHistory()
    {
        return $this->fetchChatHistory();
    }
}
