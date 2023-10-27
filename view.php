<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("header.php");
include("con.php");
include("scripts.php");

session_start();
$username = $_SESSION['username'];

$view = $conn->query("SELECT * FROM $username ORDER BY id DESC");

echo "
<div class='container p-3 border border-primary'>
    <table id='myTable' class='display'>
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

<?php include('footer.php');?>



