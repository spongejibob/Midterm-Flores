<?php
require('db_conn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OTP</title>
    <link rel="stylesheet" type="text/css" href="style_index.css">
</head>
<body>
    <center><br><br><br>
    <div class="dash">
        <form method="POST" action="dashboard.php">
            <br><br>
            <p><b>ENTER CONTACT NUMBER:</b></p>
            
            <input type="hidden"name="id" value="<?php echo $_SESSION['ID'];?>">
            <input type="hidden"name="mycode" value="<?php echo $_SESSION['mycode'];?>">
            <input type="hidden"name="user" value="<?php echo $_SESSION['user_id'];?>">
            <input type="text" id="input"  name="input" placeholder="" value=""><br><br>
            <button type="submit" id="send" name="send" style="background-color: violet; font-family: broadway; font-size: 15px;" onclick="change(this)">Send</button><br><br>
            <p><b>ENTER OTP:</b></p>
            <input type="text" id="code" name="code" placeholder="Enter OTP"value=""><br><br>
            <button type="submit" id="send2" name="dash_submit" style="background-color: violet; font-family: broadway; font-size: 15px;">Submit</button>
        </form>
    </div>
    </center>
</body>
</html>
