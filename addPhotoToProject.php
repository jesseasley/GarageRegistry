<?php
    include("database.php");

    $sql = "select * from TrackMuse_UserProjectImages where filename = '" . $_GET["photoPath"] . "' and active='1'";
    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $sql = "insert into TrackMuse_UserProjectImages ";
        $sql .= "(projectid, filename, title, description, coverphoto, active, ts) values (";
        $sql .= $_GET["projectID"] . ", ";
        $sql .= "'" . $row["filename"] . "', ";
        $sql .= "'" . $row["title"] . "', ";
        $sql .= "'" . $row["description"] . "', ";
        $sql .= "'0', ";
        $sql .= "'" . $row["active"] . "', ";
        $sql .= "'" . $sd . "')";
        $conn->query($sql);
    }
    $conn->close();
?>