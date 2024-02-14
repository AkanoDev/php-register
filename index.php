<?php 
  include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <h2>LOG IN FORM</h2>
    <label>Username:</label>
    <input type="text" name="username"><br>
    <label>Password:</label>
    <input type="text" name="password"><br>
    <input type="submit" name="register" value="register">
  </form>
</body>
</html>
<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
      echo "input username";
    }
    elseif(empty($password)){
      echo "input password";
    }
    else{
      $hash = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hash')";
      mysqli_query($conn, $sql);

      echo "You are now registered";
    }
  }

  mysqli_close($conn)
?>