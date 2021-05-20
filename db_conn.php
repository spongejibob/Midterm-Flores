<?php
    include('db_connection.php');
    session_start();
    
        if (isset($_POST['submit'])) {

            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($con, $password);
            if($_POST['username'] == "" && $_POST['password'] ==""){
                echo "<div class='result'>
                <h3>Please fill Username and Password!</h3><br/>
                </div>";
            }
            else if($_POST['username'] == ""){
                echo "<div class='result'>
                <h3>Please fill Username!</h3><br/>
                </div>";

            }else if($_POST['password'] ==""){
                echo "<div class='result'>
                <h3>Please fill Password!</h3><br/>
                </div>";

            }else{
                $create_datetime = date("Y-m-d H:i:s");
                $query    = "SELECT * FROM `user` WHERE username='".$username."' AND password='".$password."'";
                $result = mysqli_query($con, $query);
                if(mysqli_num_rows($result) > 0){
                    
                    while($rows = mysqli_fetch_assoc($result)) {
                        $_SESSION['ID']=$rows["user_id"];
                        $_SESSION['username']=$rows["username"];
                         
                         
                         $query ="INSERT into `log` (username, activity, date_time)VALUES ('$username','LOGIN',current_timestamp())";
                         mysqli_query($con, $query);
                         mysqli_fetch_assoc($result);
                         header("Location: dashboard.php");
                        }
                }else if(mysqli_num_rows($result) == 0){
                    echo "<div class='result'>
                        <h3>Incorrect Username or Password!</h3><br/>
                        <p>Click here to <a href='index.php'>LOGIN again.</a></p>
                        </div>";
                }
                
                
            }
            
        }
        
        if(isset($_POST['send'])){
            
            $code=rand(100000,999999);
            $user_id = $_POST['id'];
            $mycode='';

            $currentDate = date('Y-m-d H:i:s');
            $currentDate_timestamp = strtotime($currentDate);
            $endDate_months = strtotime("+20 seconds", $currentDate_timestamp);
            $packageEndDate = date('Y-m-d H:i:s', $endDate_months);

            $query  = "INSERT into authentication (code,user_id,code_start,code_expire) VALUES ('$code','$user_id','$currentDate','$packageEndDate')";
            $result = mysqli_query($con, $query);
            
            $query  ="SELECT * FROM authentication WHERE user_id='".$user_id."'";
            $result = mysqli_query($con, $query);
            if($result){
                while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['mycode']=$rows['code'];
                }
            }
            echo "<div class='result'>
            <h3>YOUR CODE IS: ".$_SESSION['mycode']."</h3><br/>
            </div>";
            
            }
        
        if(isset($_POST['dash_submit'])){
            if($_POST['code'] == ""){
                echo "<div class='result'>
                            <h3>INPUT CODE!</h3><br/>
                            </div>";
            }
            else if(!empty($_POST['code'])){
                $user_id = $_POST['id'];
                $user_code='';
                $dbcodecompare = $_POST['code'];
                $currentDate = date('Y-m-d H:i:s');
                $mycode=$_POST['mycode'];
                $query = "SELECT * FROM authentication WHERE code='".$dbcodecompare."' AND user_id='".$user_id."'";
                $result = mysqli_query($con, $query);
                if ($result){
                    while($rows=mysqli_fetch_assoc($result)){
                        $_SESSION["user_id"] = $rows["user_id"];
                        $_SESSION["codeexp"]=$rows["code_expire"];
                        if($_SESSION["codeexp"] >($currentDate)){
                            if($mycode==$dbcodecompare){
                                    echo "<div class='result' >
                                    <h3>SUCCESS!</h3><br/>
                                    <form action='dashboard.php' method='POST'>
                                    <button type='submit'name='success_submit'id='success_submit' onchange='reset()' style='background-color: violet; font-family: broadway; font-size: 20px;'>PROCEED</button>
                                    </form>
                                    </div>
                                    ";
                            }else{
                                echo "<div class='result'>
                                <h3>Incorrect Code!</h3><br/>
                                </div>";
                            }
                        }else{
                            echo "<script>alert('CODE EXPIRED');</script>";
                        }
                    }
                    
                }
                
                
            }
        }
        if(isset($_POST['success_submit'])){
            $user_id = $_POST['user'];
            $query = "SELECT * FROM 'user' where  user_id='".$user_id."'";
            $result = mysqli_query($con, $query);
                if ($result){
                    while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $rows["username"];
                    }
                }
                header("Location:welcome.php");
        }
      
?>