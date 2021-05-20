<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style_index.css"/>
</head>
<body>
<?php
    
    require('db_conn.php');
?>
    <center><br><br><br>
    <div class="login">
    <form method="post" action="index.php" name="login">
        <h1>LOGIN</h1><br>
        <input type="text" name="username" placeholder="Username" autofocus="true"/><br><br>
        <input type="password" name="password" placeholder="Password"/><br><br>
        <input type="submit" value="LOGIN" name="submit" style="background-color: violet; font-family: broadway; font-size: 20px;" /><br>
        <p><a href="register.php">REGISTRATION</a></p>
  </form>
</div>
</center>
<?php
    
?>
</body>
</html>