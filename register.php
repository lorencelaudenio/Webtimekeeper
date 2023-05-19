<?php
include('con.php');

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['Password'];
    $confirmpassword = $_POST['ConfirmPassword'];
    $hpassword = md5($password);

    if($username == '' && $fullname == '' && $password == '' && confirmpassword == ''){
        echo 'All fields required.';
    }else{
        

        if($password !== $confirmpassword) {
            echo "<script>alert(`Passwrod not match!`);</script>";
        } else{
            $searchUsername = $mysqli->query("SELECT * FROM tblUsers WHERE `username` = '$username'");
            if($searchUsername->num_rows > 0) {
                echo "<script>alert(`User taken`);</script>";
            }else{
                $AddUser = $mysqli->query("INSERT INTO tblUsers (`username`, `fullname`, `password`) VALUES ('$username', '$fullname', '$hpassword')");

                $createTable = $mysqli->query("
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


    }
}
?>

<title>Bundyclock - Registration</title>

<div class="container">
    <div class="py-5 text-center">
        <form action="" method="post" class="form-signin">
            <img class="mb-4" src="/lorence/img/clock.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Register</h1>
            <h4 class="h4 mb-3 font-weight-normal">To record your timein and timeout.</h4>
            <input class="form-control " type="text" name="username" placeholder="Username" />
            <input class="form-control " type="text" name="fullname" placeholder="Full name" />
            <input type="password" name="Password" class="form-control" placeholder="Password" required>
            <input type="password" name="ConfirmPassword" class="form-control" placeholder="Confirm Password" required>
            <!--<input class="btn btn-lg btn-primary btn-success" type="submit" name="register" value="Register" />-->
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
            <br/>
            <p class="mt-5 mb-3 text-muted text-center">Already registered? <a href="/lorence/index.php">Timein here</a></p>
        </form>
<?php include('footer.php');?>