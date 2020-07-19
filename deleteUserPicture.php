<?php
    include("database.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//see if the image exists first
$sql = "select * from trackmuse_userimages where filename = '" . $_POST["filename"] . "'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {

  // delete the image
  $sql = "delete from trackmuse_userimages where filename = '" . $_POST["filename"] . "'";

  if ($conn->query($sql) === TRUE) {
      echo "Successfully deleted " . $_POST["filename"] . "<br>";
  } else {
      echo "Error deleting " . $_POST["filename"] . ": " . $conn->error . "<br>";
  }
}
else
  echo $_POST["filename"] . " wasn't found";

$conn->close();
?>