<script>
    $(".toast").toast("show");
</script>


<script>
$(document).ready( function () {
    $('#myTable').DataTable(

      {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
    paging: true
    scrollY: 400
    responsive: true
    
} );
</script>

<script>
  function ShowPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function startTime() {
  const today = new Date();
  let h = today.getHours() % 12 || 12;
  let m = today.getMinutes();
  let s = today.getSeconds();
  let ampm = h >= 12 ? 'am' : 'pm';
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s + " " + ampm;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
