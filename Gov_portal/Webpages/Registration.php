<?php include 'dbconnect.php'?>
<?php
    $flag=false;
    $cpflag=true;
    $alreadyexist=false;
if(isset($_POST['username'])){
    
    $Username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $Role=$_POST['role'];
    $existsql= "Select * from `credentials` where email='$email'";
    $result=mysqli_query($connect, $existsql);
    if(mysqli_num_rows($result) != 0){
        $alreadyexist=true;
    }
    else if($cpassword != $password)
    {
        $cpflag=false;
    }
    else{
        $sql ="INSERT INTO `school portal`.`credentials` ( `Username`, `email`, `Password`, `Role`, `Date`) VALUES ('$Username', '$email', '$password', '$Role', current_timestamp());"; 

    if($connect -> query($sql)){
        // echo"Successfully Inserted";
        $flag=true;
    }
    }
    // else{
    //     // echo"Error: $sql <br> $connect->error";
    // }

    $connect->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration | Org. Name</title>
    <link rel="stylesheet" href="../StyleSheets/style.css">
</head>
<body>

    <div class="org">
       <center> <img src="./MEdia/#" alt="Organization Logo"></center>
        <h1>Organization Name</h1>
    </div>
    <!-- Registration Page -->
    <div id="login-section">
        <h2>User Registration</h2>
        <form id="registerForm" action="Registration.php" method="post">
            <label for="reg-username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <label for="email">E-mail Id:</label>
            <input type="email" name="email" id="email" placeholder="E-mail Id" required>
            <label for="reg-password">Create Password:</label>
            <input type="password" name="password" id="password" placeholder="Create Password" required>
            <label for="reg-password">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
            <label for="reg-role">Select Role:</label>
            <select id="reg-role" name="role" >
                <option value="student">Student</option>
                <option value="classTeacher">Class Teacher</option>
                <option value="subjectTeacher">Subject Teacher</option>
            </select>
            <button>Register</button>
        </form>
            <?php
            if(!$cpflag){
                echo"<div class='mismatch'>Passwords do not match.</div>";
            }
            if($flag == true){
                    echo "<div class='successmsg'>Registered Successfully!</div>
                            <br>
                            <a href='../index.php'>Login</a>
                    ";
                } 
            if($alreadyexist)
            {
                echo"<div class='mismatch'>Account with this Email already exist!</div>";
            }           
            ?>
    </div>

    <script src="register.js"></script>
</body>
</html>
