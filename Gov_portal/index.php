<?php
$login=false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server="localhost";
    $username="root";
    $password= "";
    $database="school portal";

    $connect=mysqli_connect($server, $username, $password,$database); 
    if($connect){
        // echo"Success";
    }

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `credentials` where email='$email' and Password='$password'";
    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) >= 1)
    {
        $login=true;
        // echo"Success";
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: ./Webpages/dashboard.html");
    }
    

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Portal</title>
    <link rel="stylesheet" href="./StyleSheets/style.css">
</head>
<body>
    <!-- Login Page -->
    <div id="login-section">
        <h2>Login</h2>
        <form id="loginForm" action="index.php" method="post">
            <label for="email">E-mail Id</label>
            <input type="text" name="email" id="email" required placeholder="E-mail Id">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Password">
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="student">Student</option>
                <option value="classTeacher">Class Teacher</option>
                <option value="subjectTeacher">Subject Teacher</option>
            </select>
            <button type="submit">Login</button>
        </form>
        <div class="register"><a href="./Webpages/Registration.php">Register Here</a></div>
        <?php
            if($login){
                echo "<div class='successmsg'>Login Successfully!</div>";
            }

            else if(!$login){
                echo"<div class='mismatch'>Invalid Credentials</div>";
            }
        ?>
    </div>
    <style>
        .register{
            text-decoration: none;
            font-size: 0.8rem;
        }
        .register:hover{
            text-decoration: underline;
        }
    </style>
</body>
</html>
