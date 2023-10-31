<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("header.php");
include("conn.php");
include("scripts.php");

session_start();
$username = $_SESSION['username'];

$view = $conn->query("SELECT * FROM $username ORDER BY id DESC");

echo "

    <section class='vh-100 ' style='background-color: hsl(0, 0%, 96%)'>
        <div class='container py-3 h-100  col-md-4 rounded'>
            <div class='row d-flex  justify-content-center align-items-center h-100'>
                <div class='card   shadow ' style='border-radius: 1rem;'>
                    <div class='card-body p-4 text-center'>
                        <div class='text-center'>
                            <h4 class='mb-3'>$username's Webtimekeeper <i class='bi bi-clock'></i>  </h4>
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

<?php include('footer.php');?>









