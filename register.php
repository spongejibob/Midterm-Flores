<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style_index.css"/>
</head>
<body>
<?php
    require('db_connection.php');
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['Rsubmit'])) {
            // removes backslashes
            $re = "/^(?=.*[a-z])(?=.*\\d).{8,}$/i";
            $username = stripslashes($_POST['Rusername']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($con, $username);
            $email    = stripslashes($_POST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_POST['Rpassword']);
            $password2 = stripslashes($_POST['Rpassword2']);
            $password = mysqli_real_escape_string($con, $password);
            if(!preg_match($re,$password)) {
                echo "<div class='result'><h3>Password must contain at least 1 number, 1letter, minimum 8 character!</h3></div>";
            }
            else{
                if($password!=$password2){
                    echo "<div class='result'>
                    <h3>Incorrect Password!</h3><br/>
                    </div>";
                }else{
                    $create_datetime = date("Y-m-d H:i:s");
                    $query    = "INSERT INTO `user` (username, password, email, datetime)
                            VALUES ('$username', '$password)', '$email', '$create_datetime')"; 
                    $result   = mysqli_query($con, $query);   
                    $query ="INSERT into `log` (username, activity, date_time)VALUES ('$username','REGISTER',current_timestamp())";
                    $result   = mysqli_query($con, $query);
                    if ($result>0) {
                            
                            echo "<div class='result'>
                            <h3>REGISTERED!</h3><br/>
                            <p>Click here to <a href='index.php'>LOGIN</a>.</p>
                            </div>";
                            
                            
                    }else {
                        echo "<div class='result'>
                            <h3>Required fields are missing!</h3><br/>
                            <p>Click here to <a href='register.php'>REGISTER</a>.</p>
                            </div>";
                    } 
                }
            }
            
            
            
        } 
    }
    
?>
    <center><br><br><br>
    <div class="registration">
    <form action="" method="post">
        <h1>REGISTRATION</h1><br>
        <input type="text" name="Rusername" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <input type="password" name="Rpassword" placeholder="Password" required><br><br>
        <input type="password" name="Rpassword2" placeholder="Confirm Password" required><br><br>
        <input type="submit" name="Rsubmit" value="REGISTER" style="background-color: violet; font-family: broadway; font-size: 20px;"><br>
        <p class="link"><a href="index.php">LOGIN</a></p>
    </form>
</div>
</center>
<?php
    
?>
</body>
</html>