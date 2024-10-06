<?php
    $flag=false;
    $cpflag=true;
if(isset($_POST['username'])){
    $server="localhost";
    $username="root";
    $password= "";

    $connect=mysqli_connect($server, $username, $password); 
    if(!$connect){
        echo "Connection failed". mysqli_connect_error();
    }
    $Username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $Role=$_POST['role'];

    if($cpassword != $password)
    {
        $cpflag=false;
    }
    else{
        $sql ="INSERT INTO `school portal`.`credentials` ( `Username`, `E-mail`, `Password`, `Role`, `Date`) VALUES ('$Username', '$email', '$password', '$Role', current_timestamp());"; 

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
    <title>User Registration</title>
    <link rel="stylesheet" href="../StyleSheets/style.css">
</head>
<style>
    .successmsg{
        width: 100%;
        background-color:rgb(127, 239, 127);
        color: darkgreen;
        font-weight: bold;
        border-radius: 5px;
        padding:0.5rem;
        animation: toandfro 100ms ease-in-out;
    }
    .mismatch{
        width: 100%;
        background-color:rgb(239, 127, 127);
        color: darkred;
        font-weight: bold;
        border-radius: 5px;
        padding:0.5rem;
        animation: toandfro 100ms ease-in-out;
    }
    @keyframes toandfro{
        from{
            transform: translateX(-10%);
        }

        to{
            transform: translateX(0%);
        }
    }
</style>
<body>
    <!-- Registration Page -->
    <div id="login-section">
        <h2>User Registration</h2>
        <form id="registerForm" action="Registration.php" method="post">
            <label for="reg-username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <label for="email">E-mail Id:</label>
            <input type="email" name="email" name="email" id="email" placeholder="E-mail Id" required>
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
                    echo "<div class='successmsg'>Registered Successfully!</div>";
                }            
            ?>
    </div>

    <script src="register.js"></script>
</body>
</html>
