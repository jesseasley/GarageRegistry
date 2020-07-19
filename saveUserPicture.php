<?php
    include("database.php");

//make sure the user exists
$sql = "select * from TrackMuse_Users where username = '" . $_POST["username"] . "' ";
$sql .= "and password  = '" . $_POST["password"] . "' and active='1'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
  //get the uer id
  $row = $res->fetch_assoc();

  //see if the picture already exists
  $sql = "select * from TrackMuse_UserImages where filename = '" . $_POST["filename"] . "'";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) {
    echo "File \"" . $_POST["filename"] . "\" already exists";
  }
  else{
  
    // get current time
    date_default_timezone_set('America/Chicago');
    $d = new DateTime();
    $sd = $d->format('m-d-Y H:i:s');

    $sql = "insert into TrackMuse_UserImages (TMUserid, filename, project, year, make, model, trim, active, ts) values (";
    $sql .= $row["id"] . ", '" . $_POST["filename"] . "', '" . $_POST["project"] . "', '" . $_POST["year"];
    $sql .= "', '" . $_POST["make"] . "', '" . $_POST["model"] . "', '" . $_POST["trim"] . "', '1', '" . $sd . "')";

    if ($conn->query($sql) === TRUE) {
        echo $_POST["filename"] . " saved successfully<br>";
    } else {
        echo "Error saving " . $_POST["filename"] . ": " . $conn->error . "<br>";
    }
  }
}
else{
  echo "Could not find user";
}


$conn->close();
?>