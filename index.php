<?php
include('header.php');
include('conn.php');
include('scripts.php');

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$cpassword = $_POST['password'] ?? null;
$notes = $_POST['notes'] ?? null;
$timein = "";
$timeout = "";

date_default_timezone_set("Asia/Manila");
$curdate = date("Y-m-d");
$curtime = date("H:i:s");
$timezone = date_default_timezone_set("Asia/Manila");

if(isset($_POST['timein'])) {
    if($username == '' && $password == ''){
        echo "<script>alert('All fields required.');</script>";
    }else{
        $checkUsers = $conn->query("SELECT * FROM tblUsers where username='$username' && password='$password'"); //dapat talaga may '' ung variable
        if (mysqli_num_rows($checkUsers) > 0){
            $checkDate = $conn->query("SELECT * FROM $username WHERE date = '$curdate'");

            if (mysqli_num_rows($checkDate) != 0){
                $datelogassoc = mysqli_fetch_assoc($checkDate);
                $dateassoc = $datelogassoc['date'];
                $timeinassoc = $datelogassoc['timein'];
                $timeoutassoc = $datelogassoc['timeout'];

                if(!empty($timeinassoc)){
                    if(!empty($timeoutassoc)){
                        echo "
                            <script>
                            alert('You are already logged in and logged out today!');
                            window.location.href = 'view.php';
                            </script>
                        ";
                        $timein = "disabled";
                        $timeout = "disabled";
                    }else{
                        echo "<script>alert('You are already logged in. Please logout.');</script>";
                        $timein = "disabled";
                    }
                }else{
                    $insert = $conn->query("INSERT INTO $username (`date`, `timein`, `timeout`, `notes`) VALUES ('$curdate', '$curtime', '00:00:00', '$notes')");
                    echo "<script>alert('Succesfully logged in!');</script>";
                }
            }else{
               $insert = $conn->query("INSERT INTO $username (`date`, `timein`, `timeout`, `notes`) VALUES ('$curdate', '$curtime', '00:00:00', '$notes')");
                echo "<script>alert('Succesfully logged in!');</script>"; 
            }
        }
    }
}

if(isset($_POST['timeout'])) {
    if($username == '' && $password == ''){
        echo "<script>alert('All fields required.');</script>";
    }else{
        $checkUsers = $conn->query("SELECT * FROM `tblUsers` where `username`='$username' && `password`='$password'");
        if (mysqli_num_rows($checkUsers) > 0){
            $checkDate = $conn->query("SELECT * FROM $username WHERE `date` = '$curdate'");

            if (mysqli_num_rows($checkDate) != 0){
                $datelogassoc = mysqli_fetch_assoc($checkDate);
                $timeoutassoc = $datelogassoc['timeout'];

                if($timeoutassoc != '00:00:00'){
                    echo "
                        <script>
                            alert('You are already logged out!');
                            window.location.href = 'view.php';
                        </script>
                    ";
                    $timeout = "disabled";
                }else{
                    $Timeout = $conn->query("UPDATE $username SET `timeout`='$curtime', `notes`='$notes' WHERE `date`='$curdate'");
                    echo "<script>alert(`Succesfully logged out!`);</script>";
                }
            }
        }
    }
}


if(isset($_POST['view'])) {
    if($username == '' && $password == ''){
        echo "<script>alert('All fields required.');</script>";
    }else{
        $checkUsers = $conn->query("SELECT * FROM tblUsers where username='$username' && password='$password'");
        if (mysqli_num_rows($checkUsers) > 0){
            session_start();
            $_SESSION['username'] = $username;
            exit(header("location: view.php"));
        }
    }
}
?>
<title>Webtimekeeper</title>



<section class="vh-100 " style="background-color: hsl(0, 0%, 96%)">
    <div class="container py-3 h-100  col-md-4 rounded">
    <div class="row d-flex  justify-content-center align-items-center h-100">
    <div class="card   shadow " style="border-radius: 1rem;">
        <div class="card-body p-4 text-center">
            <form class="col-12" action="" method="post">
                <div class="text-center">
                    <div class='row align-items-center'>
                        <div class='col-md-auto'>
                            <h4><i class='bi bi-clock'></i></h4>
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

                <hr>

                <div>
                    <?php echo date_default_timezone_get() ;?> <i class="bi bi-geo-alt"></i>
                </div>

                <div >
                    <h1 id="txt" class="display-4"></h1>
                </div>

                <div>
                    <?php echo $date= date('l, M j') ;?>
                </div>

                <div class="form-group mt-3">
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username" required>
                    <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your details with anyone else.</small> -->
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-label="Enter password" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="notes" id="notes" class="form-control" placeholder="Enter notes" aria-label="Enter notes" aria-describedby="basic-addon2">
                </div>
                
                <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                    <input type="submit" name="timein" class="btn btn-success" value="Timein" <?php echo $timein;?>/>
                    <input type="submit" name="timeout" class="btn btn-primary" value="Timeout" <?php echo $timeout;?>/>
                    <input type="submit" name="view" class="btn btn-info" value="View"/>
                </div>

                <p class="text-center text-muted mt-3 mb-0">Don't have an account?  <a href="register.php"
                    class=""><u>Register here</u></a>
                </p>
            </form>   
        </div>
    </div>
    </div>
    </div>
</section>
<?php include('modal.php'); ?>
