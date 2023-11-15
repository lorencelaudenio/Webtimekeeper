<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("header.php");
include("conn.php");
include("scripts.php");

session_start();
$username = $_SESSION['username'];

$view = $conn->query("SELECT * FROM $username ORDER BY id DESC");

echo "

    <section class='vh-100' style='background-color: hsl(0, 0%, 96%)'>
        <div class='container py-3 h-100  col-md-4 rounded'>
            <div class='row d-flex  justify-content-center align-items-center h-100'>
                <div class='card   shadow ' style='border-radius: 1rem;'>
                    <div class='card-body p-4 text-center'>
                        <div class='text-center'>
                            <div class='row align-items-center'>
                                <div class='col-md-auto'>
                                    <a href='index.php'><h4><i class='bi bi-house'></i></h4></a>
                                </div>
                                <div class='col-md-auto'>
                                    <h4 class='mb-3'>Webtimekeeper</h4>
                                </div>
                                <div class='col-md-auto'>
                                <a class='' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4><i class='bi bi-list'></i></h4></a>
                                    <div class='dropdown-menu'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#about' href='about.php'><i class='bi bi-info-circle'></i> About</a>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#privacy' href='privacy.php'><i class='bi bi-shield-check'></i> Privacy</a>
                                    <a class='dropdown-item' target='_blank' href='https://www.buymeacoffee.com/Webtimekeeper'><i class='bi bi-heart'></i> Support</a>
                                    <div role='separator' class='dropdown-divider'></div>
                                    <a class='dropdown-item' target='_blank' href='https://github.com/lorencelaudenio'><i class='bi bi-github'></i> Developer</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>


                        <table id='myTable' class='table table-striped table-bordered' style='width:100%'>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Timein</th>
                                    <th>Timeout</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>

                            <tbody>
";
$query = mysqli_query($conn,"SELECT * FROM $username");
while($row = mysqli_fetch_assoc($query ?? null)) {
    $db_date = $row["date"];
    $db_timein = $row["timein"];
    $db_timeout = $row["timeout"];
    $db_notes = $row["notes"];
    echo "
                                <tr>
                                    <td>$db_date</td>
                                    <td>$db_timein</td>
                                    <td>$db_timeout</td>
                                    <td>$db_notes</td>
                                </tr>
    ";
}
?>
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include("modal.php");?>
<title><?php echo $username = $_SESSION['username'];?>'s Webtimekeeper</title>









