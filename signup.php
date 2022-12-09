<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    <body style='background-image: linear-gradient(to right, #1d4387, #37509a, #4e5dad, #656ac1, #7c78d4);'>
    <h1>SignUp</h1>
    <span>or  <a href="login.php"><input type="submit2" value="Login"></a></span>
    <form action="signup.php" method="post">
        <input type="text" name = "email" placeholder="Enter your mail">
        <input type="password" name = "password" placeholder="Enter your password">
        <input type="password" name = "confirm-password" placeholder="Confirm your password">
        <input type="submit" value="send">
    </form>
</body>
</html>