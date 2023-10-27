<?php
include('header.php');
include('con.php');

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$password = $_POST['Password'];
$confirmpassword = $_POST['ConfirmPassword'];

if(isset($_POST['register'])){
    if (!empty($username) && !empty($fullname) && !empty($password) && !empty($confirmpassword)){
        if($password != $confirmpassword) {
            echo "<script>alert(`Passwrod not match!`);</script>";
        }else{
            $searchUsername = mysqli_query($conn,"SELECT * FROM tblUsers WHERE username = '$username'");
            if($searchUsername->num_rows > 0) {
                echo "<script>alert('Username already registered.');</script>";
            }else{
                $sqladduser = mysqli_query($conn,"INSERT INTO tblUsers (username, fullname, password) VALUES('$username', '$fullname', '$password')");

                $createTable = $conn->query("
                    CREATE TABLE $username (
                        id int(11) AUTO_INCREMENT PRIMARY KEY,
                        date date,
                        timein varchar(256),
                        timeout varchar(256),
                        notes varchar(256)
                    );
                ");

                echo "<script>alert('User created successfully');</script>";
            }
        }
    }else{
        echo "<script>alert('All fields required.');</script>";
    }
}
?>

<title>Bundyclock - Registration</title>

<div class="container">
    <div class="py-5 text-center">
        <form method="POST" action="register.php" class="form-signin">
            <img class="mb-4" src="/lorence/img/clock.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Register</h1>
            <h4 class="h4 mb-3 font-weight-normal">To record your timein and timeout.</h4>
            <input class="form-control" type="text" name="username" placeholder="Username" />
            <input class="form-control" type="text" name="fullname" placeholder="Full name" />
            <input type="password" name="Password" class="form-control" placeholder="Password" required>
            <input type="password" name="ConfirmPassword" class="form-control" placeholder="Confirm Password" required>
            <!--<input class="btn btn-lg btn-primary btn-success" type="submit" name="register" value="Register" />-->
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
            <br/>
            <p class="mt-5 mb-3 text-muted text-center">Already registered? <a href="/lorence/index.php">Timein here</a></p>
        </form>
    </div>
</div>
<?php include('footer.php');?>