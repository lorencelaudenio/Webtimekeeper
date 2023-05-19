<?php
include('con.php');
session_start();
$username = $_SESSION['username'];

$view = $mysqli->query("SELECT * FROM $username ORDER BY id DESC");
?>

<title>Bundyclock - View Records</title>


<div class="position-fixed bottom-0 left-0 p-3" style="z-index: 5; left: 0; bottom: 0;"">
    <div class="toast  " role="alert"  data-autohide="true"  data-delay="5000">
        <div class="toast-header">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Welcome back, <?php echo ucfirst($username);?>! Retrieving your records. Please wait...
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
        
    </div>
</div>


<div class="container">
    <div class="py-5 text-center">
        <img class="mb-4" src="/lorence/img/clock.png" alt="" width="72" height="72">
        <h2><?php echo "Welcome, " . ucwords($username);?> <i class="bi bi-emoji-smile"></i></h2>
  </div>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Timein</th>
      <th scope="col">Timeout</th>
      <th scope="col">Notes</th>
    </tr>
  </thead>
  <tbody>
    <?php
	// Fetch the next row of a result set as an associative array
	while ($row = mysqli_fetch_array($view)) {
		echo '<tr>
      <th scope="row">'.$row['date'].'</th>
      <td>'.$row['timein'].'</td>
      <td>'.$row['timeout'].'</td>
      <td>'.$row['notes'].'</td>
    	</tr>';	
	}
	?>
  </tbody>
</table>


	
<?php include('footer.php');?>
