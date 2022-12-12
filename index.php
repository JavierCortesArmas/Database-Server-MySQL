<?php

  session_start();
  
  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id=:id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0 ) {
        $user = $results;
    } 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)): ?>
        <body style='background-image: linear-gradient(to right, #1d4387, #37509a, #4e5dad, #656ac1, #7c78d4);'>
        <h3>Welcome  <?= $user['email'] ?> <h3>
        <h3>You Are Successfully Logged In</h3> 
        <a href="logout.php"><input type="submit1" value="Logout"></a>
    <?php else: ?>
    <body style='background-image: linear-gradient(to right, #1d4387, #37509a, #4e5dad, #656ac1, #7c78d4);'> 
    <h1>Please Login or SignUp</h1>
    <a href="login.php"><input type="submit" value="Login"></a>
    <a href="signup.php"><input type="submit" value="SignUp"></a>    
    <?php endif; ?>
</body>
</html>
   
