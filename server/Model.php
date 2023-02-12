<?php
class Model extends DB
{
    public $registerErr = "";
    public $loginErr = "";
    protected function userLogin($userinput, $password)
    {
        $dbconn = $this->connect();
        $query = "SELECT * FROM users WHERE (email = ? OR username=?) AND password = ? ";
        $stmt = $dbconn->prepare($query);
        $stmt->bind_param("sss", $userinput, $userinput, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            $username = $row["username"];
            $name = $row['firstname'] . " " . $row['lastname'];
            $_SESSION["name"] = $name;
            $_SESSION["username"] = $username;
            header("location:dashboard.php");
        } else {
            $this->loginErr = "Invalid login";
        }
    }
    protected function userRegister($firstname, $lastname, $username, $email, $password)
    {
        $dbconn = $this->connect();
        $query = "SELECT * FROM users WHERE email = ? OR username=?";
        $stmt = $dbconn->prepare($query);
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $this->registerErr = "Username or Email already exist";
        } else {
            $query1 = "INSERT INTO users VALUES(null,?, ?, ?, ?, ? )";
            $stmt1 = $dbconn->prepare($query1);
            $stmt1->bind_param("sssss", $firstname, $lastname, $username, $email, $password);
            $stmt1->execute();
            header("location:login.php");
        }
    }
    protected function chatHistory($username, $user_input, $chatbot_output, $user_input_time, $chatbot_output_time)
    {
        $query = "INSERT INTO chat_history VALUES(null,?, ?, ?,?, ?)";
        $dbconn = $this->connect();
        $stmt1 = $dbconn->prepare($query);
        $stmt1->bind_param("sssss", $username, $user_input, $chatbot_output, $user_input_time, $chatbot_output_time);
        $stmt1->execute();
    }
    protected function fetchChatHistory()
    {
        $username = "sun";
        $dbconn = $this->connect();
        $query = "SELECT * FROM chat_history WHERE username=?";
        $stmt = $dbconn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result;
        
    }

}
