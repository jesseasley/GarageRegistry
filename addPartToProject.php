<?php
    include("database.php");

    $sql = "select * from TrackMuse_UserProjectParts where filename = '" . $_GET["partPath"] . "' and active='1'";
    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $sql = "insert into TrackMuse_UserProjectParts ";
        $sql .= "(projectid, filename, title, description, pricepaid, vendorlink, active, ts) values (";
        $sql .= $_GET["projectID"] . ", ";
        $sql .= "'" . $row["filename"] . "', ";
        $sql .= "'" . $row["title"] . "', ";
        $sql .= "'" . $row["description"] . "', ";
        $sql .= "'" . $row["pricepaid"] . "', ";
        $sql .= "'" . $row["vendorlink"] . "', ";
        $sql .= "'" . $row["active"] . "', ";
        $sql .= "'" . $sd . "')";
        $conn->query($sql);
    }
    $conn->close();
?>