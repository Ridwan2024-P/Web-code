<?php
require_once "../../MVC/Controller/AuthController.php";
$auth = new AuthController();
$error =$auth ->handleLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Views/CSS/login.css">
   <title> 
    Login  </title>

   <style>
    
     </style>
  </head>
<body>



<section>
<div class="container">
<div class="row">

<div>
    <img src="../../MVC/Images/draw2.webp" alt="image">
</div>

<div>
   <div class="card">
          <form method="POST">
       <h2>Login</h2>

      <?php
            if (!empty($error))
                 {
                    echo '<div class="alert">' . $error . '</div>';
                    } ?>

    <label>Email address</label>
          <input type="email" name="email" placeholder="Enter a valid email" required><br><br>

    <label>Password</label>
           <input type="password" name="password" placeholder="Enter password" required><br><br>

      <div class="check">
            <input type="checkbox" id="remember" name="remember">
      <label for="remember">Remember Me</label>
           </div>

   <button type="submit" name="login">Login</button>
</form>
 </div>
    </div>
         </div>
           </div>
</section>

</body>
</html>
