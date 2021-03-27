<?php
include('navbar.php');
include('server.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY NOTE</title>
</head>
<body>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">MY NOTE</a>
  <form class="form-inline">
  <a href="add.php"><i class="fa fa-plus-circle" style="font-size:36px"></i></a>
  </form>
</nav>

<?php
$sql = "SELECT * FROM mynote ";
      $result = $conn->query($sql);
  while($row = $result->fetch_object()){ 
  echo "
  <div class='card'>
  <div class='card-body'>
 <h5 class='card-title'>$row->time</h5>
    <a href='show.php?id=$row->id'><h5 class='card-title'>$row->titel</h5></a>
    <p class='card-text'>$row->detail</p>
    <a href='edit.php?id=$row->id'><i class='fa fa-arrow-circle-right' style='font-size:36px'></i></a>
  </div>
</div>";}
?>





</body>
</html>