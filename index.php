<?php
include('header.php');
include('con.php');

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['password'];
$notes = $_POST['notes'];

date_default_timezone_set("Asia/Manila");
$curdate = date("Y-m-d");
$curtime = date("H:i:s");
$timezone = date_default_timezone_set("Asia/Manila");

if(isset($_POST['timein'])) {
    if($username == '' && $cpassword == ''){
        echo "<script>alert('All fields required.');</script>";
        // echo '
        //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
        //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
        //             <div class="toast-header">
        //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                   All fields required.
        //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                   </button>
        //                 </div>
        //             </div>
                    
        //         </div>                
        //     </div>
        // ';
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
                    echo "<script>alert('You are already logged in. Please logout.');</script>";
                    // echo '
                    //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
                    //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
                    //             <div class="toast-header">
                    //                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    //                   You are already logged in. Please logout.
                    //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //                     <span aria-hidden="true">&times;</span>
                    //                   </button>
                    //                 </div>
                    //             </div>
                                
                    //         </div>
                    //     </div>
                    // ';
                }
            }else{
               $insert = $conn->query("INSERT INTO $username (`date`, `timein`, `timeout`, `notes`) VALUES ('$curdate', '$curtime', '00:00:00', '$notes')");
                echo "<script>alert('Succesfully logged in!');</script>"; 
            //    echo '
            //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
            //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
            //             <div class="toast-header">
            //                 <div class="alert alert-success alert-dismissible fade show" role="alert">
            //                   Succesfully logged in!
            //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                     <span aria-hidden="true">&times;</span>
            //                   </button>
            //                 </div>
            //             </div>
                        
            //         </div>
            //     </div>
            //     ';
            }
        }
    }
}

if(isset($_POST['timeout'])) {
    if($username == '' && $cpassword == ''){
        echo "<script>alert('All fields required.');</script>";
        // echo '
        //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
        //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
        //             <div class="toast-header">
        //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                   All fields required.
        //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                   </button>
        //                 </div>
        //             </div>
                    
        //         </div>                
        //     </div>
        // ';
    }else{
        $checkUsers = $conn->query("SELECT * FROM `tblUsers` where `username`='$username' && `password`='$password'");
        if (mysqli_num_rows($checkUsers) > 0){
            $checkDate = $conn->query("SELECT * FROM $username WHERE `date` = '$curdate'");

            if (mysqli_num_rows($checkDate) != 0){
                $datelogassoc = mysqli_fetch_assoc($checkDate);
                $timeoutassoc = $datelogassoc['timeout'];

                if($timeoutassoc != '00:00:00'){
                    echo "<script>alert('You are already logged out. Please contact administrator.');</script>";
                    // echo '
                    //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
                    //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
                    //             <div class="toast-header">
                    //                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    //                   You are already logged out. Please contact administrator.
                    //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //                     <span aria-hidden="true">&times;</span>
                    //                   </button>
                    //                 </div>
                    //             </div>
                                
                    //         </div>
                    //     </div>
                    // ';
                }else{
                    $Timeout = $conn->query("UPDATE $username SET `timeout`='$curtime', `notes`='$notes' WHERE `date`='$curdate'");
                    echo "<script>alert(`Succesfully logged out!`);</script>";
                    // echo '
                    //     <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
                    //         <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
                    //             <div class="toast-header">
                    //                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                    //                   Succesfully logged out!
                    //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //                     <span aria-hidden="true">&times;</span>
                    //                   </button>
                    //                 </div>
                    //             </div>
                                
                    //         </div>
                    //     </div>
                    //     ';
                }
            }
        }
    }
}


if(isset($_POST['view'])) {
    if($username == '' && $cpassword == ''){
        //echo "<script>alert('All fields required.');</script>";
        echo '
            <div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
                <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
                    <div class="toast-header">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          All fields required.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                    
                </div>                
            </div>
        ';
    }else{
        $checkUsers = $conn->query("SELECT * FROM tblUsers where username='$username' && password='$password'");
        if (mysqli_num_rows($checkUsers) > 0){
            session_start();
            $_SESSION['username'] = $username;
            echo "<script type='text/javascript'>
            window.location = '/bundyclock/view.php';
            </script>";
        }
    }
}
?>
<title>Bundyclock - timein and timeout on-the-fly!</title>
    <div class="container">
        <div class="p-5 text-center">
            <form action="" method="post" class="form-signin">
                <img class="mb-4" src="/img/clock.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Bundyclock</h1>
                <h1 class="h6 mb-3 font-weight-normal"><?php echo date_default_timezone_get() ;?> <i class="bi bi-geo-alt-fill"></i></h1> 
                <h1 class="h4 mb-3 font-weight-normal"><?php echo $date= date('l, M j') ;?></h1>
                <h1 class="h1 mb-3 font-weight-normal"><?php echo $date= date('h:i') ;?></h1>
                <div class="form-label-group">
                    <input class="form-control " id="inputUsername" type="text" name="username" placeholder="Username"  />
                    <label for="inputUsername">Username</label>
                </div>

                <div class="form-label-group">
                    <input class="form-control " id="inputPassword" type="password" name="password" placeholder="Password" />
                    <label for="inputPassword">Password</label>
                </div>

                <div class="form-label-group">
                    <input class="form-control" id="inputNotes" type="text" name="notes" placeholder="Notes" />
                    <label for="inputNotes">Notes</label>
                </div>
                <input class="btn btn-lg btn-primary btn-success" type="submit" name="timein" value="Timein" />
                <input class="btn btn-lg btn-primary btn-danger" type="submit" name="timeout" value="Timeout" />
                <input class="btn btn-lg btn-primary btn-primary" type="submit" name="view" value="View" />
                <br/>
                <p class="mt-1 mb-1 text-muted text-center">No account yet? <a href="/register.php">Register here</a></p>
            </form>
        </div>

<?php include('footer.php');?>