<?php
include('header.php');
include('conn.php');
include('scripts.php');

$username = $_POST['username']?? null;
$fullname = $_POST['fullname']?? null;
$password = $_POST['Password']?? null;
$confirmpassword = $_POST['ConfirmPassword']?? null;

if(isset($_POST['register'])){
    if (!empty($username) && !empty($fullname) && !empty($password) && !empty($confirmpassword)){
        if($password != $confirmpassword) {
            echo "<script>alert(`Passwrod not match!`);</script>";
        }else{
            $searchUsername = mysqli_query($conn,"SELECT * FROM tblUsers WHERE username = '$username'");
            if($searchUsername->num_rows > 0) {
                echo "
                <div aria-live='polite' aria-atomic='true' class='d-flex justify-content-center align-items-center' >
                    <div role='alert' class='toast show fade ' data-delay='5000' data-animation='true' style='position: absolute; z-index: 2; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); border-radius: 15px; background-color: hsl(0, 0%, 96%);'>
                        <div class='toast-header'>
                            <strong class='mr-auto'>Oh no!</strong>
                            <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='toast-body text-center d-flex'>
                            <span><i class='bi bi-check-circle'></i></span>
                            <div class='d-flex flex-grow-1 align-items-center'>
                                <span class='fw-semibold'>User already registered.</span>
                            </div>
                        </div>
                    </div>
                </div>
                ";
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

                echo "
                <div aria-live='polite' aria-atomic='true' class='d-flex justify-content-center align-items-center' >
                    <div role='alert' class='toast show fade ' data-delay='5000' data-animation='true' style='position: absolute; z-index: 2; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); border-radius: 15px; background-color: hsl(0, 0%, 96%);'>
                        <div class='toast-header'>
                            <strong class='mr-auto'>Success!</strong>
                            <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='toast-body text-center d-flex'>
                            <span><i class='bi bi-check-circle'></i></span>
                            <div class='d-flex flex-grow-1 align-items-center'>
                                <span class='fw-semibold'>User successfully created.</span>
                            </div>
                        </div>
                    </div>
                </div>
                ";
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
                    <div class='row align-items-center'>
                        <div class='col-md-auto'>
                            <a href='index.php'><h4><i class='bi bi-house'></i></h4></a>
                        </div>
                        <div class='col-md-auto'>
                            <h4 class='mb-3'>Webtimekeeper</h4>
                        </div>
                        <div class='col-md-auto'>
                        <a class='' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4><i class='bi bi-list'></i></h4></a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" data-toggle="modal" data-target="#about" href="about.php"><i class="bi bi-info-circle"></i> About</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#privacy" href="privacy.php"><i class="bi bi-shield-check"></i> Privacy</a>
                            <a class="dropdown-item" target="_blank" href="https://www.buymeacoffee.com/Webtimekeeper"><i class="bi bi-heart"></i> Support</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" target='_blank' href="https://github.com/lorencelaudenio"><i class="bi bi-github"></i> Developer</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="fullnameHelp" placeholder="Your Fullname" required>
                </div>

                <div class="form-group mt-3">
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Your Username" required>
                </div>

                

                <div class="input-group mb-3">
                    <input type="password" name="Password" id="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form-control" placeholder="Repeat your password" aria-label="Confirm password" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                    </div>
                </div>

                <div class="form-check-inline mb-3">
                    <label class="form-check-label">
                        <input onchange="document.getElementById('register').disabled = !this.checked;" type="checkbox" class="form-check-input" value="">I agree all statements in <a data-toggle='modal' data-target='#privacy' href="privacy.php">Privacy Policy</a>
                    </label>
                </div>
                
                <input type="submit" name="register" id="register" value="Register" style="text-decoration: none;" class="btn text-primary border btn-lg btn-block rounded-pill" disabled>

                <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="index.php"
                    class=""><u>Timein here</u></a>
                </p>
            </form>   
        </div>
    </div>
    </div>
    </div>
</section>
<?php include("modal.php");?>
