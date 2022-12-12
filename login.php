<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('location: /Database-Server-MySQL');
  }
  
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: /Database-Server-MySQL');
    } else {
        $message = 'Sorry, Those Credentials Do Not Match';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    <body style='background-image: linear-gradient(to right, #1d4387, #37509a, #4e5dad, #656ac1, #7c78d4);'>
    <h1>Login</h1>
    <span>or  <a href="signup.php"><input type="submit1" value="SignUp"></a></span>
    
    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    
    <form action="login.php" method="post">
        <input type="text" name = "email" placeholder="Enter your mail">
        <input type="password" name = "password" placeholder="Enter your password">
        <input type="submit" value="send">
    </form>
</body>
</html>