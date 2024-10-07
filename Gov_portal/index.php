<?php include './Webpages/dbconnect.php'?>
<?php
$login=true;
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
    $role=$_POST['role'];

    $sql="SELECT * FROM `credentials` where email='$email' and Password='$password'";
    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) >= 1)
    {
        $login=true;
        // echo"Success";
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        
        if($role == 'student')
        header("location: ./Webpages/sdashboard.html");

        else
        header("location: ./Webpages/tdashboard.php");
    }   

 }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  | Org. Name</title>
    <link rel="stylesheet" href="./StyleSheets/style.css">
</head>
<body>
    <!-- Org. name and Logo -->
    <div class="org">
       <center> <img src="./MEdia/#" alt="Organization Logo"></center>
        <h1>Organization Name</h1>
    </div>

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
            // if($login){
            //     echo "<div class='successmsg'>Login Successfully!</div>";
            // }

            if(!$login){
                echo"<div class='mismatch'>Invalid Credentials</div>";
            }
        ?>
    </div>
    <style>
        .register a{
            text-decoration: none;
            font-size: 0.8rem;
            color: white;
        }
        .register:hover{
            text-decoration: underline;
        }
    </style>
</body>
</html>
