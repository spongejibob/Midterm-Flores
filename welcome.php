<?php 
include('db_connection.php');
require('db_conn.php');
$username=$_SESSION['username'];
$query ="SELECT * FROM log where username='".$username."'";        
$result1 = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query);
$result3 = mysqli_query($con, $query);

if(isset($_POST['logout'])){
    $username = $_POST['name'];
    $query="INSERT into `log` (username, activity, date_time)VALUES ('$username','LOGOUT',current_timestamp())";
    mysqli_query($con, $query);
    header("location:logout.php");
}
if(isset($_POST['reset'])){
    echo "<center><br><br><br>
    <div class='reset'><br><br>
    <h3>CHANGE PASSWORD</h3><br/>
    <form action='welcome.php' method='POST'>
    <input type='text' name='name'placeholder='Name'><br><br>
    <input type='password' name='oldpass' placeholder='Old Password'><br><br>
    <input type='password' name='newpass' placeholder='New Password'><br><br>
    <input type='password' name='confirm_pass' placeholder='Confirm Password'><br><br>
    <button type='submit'name='change_submit'id='change_submit' onchange='reset()' style='background-color: violet; font-family: broadway; font-size: 20px;'>PROCEED</button>
    </form>
    </div>
    </center>";
    
}
if(isset($_POST['change_submit'])){
    $newpass=$_POST['newpass'];
    $oldpass=$_POST['oldpass'];
    $username=$_SESSION['username'];
    $re = "/^(?=.*[a-z])(?=.*\\d).{8,}$/i";
    if(!preg_match($re,$newpass)) {
        echo "<div class='result'><h3>Password must contain at least 1 number, 1 letter, minimum 8 character!</h3></div>";
    }
    else if($_POST['newpass'] != $_POST['confirm_pass']){
        echo "<div class='result'>
        <h3>Password did not match!</h3><br/>
        </div>";
    }
    else if(empty($_POST['newpass']) || empty($_POST['name']) ||empty($_POST['oldpass']) ||empty($_POST['confirm_pass'])){
        echo "<div class='result'>
        <h3>Input Fields!</h3><br/>
        </div>";
    }
    else{
        $query = "SELECT * FROM user WHERE username='".$username."'";
        $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($result)){
                $pass=$row["password"];
                }
                if ($pass!=$oldpass){
                    echo "<div class='result'>
                    <h3>Incorrect Old Password!</h3><br/>
                    </div>";
                }else{
                    $query ="UPDATE user SET password='".$newpass."' where username='".$username."'";
                    $result = mysqli_query($con, $query);        
                    $query="INSERT into `log` (username, activity, date_time)VALUES ('$username','change_password',current_timestamp())";
                    $result = mysqli_query($con, $query);
                    echo "<div class='result'>
                    <h3>Change Password Successfully!</h3><br/>
                    </div>";
            }
        
    }
    
    
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style_index.css">
</head>
<body>
    <center><br><br><br>
    <div class="welcome">
    <form method="post" action="welcome.php">
        <br><br>
        <input type="hidden"name="name" value="<?php echo $_SESSION['username'];?>">
        <button type="submit" name="reset" style="background-color: violet; font-family: broadway; font-size: 20px;">CHANGE PASSWORD</button><br><br>
        <button type="submit" name="logout" style="background-color: violet; font-family: broadway; font-size: 20px;">LOGOUT</button>
        <table style="width: 350px;">
                <tr>
                    <td colspan="3" style="font-size:20px;">Welcome <?php echo $_SESSION['username'];?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">History</td>
                </tr>
                <tr>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result1)){
                            
                            echo $rows['username']."<br>";
                        }
                    ?>
                    </td>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result2)){
                            echo $rows['activity']."<br>";
                        }
                    ?> 
                    </td>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result3)){
                            echo $rows['date_time']."<br>";
                        }
                    ?></td>
                </tr>
                
        </table>
    </form>
</div>
</center>
</body>
</html>
