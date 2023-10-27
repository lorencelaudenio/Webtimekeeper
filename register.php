<?php
include('header.php');
include('con.php');
include('scripts.php');

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

<title>Webtimekeeper - Registration</title>



<section class="vh-100 " style="background-color: hsl(0, 0%, 96%)">
    <div class="container py-3 h-100  col-md-4 rounded">
    <div class="row d-flex  justify-content-center align-items-center h-100">
    <div class="card   shadow " style="border-radius: 1rem;">
        <div class="card-body p-4 text-center">
            <form class="col-12" method="POST" action="register.php">
                <div class="text-center">
                    <h4 class="mb-3">Webtimekeeper <i class="bi bi-clock"></i>  </h4>
                </div>

                <div class="form-group mt-3">
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username" required>
                </div>

                <div class="form-group mt-3">
                    <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="fullnameHelp" placeholder="Enter fullname" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="Password" id="password" class="form-control" placeholder="Enter password" aria-label="Enter password" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form-control" placeholder="Confirm password" aria-label="Confirm password" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                    </div>
                </div>
                
                <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg btn-block">

                <div class="small alert alert-danger mt-3 text-muted" role="alert">
                    <p class="mt-1 mb-1 text-muted text-center">Already registered? <a href="index.php">Timein here</a></p>
                </div>
            </form>   
        </div>
    </div>
    </div>
    </div>
</section>
<?php include('footer.php');?>