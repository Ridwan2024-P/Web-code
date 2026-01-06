 
<?php

session_start();

require_once __DIR__ . "/../../MVC/Model/DB.php";
 
class AuthController {
 
    public function handleLogin() {

        $error = "";
 
        if (isset($_POST['login'])) 
            {
            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);
           
            $db   = new DataBase();
            $conn = $db->connect();
            $sql = "SELECT * FROM users WHERE email=? AND status=1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
 
            if ($result->num_rows == 1) 
                {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) 
                    {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role']    = $user['role'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: ../Controller/AdminDashboardController.php");
                    exit;
                      }
                 else
                     {
                    $error = "Wrong password!";
                      }
                    } 
            else 
            {
                $error = "Email not found!";
            }
        }
        return $error;
    }

}

 